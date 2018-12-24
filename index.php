<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/11/011
 * Time: 15:33
 */
require_once './vendor/autoload.php';
$weather = new \Xueyuan\Weather\Weather();
var_dump($weather->weather('荆门','all'));