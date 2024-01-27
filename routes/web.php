<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContributionsController;

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

Route::get('/',[MemberController::class ,'loginView'] )->name('loginView');

Route::get('/signup',[MemberController::class ,'registerView'] )->name('registerView');
Route::post('/saveMember',[MemberController::class ,'register'] )->name('savemember');
Route::get('/saveMember',[MemberController::class ,'register'] )->name('savemember');

Route::post('/login',[MemberController::class ,'login'] )->name('login');
Route::get('/login',[MemberController::class ,'login'] )->name('login');
Route::get('/userPage',[MemberController::class ,'userView'] )->name('userView');
Route::post('/userPage',[MemberController::class ,'userView'] )->name('userView');
Route::post('/allowContribution',[MemberController::class ,'allowAddContribution'] )->name('allowContrib');
Route::get('/allowContribution',[MemberController::class ,'allowAddContribution'] )->name('allowContrib');
Route::post('/removeContribution',[MemberController::class ,'removeAddContribution'] )->name('remove');
Route::get('/removeContribution',[MemberController::class ,'removeAddContribution'] )->name('remove');
Route::post('/saveContribution', [MemberController::class,'saveContribution'])->name('saveContrib');
Route::get('/saveContribution', [MemberController::class,'saveContribution'])->name('saveContrib');
Route::get('/userContributions', [ContributionsController::class,'userContributions'])->name('userContributions');
Route::post('/userContributions', [ContributionsController::class,'userContributions'])->name('userContributions');
Route::get('/othersContributions', [ContributionsController::class,'otherUsersContributions'])->name('othersContributions');
Route::get('/searchResults', [MemberController::class,'searchMembers'])->name('searchResults');
Route::post('/searchResults', [MemberController::class,'searchMembers'])->name('searchResults');

Route::get('/allMembers', [MemberController::class,'getAllMembers'])->name('allMembers');
Route::get('/contributions/{username}', [ContributionsController::class,'getUserContributions'])->name('_userContributions');
Route::get('/userInfo/{username}', [MemberController::class,'getUserInfo'])->name('_userInfo');
Route::post('/updateUser', [MemberController::class,' updateUser'])->name('updateUser');
Route::post('/mobileUserRegister',[MemberController::class ,'mobileAppRegister'])->name('mobileAppRegister');
Route::get('/mobileUserRegister',[MemberController::class ,'mobileAppRegister'])->name('mobileAppRegister');


URL::forceScheme('https');