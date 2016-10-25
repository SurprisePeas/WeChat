<?php namespace system\service;

/**
 * 微信处理的公共类
 * Class Wx
 * @package system\service
 */
class Wx {
	protected $message;

	public function __construct() {
		$this->message = $this->getMessage();
	}

    /**
     * 获取主动消息使用access_token接口
     * @param string $name 缓存access_token名字 用于区分多个微信公众号
     */
	protected function accessToken($name='access_token'){
	    //判断如果 Cache缓存里没有传入的名称,则执行并存入缓存中
        if( ! $access_token = Cache::get($name)){
            //读取wx配置项里的参数
            $appid = c('wx.appid');
            $secret = c('wx.secret');
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret";
            //请求远程url(使用Curl)
            $ccUrl = Curl::get($url);
            $ccUrl = json_decode($ccUrl,true);
            $access_token = $ccUrl['access_token'];
            Cache::set($name,$ccUrl['access_token'],3600);//将access_token存入缓存
        }
        return $access_token;
    }

	/**
	 * 获取微信服务器发送来的消息
	 * @return \SimpleXMLElement
	 */
	public function getMessage() {
		if ( isset( $GLOBALS['HTTP_RAW_POST_DATA'] ) ) {
			$post = $GLOBALS['HTTP_RAW_POST_DATA'];

			return simplexml_load_string( $post, 'SimpleXMLElement', LIBXML_NOCDATA );
		}
	}

	/**
	 * 实例化 -- 功能类
     * @ucfirst 将首字母转为大写
     * 存入静态变量,避免每次都实例化一次
	 */
	public static function instance( $name ) {
		static $cache = [ ];
		if ( ! isset( $cache[ $name ] ) ) {
			$class          = '\system\service\build\\' . ucfirst( $name );
			$cache[ $name ] = new $class;
		}
		return $cache[ $name ];
	}

    //与微信服务器进行绑定
    public static function bind() {
        if ( isset( $_GET["signature"] )
             && isset( $_GET["timestamp"] )
             && isset( $_GET["nonce"] )
             && isset( $_GET["echostr"] )
        ) {
            $signature = $_GET["signature"];
            $timestamp = $_GET["timestamp"];
            $nonce     = $_GET["nonce"];
            $token     = c( "wx.token" );
            $tmpArr    = [ $token, $timestamp, $nonce ];
            sort( $tmpArr, SORT_STRING );
            $tmpStr = implode( $tmpArr );
            $tmpStr = sha1( $tmpStr );
            if ( $tmpStr == $signature ) {
                die( $_GET["echostr"] );
            }
        }
    }

}

