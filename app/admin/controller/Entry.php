<?php namespace app\admin\controller;



/**
 * 后台入口控制类
 * login登录验证
 * 后台主页显示
 */
class Entry{
    //后台主页
    public function index(){
        //进行用户登录状态验证
        User::isLogin();
        $username = v('user.username');
        return view();
    }

    //后台登录页面
    public function login(){
        if (IS_POST){
            //调动User服务
            if(User::login()){
                message('登录成功','index','success');
            }
        }
        return view();
    }

    //登出账号
    public function userOut(){
        session_unset();
        session_destroy();
        go(u('entry/login'));
    }
}

