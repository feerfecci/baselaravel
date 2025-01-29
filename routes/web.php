<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Helo world";
    // return view('welcome');
});

Route::get('/listargastos', function () {
    echo "json com a lista de gastos";
});


Route::get('/registrar-usuario/{userid}' , [MainController::class, 'registrarUser']);