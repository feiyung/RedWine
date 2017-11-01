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
Route::group(['middleware'=>['admin.login','access']],function(){
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

    Route::get('/admin/accesslist','AdminController@accessList');
    Route::post('/admin/addAccess','AdminController@addAccess');
    Route::post('/admin/disable','AdminController@disable');
    Route::post('/admin/enable','AdminController@enable');
    Route::match(['get', 'post'],'/admin/editAccess/{id?}','AdminController@editAccess')->where('id', '[0-9]+');
    Route::get('/admin/setaccess/{id}','AdminController@setAccess')->where('id', '[0-9]+');
    Route::post('/admin/saveaccess','AdminController@saveAccess');
    /*Route::get('/admin/adminrole','AdminController@roleList');
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
    Route::get('/admin/excel','RedWineController@downloadExcel');
    /*创建订单*/
    Route::post('/admin/createorder','RedWineController@createOrder');
    /*支付方式*/
    Route::post('/admin/payway','RedWineController@payWay');
    /*支付宝支付*/
    Route::get('/admin/pay/{id}','RedWineController@pay')->where('id', '[0-9]+');
    /*订单详情*/
    Route::match(['post','get'],'/admin/orderdetail/{id?}','RedWineController@detail');
    /*客户列表*/
    Route::get('/admin/customerlist','RedWineController@customerList');
    /*添加客户*/
    Route::post('/admin/addcustomer','RedWineController@insertCustomer');
    /*获取单条客户信息*/
    Route::post('/admin/editcustomer','RedWineController@editCustomer');
    /*获取客户所有订单*/
    Route::get('/admin/cusorderList/{id}','RedWineController@customerOrderList')->where('id', '[0-9]+');
    /*保存*/
    Route::post('/admin/saveedit','RedWineController@saveEdit');
    /*日志列表*/
    Route::get('/admin/loglist','RedWineController@getActionLog');
    /*退货退款*/
    Route::post('/admin/reject','RedWineController@reject');
    /*销量统计*/
    Route::get('/admin/charts','RedWineController@Charts');
    Route::post('/admin/count','RedWineController@Counts');
    /*销售额*/
    Route::post('/admin/salemoney','RedWineController@salemoney');
    /*抵账*/
    Route::post('/admin/repay','RedWineController@repay');

});
/*支付宝回调*/
Route::match(['get','post'],'/admin/notify','PayController@notify');//回调时session将无效


