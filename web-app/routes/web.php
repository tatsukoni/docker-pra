<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('hello');
// });

Route::get('/', [HelloController::class, 'index'])->name('hello');

Route::post('/', [PostController::class, 'store']);

// ヘルスチェック用
Route::get('/healthcheck', function () {
    return ['health' => 'ok'];
});
