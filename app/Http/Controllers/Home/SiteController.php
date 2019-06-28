<?php

namespace App\Http\Controllers\Home;

header('Content-Type: text/html; charset=utf-8');

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Store;
use App\Models\OauthUser;
use App\Models\Site;
use App\Notifications\ApplySite;
use Cache;
use Auth;
use App\BuyHistory;
use App\SellHistory;
use App\StockType;
use App\MoneyWallet;
use App\StockWallet;
use App\User;
use App\Setting;
use App\BuySell;
use App\FundRequest;
use App\News;
use Illuminate\Http\Request;
use Notification;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sh = $this->getCompositeIndex('s_sh000001');        
        $sz = $this->getCompositeIndex('s_sz399001');
        $cy = $this->getCompositeIndex('s_sz399006');

        $news = News::orderBy('updated_at', 'contents')->get();

        $head = [
            'title'       => '推荐博客',
            'keywords'    => '推荐博客',
            'description' => '推荐博客',
        ];
        $assign = [
            'site'        => "",
            'head'        => $head,
            'category_id' => 'index',
            'sh'          => $sh,
            'sz'          => $sz,
            'cy'          => $cy,
            'news'        => $news,
        ];    
     
        return view('home.site.wapindex2', $assign);
    }
    public function liza_init(){
        $user = Auth::user();
        $stock_wallet = StockWallet::where('id', $user->stock_wallet_id)->first();
        $start_liza = $stock_wallet->updated_at;
        $diff  	= date_diff( date_create($start_liza) , date_create());
       if($diff->d >0){
            $cost_daily_fee = Setting::latest()->first()->cost_daily_max;
            $money_wallet = MoneyWallet::where('id', $user->stock_wallet_id)->first();
            $liza_daily = $money_wallet->after_amount - $stock_wallet->after_amount * $cost_daily_fee * $diff->d;
            //var_dump($diff->d);exit();
            $update = $stock_wallet->before_amount;
            $res = $money_wallet->update(['after_amount'=>$liza_daily]);
            $stock_wallet->update(['before_amount'=>'1']);
            $stock_wallet->update(['before_amount'=>$update]);
       }
       
    }
    public function buyhistory_init(){        
      
        
    }
    ///////////////stock exchange api //////////////
    public function getCompositeIndex(string $stockcode){
        $sh_url = "http://hq.sinajs.cn/list=".$stockcode;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $sh_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);        
        $realdata = mb_substr($data, 23, strlen($data)-30);
        
        $utf8Str = mb_convert_encoding($realdata , 'UTF-8' , 'GBK');
        $realdata_arr = explode (",", $utf8Str);
        //var_dump($realdata);exit();
        return $realdata_arr;

    }
    public function getstock(){
       // $this->buyhistory_init();
        $stockcode = $_GET['stockcode']; 
        return $stockdata= $this->getstockPrice($stockcode);
    }
    public function getstockPrice($stockcode){
        if(substr($stockcode,0,1)=='6'){
            $sh_url = "http://hq.sinajs.cn/list=sh".$stockcode;
        }else{
            $sh_url = "http://hq.sinajs.cn/list=sz".$stockcode;
        }       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $sh_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
        $data = curl_exec($ch);
        //var_dump($data);exit();
        curl_close($ch);        
        $realdata = mb_substr($data, 21, strlen($data)-24);
        $realdata_arr = explode (",", $realdata);
        $utf8Str = mb_convert_encoding($realdata , 'UTF-8' , 'GBK');
        //$realdata = utf8_decode($realdata);
        //var_dump($utf8Str);exit();
        return $utf8Str;

    }
    public function getdeal(){
        //var_dump('here');exit();
        $user_id = Auth::user()->id;
        $buyhistories = BuyHistory::where('user_id','=', $user_id)->get();
        $realdata_arr=array();
         foreach($buyhistories as $index => $buyhistory){
             $stocktype_id = $buyhistory->stock_type_id;
             $stockcode = StockType::where('id','=', $stocktype_id)->first()->code;
             if(substr($stockcode,0,1)=='6'){
                $sh_url = "http://hq.sinajs.cn/list=sh".$stockcode;
            }else{
                $sh_url = "http://hq.sinajs.cn/list=sz".$stockcode;
            }   
             $ch = curl_init();
             curl_setopt($ch, CURLOPT_URL, $sh_url);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
             $data = curl_exec($ch);           
             curl_close($ch);                    
             $data_arr = explode (",", $data);
             array_push($realdata_arr, $data_arr[3]);            
        }
        //var_dump($realdata_arr);exit();
        return json_encode($realdata_arr);
    }
    public function sale_buy(){   

        ///////////////////////////////// open close time//////////////////
        $am_start_time = Setting::latest()->first()->open_AM_Start;
        $am_end_time = Setting::latest()->first()->open_AM_End;
        $pm_start_time = Setting::latest()->first()->open_PM_Start;
        $pm_end_time = Setting::latest()->first()->open_PM_End;
        $now = date_create("now",timezone_open("Asia/Hong_Kong"));
        $am_start = date_create($am_start_time,timezone_open("Asia/Hong_Kong"));
        $am_end =  date_create($am_end_time,timezone_open("Asia/Hong_Kong"));
        $pm_start = date_create($pm_start_time,timezone_open("Asia/Hong_Kong"));
        $pm_end = date_create($pm_end_time,timezone_open("Asia/Hong_Kong"));
        $dayOfTheWeek = \Carbon\Carbon::now()->dayOfWeek;
        if ((( $am_start >  $now) ||  ( $am_end <  $now )) && (( $pm_start >  $now) ||  ( $pm_end <  $now ) || (  $dayOfTheWeek =='0') || ( $dayOfTheWeek=='6')))
        {    
            $error = array('error' => 1, 'content' => '休市时间');
            echo '<script> alert(" 休市时间");</script>' ;
            echo "<script>location.href = '/site/waptrade'</script>";
            return false;
        }
        
        /////////////////////////////////////

        $historyid=$_GET['id'];        
        $buyhistory = BuyHistory::where('id','=', $historyid)->first();
        return view('home.site.sell')->with(compact('buyhistory')); 
    }
    
    public function sell_act(){


        $buyhistoryid=$_POST['id'];
        $cur_price = $_POST['cur_price'];
        $cur_num = $_POST['num'];
        // var_dump($cur_price);exit();
        if ($cur_price==''){
            return redirect('/site/waptrade')->with('error','当前操作无法执行，请立即重试');
        }
        $this->sell($buyhistoryid, $cur_price, $cur_num);
        return redirect('/site/waptrade');
    }

    function sell($buyhistoryid, $cur_price, $cur_num ){     
       

        $buyhistory = BuyHistory::where('id','=', $buyhistoryid)->first();

        ////////////////  trading slip price  &  dc5,dc6,dc7,dc8,dc9 ///////////////////
        $stockcode = $buyhistory->stockType->code;
        $realdata = $this->getstockPrice($stockcode);            
        $cur_price_real = explode (",", $realdata);   

        $slip_price =$cur_price_real[3] / $cur_price - 1;
        $slip_up_float = Setting::latest()->first()->up_float;
        $slip_down_float = Setting::latest()->first()->down_float;
        $slip_dc5 = Setting::latest()->first()->dc5;
        $slip_dc6 = Setting::latest()->first()->dc6;
        $slip_dc7 = Setting::latest()->first()->dc7;
        $slip_dc8 = Setting::latest()->first()->dc8;
        $slip_dc9 = Setting::latest()->first()->dc9;
        if ($slip_dc5 > 0){
            $slip_up_float=0.005;
            $slip_down_float=0.005;
        }elseif($slip_dc6 > 0){
            $slip_up_float=0.006;
            $slip_down_float=0.006;
        }elseif($slip_dc7 > 0){
            $slip_up_float=0.007;
            $slip_down_float=0.007;
        }elseif($slip_dc8 > 0){
            $slip_up_float=0.008;
            $slip_down_float=0.008;
        }elseif($slip_dc9 > 0){
            $slip_up_float=0.009;
            $slip_down_float=0.009;
        }
        
        if ($slip_price > $slip_up_float){
            return redirect('/site/waptrade')->with('error','目前的价格高于待售价格。');
        }elseif($slip_price < - $slip_down_float){
            return redirect('/site/waptrade')->with('error','目前的价格低于待售价格。');
        }

        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        $stocktype_id = $buyhistory->stockType->id;
        //var_dump($stocktype_id);exit();
      
        $amount = $cur_num ;
        $cost = $buyhistory->cost;
        $method = $buyhistory->method;      
        $after_amount = MoneyWallet::where('id','=',$user->money_wallet_id)->first()->after_amount;
        $before_amount = MoneyWallet::where('id','=',$user->money_wallet_id)->first()->before_amount;
        $save_date = $buyhistory->created_at;
        $save_fee = Setting::latest()->first()->cost_save_max;
        $state_fee =Setting::latest()->first()->cost_state_max;
        $diff  	= date_diff( date_create($save_date) , date_create());
        /////////////////////  sel_max_time  //////////////////////
        //var_dump($diff->i);exit();
        $sel_max_time = Setting::latest()->first()->sel_max_time;
        if($sel_max_time > $diff->i){
            $sell_fee =  Setting::latest()->first()->cost_sell_limit; 
        }else{
            $sell_fee = Setting::latest()->first()->cost_sell_max;  
        }      
        $buy_fee = Setting::latest()->first()->cost_bull_max;        
       
        if ($diff->d == 0 | $diff->h >8){
            $saveday=1;
        }else{
            $saveday = $diff->d;
        }
       //var_dump($cur_price);exit();
       if ($method==1){
            $gain = $cur_price*$amount*100 - $cost*$amount*100 - $cost*$amount*100*($buy_fee  + $sell_fee + $state_fee + $saveday * $save_fee);
       }else{
            $gain = $cost*$amount*100 - $cur_price*$amount*100  - $cost*$amount*100*($buy_fee  + $sell_fee + $state_fee + $saveday * $save_fee);
       }
       //var_dump($gain);exit();
        $res = MoneyWallet::where('id','=', $user->money_wallet_id)->update(array('before_amount' => $before_amount - $cost*$amount*100 , 'after_amount' => $after_amount + $cost*$amount*100 + $gain));
        $amount_org = $buyhistory->amount;
        $amount_cur = $amount_org - $amount;
        if ($amount_cur == '0'){
            BuyHistory::where('id',$buyhistoryid)->delete();
        }else{
            BuyHistory::where('id',$buyhistoryid)->update(['amount' => $amount_cur]);
        }
       // var_dump($cost);exit();
        $res = SellHistory::create([
            'user_id'   => $user_id,
            'stock_type_id' => $stocktype_id,
            'buy_cost' => $cost,
            'buy_fee' => $buy_fee ,
            'sell_fee' => $sell_fee,
            'state_fee' => $state_fee,
            'buy_time' => $save_date,
            'amount'    => $amount,
            'sell_cost'  => $cur_price,
            'method'    => $method,
            'before_amount' => $after_amount,
            'save_fee' => $save_fee,
            'fee'       => $gain
        ]);
       // var_dump($res['id']);exit();
       
    }

    public function buystock(Request $request)
    {
        ///////////////////////////////////////////////////////////////////////////     
        
       ///////////////////////open_start_time/////////////////////////////////////
       $am_start_time = Setting::latest()->first()->open_AM_Start;
       $am_end_time = Setting::latest()->first()->open_AM_End;
       $pm_start_time = Setting::latest()->first()->open_PM_Start;
       $pm_end_time = Setting::latest()->first()->open_PM_End;
       $now = date_create("now",timezone_open("Asia/Hong_Kong"));
        $am_start = date_create($am_start_time,timezone_open("Asia/Hong_Kong"));
        $am_end =  date_create($am_end_time,timezone_open("Asia/Hong_Kong"));
        $pm_start = date_create($pm_start_time,timezone_open("Asia/Hong_Kong"));
        $pm_end = date_create($pm_end_time,timezone_open("Asia/Hong_Kong"));
        $dayOfTheWeek = \Carbon\Carbon::now()->dayOfWeek;
        if ((( $am_start >  $now) ||  ( $am_end <  $now )) && (( $pm_start >  $now) ||  ( $pm_end <  $now ) || (  $dayOfTheWeek =='0') || ( $dayOfTheWeek=='6')))
        {    
            $error = array('error' => 1, 'content' => '休市时间');
           
            return json_encode($error);
        }
       
        //////////////////////////////////////////////////////////////////////
        ///////////////////rise and fall///////////////////////////////////
        $stockcode = $_POST['code'];
        $realdata = $this->getstockPrice($stockcode);            
        $cur_price_real = explode (",", $realdata);
        $buy_sd = Setting::latest()->first()->buy_sd;
        $st_buy_sd = Setting::latest()->first()->st_buy_sd;
        //var_dump($cur_price_real);exit();
        $price_rise = $cur_price_real[4]/$cur_price_real[5] - 1;
        if(substr($stockcode,0,2)!="st"){
            if(($price_rise >$buy_sd)||($price_rise < -$buy_sd)){

                $error = array('error' => 1, 'content' => '你不能购买涨跌波动的股票。');
           
                 return json_encode($error);
           
            }
        }elseif(substr($stockcode,0,2)=="st"){
            if(($price_rise >$st_buy_sd)||($price_rise < -$st_buy_sd)){
                
                $error = array('error' => 1, 'content' => '你不能购买涨跌波动的股票。');
           
                return json_encode($error);
          
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////
        if($request->ajax()) {
            $data = $request->all();
        }
       // dd(json_decode($data));  
      
        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        ////////////////////////////////// low money warning/////////////////////////
        $baocang_precent = Setting::latest()->first()->baocang_precent;
        $cost_exchange_rate = Setting::latest()->first()->cost_exchange_rate;      
        $after_amount = MoneyWallet::where('id','=',$user->money_wallet_id)->first()->after_amount;
        $before_amount = MoneyWallet::where('id','=',$user->money_wallet_id)->first()->before_amount;
        $stock_amount = StockWallet::where('id',$user->stock_wallet_id)->first()->after_amount;
        $stock_before_amount = StockWallet::where('id',$user->stock_wallet_id)->first()->after_amount;
        //var_dump(($after_amount + $before_amount - $stock_amount));exit();
        $rate_money = ($after_amount + $before_amount - $stock_amount)/$stock_amount*($cost_exchange_rate-1);
        if($rate_money<(1-$baocang_precent*0.01)){
            $error = array('error'=>1,'content'=>'如果您不存款，则无法进行交易。');
            return json_encode($error);
        }
        $funds = FundRequest::where('user_id',$user->id)
                ->where('type','出金')->get();
        if($funds){
                $fund_amount = $funds->sum('money');           
        } 
       /////////////////////////////////// 
       // 
        $stockname = $_POST['cn_name'];
        $stocktype = StockType::firstOrCreate(array('code' => $stockcode, 'cn_name' => $stockname ));
        $stocktype_id = $stocktype->id; 
        $amount = $_POST['buy_num'];
        $cost = $_POST['buys_price'];
        $method = $_POST['buy_type'];              
        $fee = Setting::latest()->first()->cost_bull_max;        
        $buy_amount = $amount * $cost*100;
       
        ////////////////
        if(($after_amount+$before_amount)<($stock_amount+$stock_before_amount)){
            $fund_amount_over = $fund_amount*10;
        }else{
            $fund_amount_over = $fund_amount;
        }
        if($after_amount - $fund_amount_over< $buy_amount ){            
            $error = array('error'=>1,'content'=>'没有足够的钱购买大量的股票。');
            return json_encode($error);
        }
       $res = MoneyWallet::where('id','=', $user->money_wallet_id)->update(array('after_amount' => $after_amount - $buy_amount - $buy_amount * $fee * 0.1));
       $res1 = MoneyWallet::where('id','=',$user->money_wallet_id)->update(array('before_amount' => $before_amount + $buy_amount));
       BuyHistory::create([
            'user_id'   => $user_id,
            'stock_type_id' => $stocktype_id,
            'amount'    => $amount,
            'cost'      => $cost,
            'method'    => $method,
            'before_amount' => $after_amount,
            'fee'       =>$fee
        ]);        

        $success = array('success'=>1,'content'=>'下单成功');
        return json_encode($success);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

   

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function waptrade()
    { 
        //var_dump('here'); exit();
        $user_id = Auth::user()->id;
        $buyhistories = BuyHistory::where('user_id', '=', $user_id)->get();
       // var_dump($buyhistories);exit();
        $saveday = 0;
        if (count($buyhistories)){
            $save_date = BuyHistory::where('user_id','=',$user_id)->first()->created_at;
            $diff  	= date_diff( date_create($save_date) , date_create());

            if ($diff->d == 0 | $diff->h >8){
                $saveday=1;
            }else{
                $saveday = $diff->d;
            }

        }   
        $setting = Setting::latest()->first();   
        return view('home.site.waptrade')->with(compact('buyhistories','saveday','setting')); 
    }
    public function wapmingxi()
    { 
        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        $sellhistories = SellHistory::where('user_id', '=', $user_id)->get();
        $total_gain = $sellhistories -> sum('fee'); 
        $money_wallet = MoneyWallet::where('id', '=', $user->money_wallet_id)->first();
        $stock_wallet = StockWallet::where('id', '=', $user->stock_wallet_id)->first();   
        $setting = Setting::latest()->first(); 
        $funds = FundRequest::where('user_id',$user->id)
                ->where('type','出金')->get();
        if($funds){
            $fund_amount = $funds->sum('money'); 
        }       
        return view('home.site.wapmingxi')->with(compact('sellhistories','money_wallet', 'stock_wallet', 'setting', 'total_gain', 'fund_amount')); 
    }
    public function wapindex()
    {
        $this->buyhistory_init();
        $this->liza_init();
        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        $money_wallet = MoneyWallet::where('id', '=', $user->money_wallet_id)->first();
        $stock_wallet = StockWallet::where('id', '=', $user->stock_wallet_id)->first();
        $funds = FundRequest::where('user_id',$user->id)
                            ->where('type','出金')->get();
        if($funds){
            $fund_amount = $funds->sum('money'); 
        }         
        return view('home.site.wapindex')->with(compact('money_wallet', 'stock_wallet', 'fund_amount', 'user'));
    }

    public function wapzhifu()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        $moneywallet = MoneyWallet::where('id', '=', $user->money_wallet_id)->first();
        return view('home.site.wapzhifu')->with(compact('moneywallet','user'));
    }

    public function waporder()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        $money_wallet = MoneyWallet::where('id', '=', $user->money_wallet_id)->first();
        $stock_wallet = StockWallet::where('id', '=', $user->stock_wallet_id)->first();
        $fund = FundRequest::where('user_id',$user->id)->sum('money');
        $funds = FundRequest::where('user_id',$user->id)
                ->where('type','出金')->get();
        if($funds){
            $fund_amount = $funds->sum('money'); 
        } 
        $buyingfee = Setting::latest()->first()->cost_bull_max;
        return view('home.site.waporder')->with(compact('money_wallet','stock_wallet','user', 'fund_amount', 'buyingfee'));
    }
    public function wapinfo()
    {
         $user_id = Auth::user()->id;
         $user = User::where('id','=', $user_id)->first();
         $setting = Setting::latest()->first();
         $money_wallet = MoneyWallet::where('id', '=', $user->money_wallet_id)->first();
         $stock_wallet = StockWallet::where('id', '=', $user->stock_wallet_id)->first();
         $fund = FundRequest::where('user_id',$user->id)->sum('money');
         $funds = FundRequest::where('user_id',$user->id)
                ->where('type','出金')->get();
        if($funds){
            $fund_amount = $funds->sum('money'); 
        } 
        return view('home.site.wapinfo')->with(compact('money_wallet','stock_wallet','user', 'setting','fund', 'fund_amount'));
    }
    public function wapxiaoxi()
    {
        $user_id = Auth::user()->id;
        $threads = Thread::forUser(Auth::id())->get();    

        return view('home.site.wapxiaoxi')->with(compact('threads'));
    }

    public function wapnew()
    {
        // 获取文章
        // $site = Cache::remember('home:site', 10080, function () {
        //     return Site::select('id', 'name', 'url', 'description')
        //         ->where('audit', 1)
        //         ->orderBy('sort')
        //         ->get();
        // });
        $head = [
            'title'       => '推荐博客',
            'keywords'    => '推荐博客',
            'description' => '推荐博客',
        ];
        $assign = [
            'site'        => "",
            'head'        => $head,
            'category_id' => 'index',
            'tagName'     => '',
        ];

        return view('home.site.wapnew', $assign);
    }
    public function wapatm()
    {
        // 获取文章
        // $site = Cache::remember('home:site', 10080, function () {
        //     return Site::select('id', 'name', 'url', 'description')
        //         ->where('audit', 1)
        //         ->orderBy('sort')
        //         ->get();
        // });
        $head = [
            'title'       => '推荐博客',
            'keywords'    => '推荐博客',
            'description' => '推荐博客',
        ];
        $assign = [
            'site'        => "",
            'head'        => $head,
            'category_id' => 'index',
            'tagName'     => '',
        ];

        return view('home.site.wapatm', $assign);
    }
    public function alipayapi()
    {
        // 获取文章
        // $site = Cache::remember('home:site', 10080, function () {
        //     return Site::select('id', 'name', 'url', 'description')
        //         ->where('audit', 1)
        //         ->orderBy('sort')
        //         ->get();
        // });
        $head = [
            'title'       => '推荐博客',
            'keywords'    => '推荐博客',
            'description' => '推荐博客',
        ];
        $assign = [
            'site'        => "",
            'head'        => $head,
            'category_id' => 'index',
            'tagName'     => '',
        ];

        return view('home.payment.alipay.alipayapi', $assign);
    }

    public function buytime()
    {
        $timenow = '';
    }

    public function profile(){
        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        $moneywallet = MoneyWallet::where('id', '=', $user->money_wallet_id)->first();
        $stockwallet = StockWallet::where('id', '=', $user->stock_wallet_id)->first();
        //$buyhistories = BuyHistory::where('user_id', '=', $user_id)->get();
        $sell_histories = SellHistory::where('user_id', '=', $user_id)->get();
        return view('home.index.profile')->with(compact('moneywallet', 'stockwallet', 'sell_histories'));
    }

    public function fund(){
        //var_dump($_POST['type']);exit();
        $user_id = Auth::user()->id;
        $user = User::where('id','=', $user_id)->first();
        $res = FundRequest::create([
            'user_id' => $user_id,
            'type' =>$_POST['type'],
            'money' => $_POST['money'],
            'bank' => $_POST['bank']
        ]);
        return redirect('/site/profile');

    }
}
