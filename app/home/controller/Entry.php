<?php namespace app\home\controller;
/**
 * Created by PhpStorm.
 * User: SurprisePeas
 * Date: 2016/10/10/ 0010
 * Time: 18:15
 */

class Entry {
	public function __construct() {
		Wx::bind();
	}

	public function index() {
		//获得微信服务器发送来的信息
		$message = Wx::getMessage();

		//判断是文本消息
		if ( Wx::instance( 'message' )->isText() ) {
			$this->text( $message->Content );
		}

		//菜单点击事件
		if ( Wx::instance( 'message' )->isClick() ) {
			//获得微信传回的点击键名 EventKey
			$content = $message->EventKey;
			$this->text( $content );
		}

		//没有关键词的时候返回的默认信息
		Wx::instance( 'message' )->text( v( 'config.default_message' ) );
	}

	public function text( $content ) {
		// 查询数据库是否有关键字
		$keyword = Db::table( 'keywords' )->where( 'keyword', $content )->first();

		//判断如果有关键字的话就启动相应模块进行返回信息响应
		if ( $keyword ) {
			$class = 'module\\' . $keyword['module'] . '\Process';
			( new $class() )->handler( $keyword['kid'] );
			exit;

		}
	}

}