<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/super', 'Home\LoginController@super');

// Session Routes
    Route::get('login', 'SessionsController@login');
    Route::post('login', 'SessionsController@doLogin');
    Route::get('logout', 'SessionsController@logout');
    Route::get('forgot_password', 'SessionsController@forgot');
    Route::post('forgot_password', 'SessionsController@doForgot');
    Route::get('password/reset/{token}', 'SessionsController@passwordReset');
    Route::post('password/reset/{token}', 'SessionsController@doPasswordReset');

Route::group(
    ['middleware' => 'auth'], function () {
        Route::get('dashboard', ['uses' => 'DashboardsController@dashboard', 'middleware' => ['role:super_admin']]);
        Route::get('buyhistory', ['uses' => 'BuyHistoryController@index', 'middleware' => ['role:super_admin']]);
        Route::get('sellhistory', ['uses' => 'SellHistoryController@index', 'middleware' => ['role:super_admin']]);
        Route::post('sellhistory/delete/{id}', ['uses' => 'SellHistoryController@delete', 'middleware' => ['role:super_admin']]);

        Route::get('deposithistory', ['uses' => 'DepositController@index', 'middleware' => ['role:super_admin']]);
        Route::get('stockgraph', ['uses' => 'StockGraphController@index', 'middleware' => ['role:super_admin']]);
        
        
        Route::get('users', ['uses' => 'UserController@index', 'middleware' => ['role:super_admin']]);
        Route::get('users/create', ['uses' => 'UserController@create', 'middleware' => ['role:super_admin']]);
        Route::post('users/create', ['uses' => 'UserController@docreate', 'middleware' => ['role:super_admin']]);
        Route::get('users/edit/{id}', ['uses' => 'UserController@edit', 'middleware' => ['role:super_admin']]);
        Route::post('users/update/{id}', ['uses' => 'UserController@update', 'middleware' => ['role:super_admin']]);
        Route::post('users/delete/{id}', ['uses' => 'UserController@delete', 'middleware' => ['role:super_admin']]);
        Route::get('users/detail/{id}', ['uses' => 'UserController@detail', 'middleware' => ['role:super_admin']]);

        Route::get('moneywallets', ['uses' => 'MoneyWalletsController@index', 'middleware' => ['role:super_admin']]);
        Route::get('moneywallets/edit', ['uses' => 'MoneyWalletsController@edit', 'middleware' => ['role:super_admin']]);       
        Route::post('moneywallets/update', ['uses' => 'MoneyWalletsController@update', 'middleware' => ['role:super_admin']]);
        Route::get('moneywallets/delete/{id}', ['uses' => 'MoneyWalletsController@delete', 'middleware' => ['role:super_admin']]);

        Route::get('withdrawhistory', ['uses' => 'WithdrawController@index', 'middleware' => ['role:super_admin']]);
        Route::get('withdrawhistory/delete/{id}', ['uses' => 'WithdrawController@delete', 'middleware' => ['role:super_admin']]);

        Route::get('stocktype', ['uses' => 'StockTypeController@index', 'middleware' => ['role:super_admin']]);
        Route::get('stocktype/create', ['uses' => 'StockTypeController@create', 'middleware' => ['role:super_admin']]);
        Route::post('stocktype/create', ['uses' => 'StockTypeController@postCreate', 'middleware' => ['role:super_admin']]);
        Route::get('stocktype/edit/{id}', ['uses' => 'StockTypeController@edit', 'middleware' => ['role:super_admin']]);   
        Route::post('stocktype/update/{id}', ['uses' => 'StockTypeController@update', 'middleware' => ['role:super_admin']]); 
        Route::post('stocktype/delete/{id}', ['uses' => 'StockTypeController@delete', 'middleware' => ['role:super_admin']]); 

        Route::get('onlineuser', ['uses' => 'OnlineUserController@index', 'middleware' => ['role:super_admin']]);
        Route::post('onlineuser/delete/{id}', ['uses' => 'OnlineUserController@delete', 'middleware' => ['role:super_admin']]);

        Route::get('message', ['uses' => 'MessagesController@message', 'middleware' => ['role:super_admin']]);
        Route::post('message/delete/{id}', ['uses' => 'MessagesController@delete', 'middleware' => ['role:super_admin']]);

        Route::get('setting', ['uses' => 'SettingController@setting', 'middleware' => ['role:super_admin']]);
        Route::post('setting/dosetting', ['uses' => 'SettingController@dosetting', 'middleware' => ['role:super_admin']]);

        Route::get('fundrequest', ['uses' => 'FundRequestController@index', 'middleware' => ['role:super_admin']]);
        Route::post('fundrequest/delete/{id}', ['uses' => 'FundRequestController@delete', 'middleware' => ['role:super_admin']]);

        Route::get('news', ['uses' => 'NewsController@index', 'middleware' => ['role:super_admin']]);
        Route::get('news/create', ['uses' => 'NewsController@create', 'middleware' => ['role:super_admin']]);
        Route::post('news/create', ['uses' => 'NewsController@postCreate', 'middleware' => ['role:super_admin']]);
        Route::get('news/edit/{id}', ['uses' => 'NewsController@edit', 'middleware' => ['role:super_admin']]);   
        Route::post('news/update/{id}', ['uses' => 'NewsController@update', 'middleware' => ['role:super_admin']]); 
        Route::post('news/delete/{id}', ['uses' => 'NewsController@delete', 'middleware' => ['role:super_admin']]); 
    }
);

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('/', 'Home\IndexController@index');  

    Route::get('/index/download', 'Home\IndexController@download');    
    
    //new
    Route::get('new/index', 'Home\IndexController@new');
    //dow
    Route::get('dow/index', 'Home\IndexController@dow');
   
    Route::get('zp/index', 'Home\IndexController@zp');
    //zs
    Route::get('zs/index', 'Home\IndexController@zs');
    //lx
    Route::get('lx/index', 'Home\IndexController@lx');
    //map
    Route::get('map/index', 'Home\IndexController@map');
    //
    Route::group(
        ['prefix' => 'press'], function () {
        Route::get('/index', 'Home\IndexController@press');
        Route::get('list_1/index', 'Home\IndexController@press_list_1');
        Route::get('list_1/5', 'Home\IndexController@press_list_1_5');
        Route::get('list_1/6', 'Home\IndexController@press_list_1_6');
        Route::get('list_1/7', 'Home\IndexController@press_list_1_7');
        Route::get('list_2/index', 'Home\IndexController@press_list_2');
        Route::get('list_2/8', 'Home\IndexController@press_list_2_8');
        Route::get('list_2/9', 'Home\IndexController@press_list_2_9');
        Route::get('list_2/10', 'Home\IndexController@press_list_2_10');
        Route::get('list_3/index', 'Home\IndexController@press_list_3');
        Route::get('list_3/11', 'Home\IndexController@press_list_3_11');
        Route::get('list_3/12', 'Home\IndexController@press_list_3_12');
        Route::get('list_3/13', 'Home\IndexController@press_list_3_13');
        Route::get('list_3/25', 'Home\IndexController@press_list_3_25');
        Route::get('press_11_1', 'Home\IndexController@press_11_1');
        Route::get('press_11_2', 'Home\IndexController@press_11_2');
        Route::get('press_11_3', 'Home\IndexController@press_11_3');
    });
    Route::group(
        ['prefix' => 'pro'], function () {
        Route::get('/index', 'Home\IndexController@pro');
        Route::get('14_1', 'Home\IndexController@pro_14_1');
        Route::get('14_2', 'Home\IndexController@pro_14_2');
        Route::get('40', 'Home\IndexController@pro_40');
        Route::get('41', 'Home\IndexController@pro_41');
        Route::get('42', 'Home\IndexController@pro_42');
        Route::get('43', 'Home\IndexController@pro_43');
        Route::get('44', 'Home\IndexController@pro_44');
        Route::get('45', 'Home\IndexController@pro_45');
    });
    
         
    Route::get('site/login', 'SessionsController@userlogin');
    Route::group(['middleware' => 'auth'],function(){
        Route::group(
            ['prefix' => 'site'], function () {
            Route::get('/', 'Home\IndexController@index');          
            Route::get('wapindex2', 'Home\SiteController@index');
            Route::get('wapindex', 'Home\SiteController@wapindex');
            Route::get('wapnew', 'Home\SiteController@wapnew');
            Route::get('wapzhifu', 'Home\SiteController@wapzhifu');
            Route::get('waporder', 'Home\SiteController@waporder');
            Route::get('wapatm', 'Home\SiteController@wapatm');
            Route::get('waptrade', 'Home\SiteController@waptrade');
            Route::get('wapmingxi', 'Home\SiteController@wapmingxi');
            Route::get('getstock', 'Home\SiteController@getstock');
            Route::get('getdeal', 'Home\SiteController@getdeal');
            Route::get('buytime', 'Home\SiteController@buytime');
            Route::get('sale_buy', 'Home\SiteController@sale_buy');
            Route::post('buystock', 'Home\SiteController@buystock');     
            Route::post('sell_act', 'Home\SiteController@sell_act');
            Route::get('wapxiaoxi', 'Home\SiteController@wapxiaoxi');          
            Route::get('wapinfo', 'Home\SiteController@wapinfo'); 
            Route::post('fund', 'Home\SiteController@fund'); 
        });
    });
    
    Route::group(['middleware' => 'auth'],function(){
        Route::group(
            ['prefix' => 'pc'], function () {   
            Route::get('wclient', 'Home\PcController@wclient');
            Route::get('w2user', 'Home\PcController@w2user');
            Route::get('wmain', 'Home\PcController@wclient');
            Route::get('w2fav', 'Home\PcController@w2fav');
            Route::get('w2trade', 'Home\PcController@w2trade');
            Route::get('w2pay', 'Home\PcController@w2pay');
            Route::get('w2paylog', 'Home\PcController@w2paylog');
            Route::get('w2atm', 'Home\PcController@w2atm');
            Route::get('w2atmlog', 'Home\PcController@w2atmlog');
            Route::get('w2pwd', 'Home\PcController@w2pwd');
            Route::get('w2message', 'Home\PcController@w2message'); 
            Route::post('buystock', 'Home\PcController@buystock');            
            Route::get('sale_buy', 'Home\PcController@sale_buy');
            Route::post('sell_act', 'Home\PcController@sell_act');
        });
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::group(['prefix' => 'web'], function(){
            Route::get('index', 'WebController@index');
            Route::get('operate', 'WebController@operate');
            Route::get('stockdata','WebController@stockdata');
            Route::get('stock_detail','WebController@stock_detail');
            Route::get('payment','WebController@payment');
            Route::get('payment_log','WebController@payment_log');
            Route::post('pay_page','WebController@pay_page');
            Route::get('selforder','WebController@selforder');
            Route::get('user','WebController@user');
            Route::get('atm','WebController@atm');
            Route::post('add_atm','WebController@add_atm');
            Route::get('atm_log','WebController@atm_log');
            Route::get('report_day','WebController@report_day');
            Route::get('report_week','WebController@report_week');
            Route::get('trade_detail','WebController@trade_detail');
            Route::get('cancash','WebController@cancash');
            Route::get('atmpwd','WebController@atmpwd');
            Route::post('save_atmpwd','WebController@save_atmpwd');
            Route::get('pwd','WebController@pwd');
            Route::post('save_pwd','WebController@save_pwd');
            Route::get('rules','WebController@rules');
            Route::get('news','WebController@news');
            Route::get('deal','WebController@deal');

        });
    });

    Route::group(
        ['prefix' => 'login'], function () {
        // 登录页面
        Route::get('index', 'Home\LoginController@index');
        Route::post('index', 'Home\LoginController@doLogin');
        Route::get('register', 'Home\LoginController@register');
        Route::post('register', 'Home\LoginController@create');
        Route::get('caution', 'Home\LoginController@caution');
       
       
        // 退出
        Route::get('logout', 'Home\LoginController@logout');
    });

   
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('sendmessage', 'SocketController@sendMessage');

