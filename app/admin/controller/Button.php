<?php namespace app\admin\controller;
class Button{
    public function post(){
        $json=<<<str
{
     "button":[
     {	
          "type":"click",
          "name":"匹诺曹",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"百度搜索",
               "url":"http://www.baidu.com/"
            },
            {
               "type":"view",
               "name":"微博",
               "url":"http://weibo.com/"
            },
            {
               "type":"click",
               "name":"捐助我们",
               "key":"V1001_GOOD"
            }]
       }]
 }
str;

        $res = Wx::instance('button')->create($json);
        dd($res);
    }
}