<?php namespace module\material;

use hdphp\weixin\Weixin;
use module\BaseSite;

class Site extends BaseSite {

	/**
	 * 图片素材列表
	 */
	public function AdminImageLists() {
		$data = Db::table( 'material_images' )->get();
		View::with( 'data', $data );
		$this->display( 'image_lists' );
	}

	/**
	 * 图文素材
	 */
	public function AdminNewsLists() {
		$data           = Db::table( 'material_news' )->paginate( 8 );
		View::with( 'data', $data );
		$this->display( 'news_lists' );
	}

	/**
	 * 图文信息添加
	 */
	public function AdminNewsPost() {
		$this->display( 'news_post' );
	}

	/**
	 * 删除 素材
	 */
	public function AdminDel() {
		$media_id=Request::get('media_id');
		$result = Wx::instance('material')->delete($media_id);
		dd($result);
	}

	/***
	 * 将图片推送到微信
	 */
	public function AdminPushImg() {
		$file = Request::post( 'file' );
		$res  = Wx::instance( 'Material' )->upload( 'image', $file );
		if ( is_array( $res ) and isset( $res['media_id'] ) ) {
			$data['path']     = $file;
			$data['media_id'] = $res['media_id'];
			$data['wx_path']  = $res['url'];
			Db::table( 'material_images' )->insert( $data );
			ajax( [ 'valid' => 1, 'message' => '添加成功', 'data' => $data ] );
		}
	}


}