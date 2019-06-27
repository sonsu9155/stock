<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\BuyHistory;
use App\SellHistory;
use App\Setting;
use App\User;
use App\MoneyWallet;
use App\StockWallet;

class BuyHistoryInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buyhistory:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'composition init when user fail 80%';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        
        $buyhistories = BuyHistory::get();      
        $baocang_precent = Setting::latest()->first()->baocang_precent; 
        $cost_exchange_rate = Setting::latest()->first()->cost_exchange_rate;   
        if($buyhistories){
            foreach($buyhistories as $index =>$buyhistory){
                $user_id = $buyhistory->user_id;
                $user = User::where('id',$user_id)->first();
                $moneywallet = MoneyWallet::where('id', $user->money_wallet_id)->first();
                $stockwallet = StockWallet::where('id', $user->stock_wallet_id)->first();
                $stockcode = $buyhistory->stockType->code;                            
                $realdata = $this->getstockPrice($stockcode);  
                $cur_price = explode (",", $realdata);
                //var_dump($cur_price[3]);exit();
                $rate_money = ($moneywallet->after_amount + $moneywallet->before_amount - $stockwallet->after_amount)/$stockwallet->after_amount*($cost_exchange_rate-1);
               
                ///////////////////// money decrease limit ////////////////

                if ($baocang_precent < (1-$rate_money)*100){
                    $sell_buyhistories = BuyHistory::where('user_id',$user_id)->get(); 
                    foreach($sell_buyhistories as $sell_buyhistory){
                        $this->sell($sell_buyhistory->id, $cur_price[3], $sell_buyhistory->amount);
                    }  
                    
                    //var_dump($rate_money);exit();
                } 
                //////////////////// save days limit /////////////////////
                $save_date = $buyhistory->created_at;
                $save_max_day = Setting::latest()->first()->cost_save_day; 
                $diff  	= date_diff( date_create($save_date) , date_create());
                //var_dump($save_max_day);exit();
                if ($diff->d >= $save_max_day){            //////////////////////////save_max_day///////////////////   
                    $this->sell($buyhistory->id, $cur_price[3], $buyhistory->amount);
                }
               
            }   
        }   
    }
     function getstockPrice($stockcode){
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
    function sell($buyhistoryid, $cur_price, $cur_num ){      

        $buyhistory = BuyHistory::where('id','=', $buyhistoryid)->first();
      

        ////////////////  trading slip price  &  dc5,dc6,dc7,dc8,dc9 ///////////////////
        $stockcode = $buyhistory->stockType->code;
        
        $realdata = $this->getstockPrice($stockcode);            
        $cur_price_real = explode (",", $realdata);    
       //var_dump($cur_price_real);exit();

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
          // var_dump($cur_price_real);exit();
            return back()->with('error','目前的价格高于待售价格。');
        }elseif($slip_price < - $slip_down_float){
            return back()->with('error','目前的价格低于待售价格。');
        }

        $user_id = $buyhistory->user_id;
        $user = $buyhistory->user;
        $stocktype_id = $buyhistory->stockType->id;
        //var_dump($user->money_wallet->after_amount);exit();
      
        $amount = $cur_num;
        $cost = $buyhistory->cost;
        $method = $buyhistory->method;      
        $after_amount = $user->money_wallet->after_amount;
        $before_amount = $user->money_wallet->before_amount;
        $save_date = BuyHistory::where('user_id','=',$user_id)->first()->created_at;
        $save_fee = Setting::latest()->first()->cost_save_max;
        $state_fee = Setting::latest()->first()->cost_state_max;
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
       
       if ($method==1){
            $gain = $cur_price*$amount*100 - $cost*$amount*100 - $cost*$amount*100*($buy_fee + $sell_fee + $state_fee + $saveday* $save_fee);
       }else{
            $gain = $cost*$amount*100 - $cur_price*$amount*100  - $cost*$amount*100*($buy_fee + $sell_fee + $state_fee + $saveday* $save_fee);
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
       
       $res = SellHistory::create([
           'user_id'   => $user_id,
           'stock_type_id' => $stocktype_id,
           'buy_cost' => $cost,
           'buy_fee' => $buy_fee,
           'sell_fee' => $sell_fee ,
           'state_fee' => $state_fee,
           'buy_time' => $save_date,
           'amount'    => $amount,
           'sell_cost'  => $cur_price,
           'method'    => $method,
           'before_amount' => $after_amount,
           'save_fee' => $save_fee,
           'fee'       => $gain
       ]);
    }
}
