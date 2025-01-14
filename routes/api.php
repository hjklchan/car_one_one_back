<?php

use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PartnerStoresController;
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
//获取所有用户信息
Route::get('/user/profile',[MemberController::class, 'getUserInfo']);
//获取汽车品牌列表
Route::get('/carBrand/optionList',[CarBrandController::class,'findAll']);
//获取汽车品牌旗下的系列
Route::get('carBrandSeries/optionList/{brandId}',[CarBrandController::class,'findSeries'])
    ->where('brandId','[0-9]+');
//微信登录
Route::get('/user/login/wechatAuthorization',[MemberController::class, 'wechatLogin']);

//获取附近门店
Route::get('/partnerStore/list',[PartnerStoresController::class,'getStores']);

// 处理路由不存在
Route::fallback(ResponseHelper\apiRouteNotFound());
