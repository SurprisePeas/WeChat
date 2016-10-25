<?php namespace system\model;

use hdphp\model\Model;

/**
 * Class Button 微信按钮
 * @package system\model
 */
class Button extends Model
{
    protected $table = "button";

    protected $validate = [
        ['data','required','数据不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['name','required','菜单名称不能为空',self::MUST_VALIDATE,self::MODEL_BOTH]
    ];

    protected $auto = [
        ['status',0,'string',self::MUST_AUTO,self::MODEL_INSERT]
    ];
}