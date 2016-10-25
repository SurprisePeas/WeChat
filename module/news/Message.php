<?php namespace module\news;

use module\BaseMessage;
use system\model\ReplyNews;

class Message extends BaseMessage {

	/**
	 * 回复信息内容模块
	 */
	public function display() {
		return View::fetch( 'module/news/template/display.html' );
	}

	/**
	 * 回复内容添加进库
	 */
	public function replySub( $kid ) {
		$model = new ReplyNews();
		$data  = Request::post( 'data' );
		//将POST的Json数据进行转码 然后存库
		$data = json_decode( $data, true );

		foreach ( $data as $v ) {
			$model->title       = $v['Title'];
			$model->description = $v['Description'];
			$model->thumb       = $v['PicUrl'];
			$model->url         = $v['Url'];
			$model->content     = $v['content'];
			$model->type        = $v['type'];
			$model->kid         = $kid;
			$model->save();
		}

		return true;
	}

}