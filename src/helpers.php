<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/11/011
 * Time: 15:31
 */

function getWeather(){
    return (new \Xueyuan\Weather\Weather())->weather();
}