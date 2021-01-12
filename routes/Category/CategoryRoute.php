<?php

namespace Routes\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

class CategoryRoute
{
    static function routes()
    {
        Route::get('/categories', [CategoryController::class, 'index']);
    }
}
