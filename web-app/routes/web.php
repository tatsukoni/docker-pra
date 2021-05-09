<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\SqsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HelloController::class, 'index'])->name('hello');

Route::post('/', [PostController::class, 'store']);

Route::delete('/', [DeleteController::class, 'delete']);

// キュー用
Route::get('/sqs', [SqsController::class, 'index'])->name('sqs');

// ヘルスチェック用
Route::get('/healthcheck', function () {
    return ['health' => 'ok'];
});

// デザインパターンデモ
Route::get('/check', [CheckController::class, 'index'])->name('sqs');
