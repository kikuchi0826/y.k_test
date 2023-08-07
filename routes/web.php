<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 上映スケジュール機能

Route::get('/schedule/list', [App\Http\Controllers\scheduleController::class, 'list']);

// 鑑賞提案＆リアクション

Route::get('/suggest_reaction/calendar', [App\Http\Controllers\suggest_reactionController::class, 'calendar']);

Route::post('/suggest_reaction/calendar', [App\Http\Controllers\suggest_reactionController::class, 'scheduleAdd'])->name('schedule-add');;

Route::get('/suggest_reaction/list', [App\Http\Controllers\suggest_reactionController::class, 'list'])->name('list');

Route::post('/suggest_reaction/result', [App\Http\Controllers\suggest_reactionController::class, 'result']);

Route::post('/schedule-add', [App\Http\Controllers\ScheduleController::class, 'scheduleAdd'])->name('schedule-add');

Route::post('/schedule-get', [App\Http\Controllers\ScheduleController::class, 'scheduleGet'])->name('schedule-get');
