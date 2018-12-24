<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/11/011
 * Time: 14:51
 */

namespace Xueyuan\Weather;

use GuzzleHttp\Client;
use Xueyuan\Weather\exception\Exception;
use Xueyuan\Weather\exception\HttpException;
use Xueyuan\Weather\exception\InvalidArgumentException;

class Weather
{
    protected $url = 'https://restapi.amap.com/v3/weather/weatherInfo';

    public $key = '';

    protected $guzzleOptions = [];

    public function __construct($key = "")
    {
        $this->key = $key ?: '980fcba3d8818125557e3ab0e82eaa5f';
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setHttpOptions($options)
    {
        $this->guzzzleOptions = $options;
    }

    public function weather($city, $extensions = 'base', $output = 'json')
    {
        if (!in_array($extensions, ['base', 'all'])) {
            throw new InvalidArgumentException('输入参数不正确'.$extensions);
        }
        if (!in_array($output, ['xml', 'json'])) {
            throw new InvalidArgumentException('输出参数不正确'.$output);
        }
        // 设置参数
        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'extensions' => $extensions,
            'output' => $output,
        ]);
        try {
            $result = $this->getHttpClient()->request('GET', $this->url, [
                'query' => $query,
            ])->getBody()->getContents();
        } catch (Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
        return $output === 'json' ? json_decode($result, true) : $result;
    }
}