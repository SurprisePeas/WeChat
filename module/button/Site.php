<?php namespace module\button;

use module\BaseSite;
use system\model\Button;

class Site extends BaseSite {
	/**
	 * 菜单列表
	 */
	public function AdminLists() {
		$data = Db::table( 'button' )->get();
		View::with( 'data', $data );
		$this->display( 'lists' );
	}

	/**
	 * 添加/编辑 共用 判断如果有GET id 说明是编辑
	 */
	public function AdminPost() {
		$id = Request::get( 'id' );

		//添加
		if ( IS_POST ) {
			$postData        = Request::post();
			$model           = new Button();
			$model['name']   = $postData['name'];
			$model['id']     = $postData['id'];
			$model['data']   = $postData['data'];
			$model['status'] = 0;
			$model->save();
			message( '保存成功', site_url( 'site/lists' ), 'success' );
		}

		//编辑
		if ( $id ) {
			//查找传递的参数 数据  并分配到页面上
			$field = Db::table( 'button' )->find( $id );
			View::with( 'field', $field );
		}
		$this->display( 'post' );
	}

	/**
	 * 按钮菜单 删除
	 */
	public function AdminDel() {
		echo '就不删除...';
	}


	/**
	 * 按钮菜单推送
	 */
	public function AdminPush() {
		$id      = Request::get( 'id' );
		$model   = new Button();
		$findOne = $model->find( $id );
		//推送数据 创建微信按钮
		$res = Wx::instance( 'button' )->create( $findOne['data'] );
		if ( $res['errcode'] == 0 ) {
			$findOne->status = 1;
			$findOne->save();
			message( '推送成功', site_url( 'site/lists' ), 'success' );
		}
	}


}