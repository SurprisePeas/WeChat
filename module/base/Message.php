<?php namespace module\base;

use system\model\ReplyBase;

class Message{
    /**
     * 回复信息内容模块
     */
    public function display(){
        return View::fetch( 'module/base/template/display.html' );
    }

    /**
     * 将回复内容存入到回复表里
     */
    public function replySub($kid){
        $reply = new ReplyBase();
        $reply['content'] = Request::post('content');
        $reply['kid'] = $kid;
        $reply->save();return true;
    }
}