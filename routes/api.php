<?php

use App\Http\Controllers\Admin\Api\PermissionController;
use App\Http\Controllers\Admin\Api\ProductCommentController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/callPermission/{key}', [PermissionController::class, 'apiPermission']);
Route::get('/getProduct/{category_id}', [HomeController::class, 'getProduct']);

Route::get('/product/comment/{id}', [ProductCommentController::class, 'index'])->name('comment');
Route::post('/product/comment/add', [ProductCommentController::class, 'addForm']);
