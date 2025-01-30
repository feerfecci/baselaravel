<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    echo "Helo world";
    // return view('welcome');
});