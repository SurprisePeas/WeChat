<?php
namespace system\service;

use hdphp\kernel\ServiceFacade;

class WxFacade extends ServiceFacade
{
    public static function getFacadeAccessor()
    {
        return 'Wx';
    }
}