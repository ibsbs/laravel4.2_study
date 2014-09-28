<?php
namespace Admin;

use View;
use App;
use URL;

class UserController extends \BaseController 
{
    public function login()
    {
        //echo 'full: ', URL::full(), '----', 'current: ', URL::current();
        $url = URL::full();
        $parse_url = parse_url($url);
        //\Kint::dump($parse_url);
        $path = $parse_url['path'];
        $path_array = explode('/', $path);
        $lang = $path_array[1];
        App::setLocale($lang);
        return View::make('admin.user.login');
    }
    public function register()
    {
        return View::make('admin.user.register');
    }
}