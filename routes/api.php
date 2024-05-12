<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\OptionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/topics',[TopicController::class,'getTopics'])->name('getTopics');
Route::post('/saveTopic',[TopicController::class,'saveTopic'])->name('saveTopic');
Route::get('/saveTopic',[TopicController::class,'saveTopic'])->name('saveTopic');

Route::post('/saveOption',[OptionController::class,'saveOption'])->name('saveOption');
Route::get('/saveOption',[OptionController::class,'saveOption'])->name('saveOption');

Route::get('/options',[OptionController::class,'getOptions'])->name('getOptions');

Route::post('/currentOptionVotes',[OptionController::class, 'getCurrentOptionVotes'])->name('getCurrentOptionVotes');
Route::get('/currentOptionVotes',[OptionController::class, 'getCurrentOptionVotes'])->name('getCurrentOptionVotes');
Route::post('/deleteOption', [OptionController::class,'deleteOption'])->name('deleteOption');
Route::post('/updateTopic', [TopicController::class,'updateTopic'])->name('updateTopic');
Route::post('/deleteTopic',[TopicController::class, 'deleteTopic'])->name('deleteTopic');

Route::post('/addOption',[OptionController::class, 'addOption'])->name('addOption');

URL::forceScheme('https');