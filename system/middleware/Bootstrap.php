<?php namespace system\middleware;
class Bootstrap{
    //此函数会自动执行
    public function run(){

        //获得Session里的uid进行查询,并存入 全局变量v 里
        if ($uid = Session::get('uid')){
            $user = Db::table('user')->find($uid);
            $res = v('user',$user);
        }

        //加载配置项
        $default_message = Db::table('config')->find(1);
        v('config',$default_message);

        //定义模块
        if ( $module = Request::get('m') ){
            v( 'module', ['name'=>$module] );
        }

    }
}