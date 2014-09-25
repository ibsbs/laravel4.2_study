<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('hello');
});

Route::get('/show_environment', function() {
    echo App::environment();
    //Kint::enabled(false);
    Kint::dump(Config::get('database.connections'));
    $host_name = gethostbyaddr($_SERVER[ 'REMOTE_ADDR']);
    d($host_name);
    return;
});

Route::group(array('prefix' => 'admin'), function() {
    Route::get('login', 'Admin\UserController@login');
    Route::get('register', 'Admin\UserController@register');
});

Route::group(array('prefix'=>'demo'), function() {
    Route::controller('curl', 'Demo\CurlDemoController');
    Route::controller('demo', 'Demo\Democontroller');
});

