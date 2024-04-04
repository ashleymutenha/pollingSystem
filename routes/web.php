<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TopicController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/topics',[TopicController::class,'getTopics'])->name('getTopics');

Route::post('/saveTopic',[TopicController::class,'saveTopic'])->name('saveTopic');
Route::get('/saveTopic',[TopicController::class,'saveTopic'])->name('saveTopic');




URL::forceScheme('https');