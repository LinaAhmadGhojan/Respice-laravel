<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipesController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[App\Http\Controllers\LoginController::class,'login'] );

Route::controller(RecipesController::class)->group(function () {
    Route::get('/recipes', 'index');
    Route::get('/recipes/search/{name}', 'search');
    Route::get('/recipes/user', 'recipeUser');
    Route::get('/recipe/show/{id}', 'show');
    Route::post('/add/recipe', 'store');
    Route::post('/update/recipe/{id}', 'update');
    Route::delete('/delete/recipe/{id}', 'delete');
});



