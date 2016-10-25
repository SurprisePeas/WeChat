<?php namespace system\model;
use hdphp\model\Model;

/**
 * Created by PhpStorm.
 * User: SurprisePeas
 * Date: 2016/10/11/ 0011
 * Time: 15:44
 */

class Keywords extends Model {
    protected $table = 'keywords';

    protected $validate = [
        ['keyword', 'required', '内容不能为空', self::MUST_VALIDATE, self::MODEL_BOTH],
        ['module', 'required', '模块不能为空', self::MUST_VALIDATE, self::MODEL_BOTH]
    ];
}