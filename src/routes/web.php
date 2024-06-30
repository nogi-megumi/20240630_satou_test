<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'thanks']);

// 管理画面への処理 認証機能にフォームリクエストを追加する方法がわかりませんでした。

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
    Route::post('/admin', [AuthController::class, 'index']);
    Route::get('/admin/search', [AuthController::class, 'search']);
    Route::delete('/admin/delete', [AuthController::class, 'destroy']);
});
