<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

     'connections' => array(

        $_SERVER['DATABASE_DRIVER'] => array(
            'driver'    => $_SERVER['DATABASE_DRIVER'],
            'host'      => $_SERVER['DATABASE_HOST'],
            'database'  => $_SERVER['DATABASE_DATABASE'],
            'username'  => $_SERVER['DATABASE_USERNAME'],
            'password'  => $_SERVER['DATABASE_PASSWORD'],
            'charset'   => $_SERVER['DATABASE_CHARSET'],
            'collation' => $_SERVER['DATABASE_COLLATION'],
            'prefix'    => $_SERVER['DATABASE_PREFIX'],
        ),
    ),

);
