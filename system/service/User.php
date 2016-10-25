<?php namespace system\service;

/**
 * 后台管理员 服务
 * Class User
 * @package system\service
 */
class User {

    /***
     * 登陆检测
     * 判断是否有用户uid
     */
    public function isLogin(){
        if( ! Session::get('uid') ){
            message('先登录才能进行操作','admin/entry/login','warning');
        }
    }

    public function login(){
        //自动验证
        Validate::make([
            ['username', 'require', '账号不能为空'],
            ['password', 'require', '密码不能为空'],
        ]);

        $db = new \system\model\User();
        $findUser = $db->where('username',Request::post('username'))->first();

        if (! $findUser){
            message('账户不存在,请联系管理员','','error');
        }
        if ( $findUser['password'] != md5(Request::post('password'))){
            message('密码错误','','error');
        }

        $findUser->lginip = Request::ip();
        $findUser->logintime = time();
        $findUser->save();

        Session::set('uid',$findUser->uid);
        return true;
    }

}

