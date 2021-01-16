<?php

namespace Routes\Register;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;

class RegisterRoute
{
    static function routes()
    {
        Route::post('register', [RegisterController::class, 'register']);
        Route::post('login', [RegisterController::class, 'login']);
    }
}
