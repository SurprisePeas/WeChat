<?php namespace app\admin\controller;

use system\model\Config;
use system\model\Keywords;

/**
 * 信息处理控制器
 */
class Message {
	public function __construct() {
		User::isLogin();
	}

	/**
	 * 消息列表显示
	 * @return mixed
	 */
	public function lists() {
		//通过地址m参数获得需要查找module名称
		$module = Request::get( 'm' );
		$data   = Db::table( 'keywords' )->where( 'module', $module )->paginate( 10 );

		return view()->with( 'data', $data );
	}

	/**
	 * 添加内容
	 */
	public function post() {
		//获得地址栏m参数,实例化这个模块
		$module = Request::get( 'm' );
		$class  = 'module\\' . $module . '\Message';
		$obj    = new $class;

		//将提交的数据存入到 keywords表中
		if ( IS_POST ) {
			$keyword            = new Keywords();
			$keyword['keyword'] = Request::post( 'keyword' );
			$keyword['module']  = $module;
			$kid                = $keyword->save();

			//执行Message模块(module)里的 replySub方法,将数据存入ReplyBase表里
			$res = $obj->replySub( $kid );

			message( '添加成功', u( 'lists', [ 'm' => $_GET['m'] ] ), 'success' );
		}

		//将Message模块里的display(回复信息内容模块)分配到页面去
		View::with( 'messageDispay', $obj->display() );

		return view();
	}

	/**
	 *
	 */
	public function default_message() {
		if ( IS_POST ) {
			$config     = new Config();
			$config->id = 1;

			$config->default_message = Request::post( 'content' );

			$config->save();

			message( '更改成功', '', 'success' );
		}

		return view();
	}

}

