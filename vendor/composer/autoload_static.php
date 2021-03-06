<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd79a560207bc07d05a71b06c9e9d1abb
{
    public static $files = array (
        'e27462e627a88b1c7e8df9acd31610f4' => __DIR__ . '/..' . '/houdunwang/framework/src/kernel/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wx\\' => 3,
        ),
        's' => 
        array (
            'system\\' => 7,
        ),
        'm' => 
        array (
            'module\\' => 7,
        ),
        'h' => 
        array (
            'hdphp\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
            'addons\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wx\\' => 
        array (
            0 => __DIR__ . '/../..' . '/wx',
        ),
        'system\\' => 
        array (
            0 => __DIR__ . '/../..' . '/system',
        ),
        'module\\' => 
        array (
            0 => __DIR__ . '/../..' . '/module',
        ),
        'hdphp\\' => 
        array (
            0 => __DIR__ . '/..' . '/houdunwang/framework/src',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'addons\\' => 
        array (
            0 => __DIR__ . '/../..' . '/addons',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd79a560207bc07d05a71b06c9e9d1abb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd79a560207bc07d05a71b06c9e9d1abb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
