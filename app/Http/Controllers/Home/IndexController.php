<?php

namespace App\Http\Controllers\Home;

use Agent;
use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\Store;
use App\News;
use Cache;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 首页
     *
     * @throws \Exception
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 获取文章列表数据
       
        $head = [
            'title'       => '财智通',
            'keywords'    => '',
            'description' => '',
        ];

        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
       

        return view('home.index.index', $assign);
    }

    

    /**
     * 用于做测试的方法
     */
    public function download()
    {
        return view('home.index.dow.download');
    }

    ///////////////
    public function press()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.press.index', $assign);
    }

    ///////////////
    public function livevideo()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.livevideo', $assign);
    }
    ///////////////
    public function dow()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.dow.index', $assign);
    }
    ///////////////
    public function new()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.new.index', $assign);
    }
    ///////////
    public function pro()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.pro.index', $assign);
    }
    ////////////
    public function zp()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.zp.index', $assign);
    }
    /////////////
    public function zs()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.zs.index', $assign);
    }
    /////////////////
    public function lx()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.lx.index', $assign);
    }
    //////////////
    public function map()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }

        return view('home.index.map.index', $assign);
    }
    //////////////////////press
    public function press_list_1()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_1.index', $assign);
    }
    public function press_list_1_5()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_1.5', $assign);
    }
    public function press_list_1_6()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_1.6', $assign);
    }
    public function press_list_1_7()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_1.7', $assign);
    }
    public function press_list_2()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_2.index', $assign);
    }
    public function press_list_2_8()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_2.8', $assign);
    }
    public function press_list_2_9()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_2.9', $assign);
    }
    public function press_list_2_10()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_2.10', $assign);
    }
    public function press_list_3()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_3', $assign);
    }
    public function press_list_3_11()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_3.11', $assign);
    }
    public function press_list_3_12()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_3.12', $assign);
    }
    public function press_list_3_13()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_3.13', $assign);
    }
    public function press_list_3_25()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.list_3.25', $assign);
    }
    public function press_11_1()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.press11_1', $assign);
    }
    public function press_11_2()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.press11_2', $assign);
    }
    public function press_11_3()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.press.press11_3', $assign);
    }
    ////////////////////pro
    public function pro_14_1()
    {
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro14_1', $assign);
    }
    public function pro_14_2()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro14_2', $assign);
    }
    public function pro_40()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro40', $assign);
    }
    public function pro_41()
    {
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro41', $assign);
    }
    public function pro_42()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro42', $assign);
    }
    public function pro_43()
    {
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro43', $assign);
    }
    public function pro_44()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro44', $assign);
    }
    public function pro_45()
    {
        $head = [
            'title'       => '新闻中心_财智通',
            'keywords'    => '',
            'description' => '',
        ];
        $news = News::latest()->first();
        if($news){
            $assign = [
                'category_id' => 'index',
                'article'     => $news->contents,
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        else{
            $assign = [
                'category_id' => 'index',
                'article'     => '欢迎您访问财智通融资融劵交易平台官方网站',
                'head'        => $head,
                'tagName'     => '',
            ];
        }
        return view('home.index.pro.pro45', $assign);
    }
}
