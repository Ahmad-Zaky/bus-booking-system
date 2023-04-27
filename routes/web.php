<?php

use Illuminate\Support\Facades\Route;
use ArieTimmerman\Laravel\SCIMServer\RouteProvider as SCIMServerRouteProvider;


Route::get('/', function () {
    return view('welcome');
});

SCIMServerRouteProvider::publicRoutes();

SCIMServerRouteProvider::routes(['public_routes' => false ]);

SCIMServerRouteProvider::meRoutes();