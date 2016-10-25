<?php
/**
 * Created by PhpStorm.
 * User: SurprisePeas
 * Date: 2016/10/12/ 0012
 * Time: 16:37
 */

namespace module;

/**
 * Class BaseSite
 * @package module 所有模块需要继承的基类
 * ------因为显示页面的view不能找到module->button的模块页面
        继承这个路径被定义好的类的时候就可以显示模块页面了!!
 * @display  module路径下的模块页面
 *
 */
class BaseSite
{
    //模块目录
    protected $template;

    public function __construct()
    {
        //组成module路径
        $this->template = 'module/' . v('module.name') . '/template';
        define('__TEMPLATE__',__ROOT__.'/'.$this->template);
    }

    public function display($tpl)
    {
        //显示    module->button->lists 模块页面
        echo view($this->template . "/{$tpl}.html");
    }

}