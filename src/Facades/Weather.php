<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13/013
 * Time: 9:53
 */
namespace Xueyuan\Weather\Facades;
use Illuminate\Support\Facades\Facade;
class Weather extends Facade{
    public static function getFacadeAccessor(){
        return \Xueyuan\Weather\Weather::class;
    }
}