<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Routes\Register\RegisterRoute;
use Routes\Food\FoodRoute;
use Routes\Category\CategoryRoute;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

RegisterRoute::routes();

Route::middleware('auth:api')->group(function () {
    FoodRoute::routes();
    CategoryRoute::routes();
});
