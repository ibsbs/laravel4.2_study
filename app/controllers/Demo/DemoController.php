<?php
namespace Demo;

class DemoController extends \BaseController
{
    public function  getAboutArray()
    {
        //$array = [0=>'aa', 1=>'bb', 3=>'cc'];
        //var_dump($array);
        //$value = decbin(86);
        // $val = '991F0C6E504546A25744E3DF0D26A441';
        $value = 85;
        for($i=86; $i<=255; $i++) {
            //$now_i = decbin($i);
            $now_i = $i;
            //$now_next = decbin($i+1);
            //$value  = $now_i^$now_next;

            $value = $now_i^$value;
        }
        //$value_1 = md5($value);
        $value_1 = md5($value, true);
        echo $value_1;
        $hex = hex2bin($value_1);

        //$value_2 = md5($hex);
        //$value = (string)$value;
        
        echo  $hex, '----', $value_1, '----', $value;
        //var_dump(decbin(85));
    }
}