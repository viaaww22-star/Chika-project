<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkirController;


Route::get('/', function () {
    return view('welcome');
    
});
Route::resource('parkir', ParkirController::class);
