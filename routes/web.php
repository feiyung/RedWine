<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/',function(){
    return view('login');
});

Route::get('/admin',function(){
    return view('adminhome');
});*/
/*登录页面*/
Route::get('/','AdminController@login_page');
/*登录方法*/
Route::post('/admin/login','AdminController@login');
Route::group(['middleware'=>'admin.login'],function(){
    /*退出登录*/
    Route::get('/admin/loginout','AdminController@loginout');
    /*添加用户*/
    Route::post('/admin/adduser','AdminController@Add_user');
    /*用户列表*/
    Route::get('/admin/adminlist','AdminController@adminList');
    /*禁用用户*/
    Route::post('/admin/disableadmin','AdminController@disableAdmin');
    /*启用用户*/
    Route::post('/admin/enableadmin','AdminController@enableAdmin');
    /*获取用户信息*/
    Route::post('/admin/getadminInfo','AdminController@getAdminInfo');
    Route::post('/admin/editadmin','AdminController@editAdmin');
    /*
    Route::get('/admin/accesslist','AdminController@accessList');
    Route::post('/admin/addAccess','AdminController@addAccess');
    Route::post('/admin/disable','AdminController@disable');
    Route::post('/admin/enable','AdminController@enable');
    Route::match(['get', 'post'],'/admin/editAccess/{id?}','AdminController@editAccess')->where('id', '[0-9]+');
    Route::get('/admin/adminrole','AdminController@roleList');
    Route::post('/admin/addrole','AdminController@addroles');
    Route::post('/admin/disablerole','AdminController@disableRole');
    Route::post('/admin/enablerole','AdminController@enableRole');*/

    /*红酒列表*/
    Route::get('/admin/winelist','RedWineController@wineList');
    /*添加红酒*/
    Route::post('/admin/addwine','RedWineController@addWine');
    /*获得一条红酒信息*/
    Route::post('/admin/getoneinfo','RedWineController@getOneInfo');
    /*更新红酒信息*/
    Route::post('/admin/updwine','RedWineController@editWine');
    /*订单列表*/
    Route::get('/admin/orderlist','RedWineController@orderList');
    /*创建订单*/
    Route::post('/admin/createorder','RedWineController@createOrder');
    /*去支付*/
    Route::get('/admin/pay/{id}','RedWineController@pay')->where('id', '[0-9]+');
    /*订单详情*/
    Route::post('/admin/orderdetail','RedWineController@detail');
});
/*支付宝回调*/
Route::match(['get','post'],'/admin/notify','PayController@notify');


