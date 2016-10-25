<?php namespace system\service;
class WxProvider extends \hdphp\kernel\ServiceProvider {

    //延迟加载
    public $defer = FALSE;

    public function boot() { }

    public function register() {
        $this->app->single( 'Wx', function ( $app ) {
            return new Wx( $app );
        } );
    }

}