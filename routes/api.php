<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function($api) {
    // 短信验证码
    $api->post('verificationCodes', 'VerificationCodesController@store')
        ->name('api.verificationCodes.store');

    // 用户注册
    $api->post('users', 'UsersController@store')
        ->name('api.users.store');
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });

});


//新增区域
$api->version('v1',[ 'namespace' => 'App\Http\Controllers\Api'],function ($api){
//
    header("Access-Control-Allow-Origin: http://localhost:3000");

    header('Access-Control-Allow-Credentials:true');  //允许访问Cookie
    $api->get('region',['uses'=>'RegionController@get'])
        ->name('api.region.get');
//    $api->get('getHousing',['uses'=>'HousingController@get'])
//        ->name('api.housing.get');

    $api->get('region/housing/{id}',['uses'=>'HousingController@getByRegion'])
        ->name('api.housing.get')->where(["id"=>'[0-9]+']);

    $api->get('style',['uses'=>'StyleController@get'])
        ->name('api.style.get');

    $api->get('deco',['uses'=>'DecorateController@get'])
        ->name('api.deco.get');

    $api->get('houses',['uses'=>'HousePublishController@get'])
        ->name('api.houses.get');


////
////    $api->get('regions',['uses'=>'RegionController@getList'])
////        ->name('api.region.get');
////    $api->post('updateRegion',['uses'=>'RegionController@update'])
////        ->name('api.region.update');
//
});




