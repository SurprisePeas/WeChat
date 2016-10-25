<?php namespace app\admin\controller;

class Module{
    protected $class;
    protected $action;

    public function __construct(){
        $info = explode('/',$_GET['a']);
        /**
        p($info);
            Array (
            [0] => site
            [1] => lists)
         */
        $this->class = 'module\\' . $_GET['m'] . '\\' . ucfirst($info[0]) ;
        $this->action = $info[1];
    }

    /**
     * Module入口文件,进行判断处理是调用前台还是后台
     */
    public function entry(){
        //  ?s=admin/module/entry&a=site/lists&t=admin&m=button
        switch (Request::get('t')){
            case 'admin':
                $this->admin();
                break;
            case 'web':
                $this->web();
                break;
        }
    }

    /**
     * @return mixed 后台访问
     */
    protected function admin(){
        User::isLogin();//后台需要进行验证登录状态

        //调用回调函数，并把一个数组参数作为回调函数的参数 $this->class会调用admin.$this->action
        return call_user_func_array( [new $this->class,'admin'.$this->action], [] );
    }

    /**
     * @return mixed 前台访问
     */
    protected function web(){
        return call_user_func_array( [new $this->class,'web'.$this->action], [] );
    }

}