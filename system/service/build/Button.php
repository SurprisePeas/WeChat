<?php namespace system\service\build;
use system\service\Wx;

class Button extends Wx{
	/**
	 * @param $data
	 */
	public function create($json) {
		$url ="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $this->accessToken();
		$res = Curl::post($url,$json);
		dd($res);
		return json_decode($res,true);
	}
}