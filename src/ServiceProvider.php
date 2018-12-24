<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/11/011
 * Time: 14:54
 */

namespace Xueyuan\Weather;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    protected $defer = true;
    public function register(){
        $this->app->singleton(Weather::class, function($app){
            return new Weather(Config('weather.weather.key'));
        });
    }

    public function provides(){
        return ['weather'];
    }
    /**
     * 在注册后启动服务。
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/weather.php' => config_path('weather.php'),
        ]);
    }
}
