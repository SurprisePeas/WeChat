<?php
namespace system\service;

use hdphp\kernel\ServiceFacade;

class UserFacade extends ServiceFacade {
	public static function getFacadeAccessor() {
		return 'User';
	}
}