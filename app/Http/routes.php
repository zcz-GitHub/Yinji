<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>'web'],function(){
    date_default_timezone_set('prc');//设置默认时区到中国的时区

    //在前端获取当前用户名
    Route::get('/getUserName',function(){
        return $_SESSION['userName'];
    });

    Route::get('/', function () {
        return view('index');
    });

//Route::group(['middleware'=>'auth'], function() {//中间件，拦截，用于身份验证
    /*公司部分*/
    Route::get('/cpy_index', function () {
        return view('company.cpy_index');
    });

    Route::get('/cpy_addTemplate', function () {
        return view('company.cpy_addTemplate');
    });

    Route::get('/cpy_checkTemplate', function () {
        return view('company.cpy_checkTemplate');
    });

    Route::get('/cpy_checkOrder', function () {
        return view('company.cpy_checkOrder');
    });

    Route::get('/cpy_info', function () {
        return view('company.cpy_info');
    });

    Route::get('/cpy_newOrdersManage', function () {
        return view('company.cpy_newOrdersManage');
    });

    Route::get('/cpy_checkEvaluation', function () {
        return view('company.cpy_checkEvaluation');
    });
    /*公司部分结束*/
//});

    Route::get('/getRequest', function () {
        //var files = Request.Files;
    });

    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::get('/home', function () {
        return view('home');
    });
	
	Route::get('/record', function () {
        return view('record');
    });

    //用户创建纪念册
    Route::get('/create_album', function () {
        return view('create_album');
    });

    //用户个人信息查看与修改界面
    Route::get('/user-information',function(){
        return view('user-information');
    });
});


/*
 * 公司方面的操作
 */
Route::get('/cpy/getOrders','CpyController@getOrders');
Route::get('/cpy/deleteOrder','CpyController@deleteOrder');
Route::get('/cpy/editOrder','CpyController@editOrder');
Route::post('/cpy/uploadTemplate','CpyController@uploadTemplate');
Route::get('/cpy/getTemplates','CpyController@getTemplates');
Route::get('/cpy/deleteTemplate','CpyController@deleteTemplate');

Route::get('/cpy/getIndexMsg','CpyController@getIndexMsg');
Route::get('/cpy/getUndoneOrders','CpyController@getUndoneOrders');

Route::get('/cpy/getEvaluations','CpyController@getEvaluations');
Route::get('/cpy/getGoodEva','CpyController@getGoodEva');
Route::get('/cpy/getBadEva','CpyController@getBadEva');
Route::get('/auth/addUser','Auth\AuthController@addUser');//添加用户
Route::get('/auth/checkUser','Auth\AuthController@checkUser');//查看是否有用户存在
Route::get('/auth/checkPwd','Auth\AuthController@checkPwd');//查看用户名密码是否正确

/*
 * 身份验证方面的操作
 */
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
Route::get('/intended','Auth\AuthController@gotoIntenedPage');
Route::get('/auth/success', function() {
    return view('auth.success');
});
Route::get('/auth/error', function() {
    return view('auth.error');
});


/**
 * 用户方面的操作
 */
Route::get('/usr/checkExistUser','UserController@checkExistUser');


Route::get('/testSession', 'Album\AlbumController@testSession');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
