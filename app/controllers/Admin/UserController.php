<?php
namespace Admin;

use View;

class UserController extends \BaseController 
{
    public function login()
    {
        return View::make('admin.user.login');
    }
    public function register()
    {
        return View::make('admin.user.register');
    }
}