<?php
return [
	//服务提供者
	'providers' => [
        'system\service\WxProvider',
        'system\service\UserProvider'
    ],

	//服务外观
	'facades'   => [
        'Wx' => 'system\service\WxFacade',
        'User' => 'system\service\UserFacade'
    ],
];