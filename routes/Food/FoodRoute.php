<?php

namespace Routes\Food;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

class FoodRoute
{
    static function routes()
    {
        Route::get('/foods', [FoodController::class, 'index']);
    }
}
