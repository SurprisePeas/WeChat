<?php namespace system\model;
use hdphp\model\Model;

/**
 * Created by PhpStorm.
 * User: SurprisePeas
 * Date: 2016/10/11/ 0011
 * Time: 15:44
 */

class Config extends Model {
    protected $table = 'config';

    protected $auto = [
        'default_message','','string',self::EMPTY_AUTO,self::MODEL_INSERT
    ];
}