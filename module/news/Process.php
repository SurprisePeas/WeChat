<?php namespace module\news;

class Process {
	public function handler( $kid ) {
		//去回复信息表(reply_new)里查询信息
		$content = Db::table( 'reply_news' )->where( 'kid', $kid )->get();
		$reply   = [];
		//将数据库里的数据赋值给微信服务器需要的数据
		foreach ( $content as $v ) {
			$res['Title']       = $v['title'];
			$res['Description'] = $v['description'];
			$res['PicUrl']      = __ROOT__ . '/' . $v['thumb'];
			$res['Url']         = $v['url'];
			$reply[]            = $res;
		}
		Wx::instance( 'message' )->news( $reply );
	}
}