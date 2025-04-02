<?php

/** @var \Laravel\Lumen\Routing\Router $router */
$router->options('/{any:.*}', function () {
    $response = response('', 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

    // ตั้งค่า Cache-Control ให้ไม่เก็บข้อมูลใน Cache
    $response->headers->set('Cache-Control', 'no-store');

    return $response;
});

$router->get('/api/get-hospitals', 'NotifyController@getHospitalData');
$router->get('/api/get-users', 'UserController@getUser');
$router->post('/api/register', 'UserController@InsertNewUser');
$router->delete('/api/delete-user', 'UserController@InsertNewUser');
