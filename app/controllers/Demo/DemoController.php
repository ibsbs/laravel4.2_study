<?php
namespace Demo;

use Kint;

class DemoController extends \BaseController
{
    public function  getAboutArray()
    {
        $array = [0=>'aa', 1=>'bb', 3=>'cc'];
        Kint::dump($array);       
    }
}