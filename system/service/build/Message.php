<?php namespace system\service\build;

use system\service\Wx;

class Message extends Wx {

	//文本信息检测
	public function isText() {
		return $this->message->MsgType == 'text';
	}

	//微信菜单点击事件
	public function isClick() {
		return $this->message->MsgType == 'event' && $this->message->Event == 'CLICK';
	}

	/**
	 * 发送文本消息
	 * 因为父类(Wx)已经获取微信发来消息内容
	 * 在其他有发送者(粉丝)等等信息
	 *
	 * @param $content
	 */
	public function text( $content ) {
		$time = time();
		echo <<<str
<xml>
<ToUserName><![CDATA[{$this->message->FromUserName}]]></ToUserName>
<FromUserName><![CDATA[{$this->message->ToUserName}]]></FromUserName>
<CreateTime>{$time}</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[$content]]></Content>
</xml>
str;
	}

	//图片回复接口
	public function image( $media_id ) {
		$time = time();
		echo <<<str
<xml>
<ToUserName><![CDATA[{$this->message->FromUserName}]]></ToUserName>
<FromUserName><![CDATA[{$this->message->ToUserName}]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<Image>
<MediaId><![CDATA[$media_id]]></MediaId>
</Image>
</xml>
str;
	}

	/**
	 * @param $data
	 * $data=[
	 *  [
	 *      'Title'=>'标题',
	 *      'Description'=>'描述',
	 *      'PicUrl'=>'图片',
	 *      'Url'=>'跳转链接'
	 *  ]
	 * ];
	 */
	public function news( $data ) {
		$time = time();
		$num  = count( $data );
		$str  = <<<str
<xml>
<ToUserName><![CDATA[{$this->message->FromUserName}]]></ToUserName>
<FromUserName><![CDATA[{$this->message->ToUserName}]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>$num</ArticleCount>
str;
		$item = '';
		foreach ( $data as $d ) {
			$item .= <<<php
<item>
<Title><![CDATA[{$d['Title']}]]></Title> 
<Description><![CDATA[{$d['Description']}]]></Description>
<PicUrl><![CDATA[{$d['PicUrl']}]]></PicUrl>
<Url><![CDATA[{$d['Url']}]]></Url>
</item>

php;
		}
		$xml = $str . '<Articles>' . $item . '</Articles></xml>';
		die( $xml );

	}
}