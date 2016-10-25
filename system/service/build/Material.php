<?php namespace system\service\build;

use system\service\Wx;

class Material extends Wx {

	/**
	 * @param $type 媒体文件类型 image voice video thumb
	 * @param $file_path
	 * @param int $mediaType 0:永久素材     1:临时素材
	 */
	public function upload( $type, $file_path, $mediaType = 0 ) {
		$at = $this->accessToken();
		if ( $mediaType ) {//临时素材
			$url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$at}&type={$type}";
		} else {//永久素材
			$url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token={$at}&type={$type}";
		}
		$mine      = $type == 'image' ? 'image/jpeg' : '';
		$file_path = realpath( $file_path );
		if ( class_exists( '\CURLFile' ) ) {//使用curlfile来实例文件
			$fileData = [
				'media' => new \CURLFile( realpath( $file_path ), $mine )
			];
		} else {
			$fileData = [
				'media' => '@' . realpath( $file_path )
			];
		}
		$result = Curl::post( $url, $fileData );

		return json_decode( $result, true );
	}

	//获取永久素材
	public function getMaterial( $media_id ) {
		$url  = "https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=" . $this->accessToken();
		$json = '{"media_id":"' . $media_id . '"}';

		return Curl::post( $url, $json );
	}

	//获取素材列表
	public function lists( $param ) {
		$url     = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=" . $this->accessToken();
		$content = Curl::post( $url, urldecode( json_encode( $this->urlencodeArray( $param ) ) ) );
		$result  = json_decode( $content, true );

		return $result;
	}

	//删除永久素材
	public function delete( $media_id ) {
		$url     = "https://api.weixin.qq.com/cgi-bin/material/del_material?access_token={$this->accessToken()}";
		$json    = '{"media_id":"' . $media_id . '"}';
		$content = Curl::post( $url, $json );
		$result  = json_decode( $content, TRUE );
		return $result;
	}

	//将数据中的中文转url编码，因为微信不能识别\uxxx json_encode后的中文
	protected function urlencodeArray( $data ) {
		$result = [ ];
		foreach ( $data as $i => $d ) {
			$result[ urlencode( $i ) ] = is_array( $d ) ? $this->urlencodeArray( $d ) : urlencode( $d );
		}

		return $result;
	}
}