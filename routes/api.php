<?php

use App\Http\Controllers\MemberController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//用户注册
Route::post('/member/register',[MemberController::class, 'register']);
//删除用户
Route::delete('/member/destroy/{id}',[MemberController::class, 'destroy']);
//手机号登录
Route::post('/member/login',[MemberController::class, 'phoneLogin']);
