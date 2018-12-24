<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12/012
 * Time: 14:02
 */
namespace Xueyuan\Weather\Tests;


use PHPUnit\Framework\TestCase;
use Xueyuan\Weather\exception\InvalidArgumentException;
use Xueyuan\Weather\Weather;

class WeatherTest extends TestCase {
    public function testGetWeather(){

    }

    public function testGetHttpClient(){

    }

    public function testSetHttpOptions(){

    }

    // 测试参数异常
    public function testGetWeatherWithInvalidType(){
        $w = new Weather('mock-key');

        // 断言会抛出异常类
        $this->expectException(InvalidArgumentException::class);

        // 断言异常消息为
        $this->expectExceptionMessage('输入参数不正确foo');

        $w->weather('深圳', 'foofafaf');

        $this->fail('Failed to assert weather throw exception with invalid argument');
    }

    // 测试参数异常2

    public function testGetWeatherWithInvalidArgument(){
        $w = new Weather('mock_key');

        // 断言会抛出异常
        $this->expectException(InvalidArgumentException::class);

        // 断言抛出异常消息为
        $this->expectExceptionMessage('输出参数不正确array');

        $w->weather('深圳', 'base', 'array1121212');

        $this->fail('Failed to assert weather throw exception with invalid argument');
    }
}