<?php namespace system\model;
use hdphp\model\Model;

/**
 * Created by PhpStorm.
 * User: SurprisePeas
 * Date: 2016/10/11/ 0011
 * Time: 15:44
 */

class ReplyBase extends Model {
    protected $table = 'reply_base';

    protected $validate = [
        ['content', 'required', '回复内容不能为空', self::MUST_VALIDATE, self::MODEL_BOTH],
        ['kid', 'required', '不存在关键词KID', self::MUST_VALIDATE, self::MODEL_BOTH]
    ];
}