<?php namespace system\service;
class UserProvider extends \hdphp\kernel\ServiceProvider {

    //延迟加载
    public $defer = FALSE;

    public function boot() { }

    public function register() {
        $this->app->single( 'User', function ( $app ) {
            return new User( $app );
        } );
    }

}