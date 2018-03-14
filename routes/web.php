<?php

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/hello/{id}', function ($id=0) {
//    return view('hello');
//})->where(["id"=>'[A-Za-z]+']);

//路由别名

//Route::get('user/center',['as'=>'center',function(){
//
//    return route('center');
//}]);

//路由群组

Route::group(['prefix'=>'manage','middleware' => 'auth'],function(){
//    Route::get('user/center',['as'=>'center',function(){
//
//        return route('center');
//    }]);
//    Route::get('/hello/{id}', function ($id=0) {
//        return view('hello');
//    })->where(["id"=>'[A-Za-z]+']);

//    Route::get('/info/{id}',[
//    'uses'=>'MemberController@info',
//    'as'=>'memberInfo'
//    ]);


    //
    Route::group(['prefix'=>'op','middleware' => 'VerifyCsrfToken'],function() {

        //户型
        Route::group(['prefix'=>'region'],function() {
            Route::post('add',['uses'=>'Api\RegionController@add']);
            Route::post('update',['uses'=>'Api\RegionController@update']);
        });

        //小区增、改、删
        Route::group(['prefix'=>'housing'],function() {
            Route::post('add',['uses'=>'Api\HousingController@add']);

            Route::post('update',['uses'=>'Api\HousingController@update']);
        });




        //户型
        Route::group(['prefix'=>'style'],function() {
            Route::post('add',['uses'=>'Api\StyleController@add']);
            Route::post('update',['uses'=>'Api\StyleController@update']);
        });

        //装修
        Route::group(['prefix'=>'decorate'],function() {
            Route::post('add',['uses'=>'Api\DecorateController@add']);
            Route::post('update',['uses'=>'Api\DecorateController@update']);
        });

        //房源
        Route::group(['prefix'=>'house'],function() {
            Route::post('add',['uses'=>'Api\HousePublishController@add']);
            Route::post('get',['uses'=>'Api\HousePublishController@getPrivate']);
//            Route::post('update',['uses'=>'Api\DecorateController@update']);
        });



    });

    Route::post('img/upload',['uses'=>'Api\HousePublishController@uploadImg']);
    Route::get('/',[
        'uses'=>'ManageController@manage'
    ]);

    Route::get('/{id}',[
        'uses'=>'ManageController@manage',
    ]);


});

//Route::get('/member/info/{id}',[
//    'uses'=>'MemberController@info',
//    'as'=>'memberInfo'
//]);

//Route::get('/member/info/{id}',[
//    'uses'=>'MemberController@info',
//]);
//
//Route::get('/user/getAll',[
//    'uses'=>'UserController@getAll',
//]);
//Route::get('/user/add/{id}/{name}',[
//    'uses'=>'UserController@addUser',
//]);
//Route::get('/user/orm1',[
//    'uses'=>'MemberController@orm1',
//]);
//
//Route::get('/user/orm2',[
//    'uses'=>'MemberController@orm2',
//]);
//
//Route::get('/user/orm3',[
//    'uses'=>'MemberController@orm3',
//]);
Auth::routes();

