<?php


namespace Sunjindeng\Weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * 标记着提供其是延迟加载的
     * @var bool
     */
    protected $defer = true;

    /**
     * 提供服务提供者
     */
    public function register()
    {
        $this->app->singleton(Weather::class, function () {
           return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    /**
     * 取得提供者提供的服务
     * @return string[]
     */
    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}