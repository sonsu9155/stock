<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use App\User;
use Hash;
use App\MoneyWallet;
use App\StockWallet;
use App\UserSession;
use App\RoleUser;
use App\Setting;
//use App\smsVerification;
use Session;
//use Sms;

class LoginController extends Controller
{
    /**
     * 登录页面
     *
     * @return mixed
     */   
    public function index()
    {  
         
       return view('home.login.index');  
    }

    public function super() {
        
        if (!Auth::check()) {
            return redirect('login');
        } else {
            if (Auth::user()->hasRole('super_admin')) {
                return redirect('dashboard');
            } else if (Auth::user()->hasRole('pabrik_admin_timbangan')) {
                return redirect('scales');
            } else if (Auth::user()->hasRole('hotel_supervisor')) {
                return redirect('general_report');
            } else {
                return redirect('shortcuts');
            }
        }
    }
  

    public function doLogin(Request $request) {
        
       
        if (Auth::attempt(
            ['username' => $request['name'],
                'password' => $request['password']]           
        )) {
            // store session
            //var_dump($request['name']);exit();
            $found = UserSession::where('user_id', '=', Auth::user()->id)->first();
            if ($found) {
                $found->update(['session_id' => Session::getId()]);
            } else {
                UserSession::create(['user_id' => Auth::user()->id, 'session_id' => Session::getId()]);
            }
            return  redirect()->intended('/site/wapindex');           
        } else {
            return redirect('/login/index')
            ->with('error','ID或密码错误!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login/index');
    }

    public function register()
    {
       
       return view('home.login.reg');
       
    }
    public function caution()
    {
       
       return view('home.login.caution');
       
    }
    protected function validator(array $data){
       // return 
    }
    protected function create(Request $data)
    {
        $open_xitong = Setting::latest()->first()->open_xitong;
        if($open_xitong == '0'){
            
            return redirect('/login/register')->with('error','用户注册已被拒绝。请稍后再试。');
        }
       
        // $this->validate($data, [
        //     'name' => 'required|min:2',
        //     'password' => 'required|min:6', 
        //     'confirmpassword' => 'required|min:6|same:password',
        //     'realname' => 'required|min:2',
        //     'idcard' => 'required',
        //     'mobile' => 'required|numeric', 
        //     'kh_bank' => 'required|numeric',
        //     'bank_name' => 'required',
        //     'bank_card' => 'required'
            
        // ]);
            MoneyWallet::create([
                'before_amount' => 0,
                'after_amount' => 0
            ]);
            StockWallet::create([
                'before_amount' => 0,
                'after_amount' => 0
            ]);
            $moeny = MoneyWallet::get();
            $stock = StockWallet::get();
            //var_dump($data->file('filename'));exit();
            if($data->hasfile('filename'))
            {
            
                foreach($data->file('filename') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/upload/'.$data['name'].$data['idcard'], $name);  
                    $image_url[] = $name;  
                }
            }
            $result = User::create([
                'username'     => $data['name'],
                'password' => Hash::make($data['password']) ,
                'name'  => $data['realname'],
                'idcard'  => $data['idcard'],
                'kh_bank' => $data['kh_bank'],
                'bank_name' => $data['bank_name'],        
                'bank_card'  => $data['bank_card'],  
                'phone'    => $data['mobile'], 
                'atmpwd' =>$data['atmpwd'],
                'image_url' => json_encode($image_url),            
                'status' => $data['agent'],
                'money_wallet_id' => $moeny[ $moeny->count() -1 ]->id,
                'stock_wallet_id' => $stock[ $stock->count() -1 ]->id
            ]);            
            $user_id = User::latest()->first()->id;
            RoleUser::create([
                'user_id'  => $user_id,
                'role_id'  => '2'
            ]);
            echo '<script> alert("注册成功。请登录。");</script>' ;
            echo "<script>location.href = '/web/index'</script>";
    }
   
}
