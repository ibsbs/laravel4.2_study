<?php
namespace Demo;

use Kint;
use GuzzleHttp\Client;
class DemoController extends \BaseController
{
    public function  getAboutArray()
    {
        $array = [0=>'aa', 1=>'bb', 3=>'cc'];
        Kint::dump($array);       
    }
    public function getGuzzleHttp()
    {
        $client = new  Client();
        $response = $client->get('http://www.iduoqian.com/333vgohappy/?c=user&a=login');
        //$res = $client->get('http://www.iduoqian.com/333vgohappy/?c=user&a=login', ['auth' =>  ['user', 'pass']]);
        Kint::dump($response);
    }
}