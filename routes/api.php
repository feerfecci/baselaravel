<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function(){

// });
    Route::post('/login', [AuthController::class, 'login']);

// Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/home', [MainController::class, 'index']);
    Route::get('/newgasto', [MainController::class, 'newGasto']);
    Route::get('/allgastos/{idlogado}', [MainController::class, 'allGastos']);
    Route::get('/logout', [AuthController::class, 'logout']);
// });
// await fetch("http://192.168.15.117/api/teste", {
//     method: 'get',
//     headers: {
//         'Content-Type': 'application/json',  // Importantíssimo! Aqui você está enviando JSON
//         'Accept': 'application/json',
//          'Authorization' : `barear 123`
//     },
// }).then((resp) => json(resp))
// .then((json) => {

//     if(json.status_code == 200){
//         setNotes(json.teste)
//     }
// })