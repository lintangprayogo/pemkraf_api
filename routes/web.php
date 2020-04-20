<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/UMKM', "UmkmController@showUMKM");
$router->get('/UMKM/PRODUCT/', "UmkmController@showProduct");
$router->get('/EVENT', "EventController@showEvent");
$router->get("/CULTURE","CultureController@showCultureSite");