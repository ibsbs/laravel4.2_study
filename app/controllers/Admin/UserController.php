<?php
namespace Admin;

use View;

class UserController extends \BaseController 
{
    public function login()
    {
        return View::make('admin.user.login');
    }
}