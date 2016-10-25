<?php namespace module\base;

class Process{
    public function handler($kid){
        $content = Db::table('reply_base')->where('kid', $kid)->pluck('content');
        $reply = json_decode($content,true);
        //随即取一个数组
        $key = array_rand($reply);
        Wx::instance( 'message' )->text( $reply[$key]['content'] );
    }
}