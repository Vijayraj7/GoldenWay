<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//logins
// Route::get('/register/vendor', function () {
//     return view('auth.register.register', ['cn' => 'Vendor']);
// });
Route::get('/register/sent', function () {
    return view('auth.register.registersucc', ['cn' => 'Vendor']);
});
Route::get('/', function () {
    return view('mainhome', ['cn' => 'Customer']);
});
Route::get('/login', function () {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (isset($_SESSION['mail']) && Auth::check()) {
        return redirect('/dashboard');
    }
    return view('auth.login.loginn', ['cn' => 'Customer']);
});
// Route::get('/login/customer', function () {
//     return view('auth.login.login', ['cn' => 'Vendor']);
// });
// Route::get('/login/customer', function () {
//     return view('auth.login.login', ['cn' => 'Customer']);
// });
Route::get('/register', function () {
    return view('auth.register.register', ['cn' => 'Customer']);
});
Route::get('/login/sendpass', function () {
    return view('auth.login.sendpass', ['st' => 'form']);
});
Route::get('/login/sendpass/s', function () {
    return view('auth.login.sendpass', ['st' => 'after']);
});
Route::get('/login/forget', function () {
    return view('auth.login.forget', ['st' => 'form']);
});


//gets
// Route::get('/', 'App\Http\Controllers\ViewController@home');
Route::get('/shop', 'App\Http\Controllers\ViewController@shop');
Route::get('/logout', 'App\Http\Controllers\LoginApiController@logout');
Route::get('/vendors', 'App\Http\Controllers\ViewController@vendors');
Route::get('/contact', 'App\Http\Controllers\ViewController@contact');
Route::get('/vendor/{id}', 'App\Http\Controllers\ViewController@vendordetail');
Route::get('/checkout/{id}', 'App\Http\Controllers\ViewController@checkout');


Route::get('all/calculator', 'App\Http\Controllers\DashBoardController@democalc');

Route::get('/admin', 'App\Http\Controllers\AdminDashboard@admindashboard');
Route::get('/admin/transactions/all', 'App\Http\Controllers\AdminDashboard@transactions');
Route::get('/admin/user/{id}', 'App\Http\Controllers\AdminDashboard@user');
Route::get('/admin/product/requests', 'App\Http\Controllers\AdminDashboard@productrequests');
Route::get('/admin/lott/history', 'App\Http\Controllers\AdminDashboard@lotthistory');
Route::get('/admin/lott/box', 'App\Http\Controllers\AdminDashboard@lottbox');
Route::get('/admin/referral/tree', 'App\Http\Controllers\AdminDashboard@reftree');
Route::get('/admin/creditadd/requests', 'App\Http\Controllers\AdminDashboard@creditrequests');
Route::get('/admin/customers/all', 'App\Http\Controllers\AdminDashboard@customers');
Route::get('/admin/product/requests/{id}', 'App\Http\Controllers\AdminDashboard@productrequestsview');
Route::get('/admin/creditadd/requests/{id}', 'App\Http\Controllers\AdminDashboard@creditaddrequestsview');
Route::get('/admin/withdraw/requests', 'App\Http\Controllers\AdminDashboard@withdrawrequests');
Route::get('/admin/withdraw/requests/{id}', 'App\Http\Controllers\AdminDashboard@withdrawrequestsview');
Route::get('/admin/customer/support/status', 'App\Http\Controllers\AdminDashboard@supportstatus');


//dashboard
Route::get('/dashboard', 'App\Http\Controllers\DashBoardController@dashboard');
Route::get('/wallet-create', 'App\Http\Controllers\DashBoardController@walletCreate');
// Route::get('/dashboard/products/buy', 'App\Http\Controllers\DashBoardController@products'); depositviewstatus
Route::get('/dashboard/products/buy', 'App\Http\Controllers\DashBoardController@productbuy');
Route::get('/dashboard/credit/buy', 'App\Http\Controllers\DashBoardController@creditbuy');
Route::get('/dashboard/status/deposit', 'App\Http\Controllers\DashBoardController@depositstatus');
Route::get('/dashboard/status/credit', 'App\Http\Controllers\DashBoardController@creditstatus');
Route::get('/dashboard/status/depositview/{id}', 'App\Http\Controllers\DashBoardController@depositviewstatus');
Route::get('/dashboard/status/compound/{id}', 'App\Http\Controllers\DashBoardController@compoundstatus');
Route::get('/dashboard/status/withdraw', 'App\Http\Controllers\DashBoardController@withdrawhistory');
Route::get('/dashboard/status/transactions/withdraw', 'App\Http\Controllers\DashBoardController@withdrawtransactions');
Route::get('/dashboard/status/transactions', 'App\Http\Controllers\DashBoardController@transactions');
Route::get('/dashboard/products/reinvest', 'App\Http\Controllers\DashBoardController@reinvest');
Route::get('/dashboard/market/summary', 'App\Http\Controllers\DashBoardController@marketsummary');
Route::get('/dashboard/demo/calculator', 'App\Http\Controllers\DashBoardController@democalculator');
Route::get('/dashboard/products/transfer', 'App\Http\Controllers\DashBoardController@transferfund');
Route::get('/dashboard/orders', 'App\Http\Controllers\DashBoardController@orders');
Route::get('/dashboard/withdraw/{wtyp}', 'App\Http\Controllers\DashBoardController@withdraw');
Route::get('/dashboard/withdraw/{wtyp}', 'App\Http\Controllers\DashBoardController@withdraw');
Route::get('/dashboard/withdraw/{wtyp}', 'App\Http\Controllers\DashBoardController@withdraw');
Route::get('/dashboard/lott', 'App\Http\Controllers\DashBoardController@lott');
Route::get('/dashboard/refincome', 'App\Http\Controllers\DashBoardController@refincome');
Route::get('/dashboard/levincome/{lev}', 'App\Http\Controllers\DashBoardController@levincome');
Route::get('/dashboard/profile', 'App\Http\Controllers\DashBoardController@profile');
Route::get('/dashboard/reftree', 'App\Http\Controllers\DashBoardController@reftree');
Route::get('/dashboard/customer/support', 'App\Http\Controllers\DashBoardController@support');
Route::get('/dashboard/reftree/{id}', 'App\Http\Controllers\DashBoardController@reftreep');
Route::get('/dashboard/profile/vendor', 'App\Http\Controllers\DashBoardController@vendorprofile');
Route::get('/dashboard/profile/vendor/edit', 'App\Http\Controllers\DashBoardController@vendorprofile');
Route::get('/dashboard/profile/customer', 'App\Http\Controllers\DashBoardController@customerprofile');
Route::get('/dashboard/profile/customer/edit', 'App\Http\Controllers\DashBoardController@customerprofile');
Route::get('/dashboard/profile/edit', 'App\Http\Controllers\DashBoardController@profile');
Route::get('/dashboard/addproduct', 'App\Http\Controllers\DashBoardController@addproduct');
Route::get('/dashboard/edit/{id}', 'App\Http\Controllers\DashBoardController@edit');

Route::get('/activate/{id}/{code}', 'App\Http\Controllers\LoginApiController@activate');
Route::get('/forget/{id}/{code}', 'App\Http\Controllers\LoginApiController@forget');

Route::post('/verify/phone', 'App\Http\Controllers\LoginApiController@verifyphone');



Route::get('/cronjob', 'App\Http\Controllers\ApiController@cronjob');
Route::get('/myjob', 'App\Http\Controllers\ApiController@myjob');
Route::post('/myjob', 'App\Http\Controllers\ApiController@myjob');
Route::get('/sendnoty', 'App\Http\Controllers\ApiController@sendnoty');

//posts
Route::post('/register', 'App\Http\Controllers\LoginApiController@register');
Route::post('/registerupdate', 'App\Http\Controllers\LoginApiController@registerupdate');
Route::post('/shop', 'App\Http\Controllers\ViewController@postshop');
Route::post('/at/login', 'App\Http\Controllers\LoginApiController@login');
Route::post('/dlt/at/usr', 'App\Http\Controllers\LoginApiController@dltuser');
Route::post('/changepass', 'App\Http\Controllers\LoginApiController@changepass');
Route::post('/sendpass', 'App\Http\Controllers\LoginApiController@sendpass');
Route::post('/addproduct', 'App\Http\Controllers\LoginApiController@addproduct');
Route::post('/withdrawp', 'App\Http\Controllers\ApiController@withdrawp');
Route::post('/buyproduct', 'App\Http\Controllers\ApiController@buyproduct');
Route::post('/sendusdt', 'App\Http\Controllers\ApiController@sendusdt');
Route::get('/sendproduct', 'App\Http\Controllers\ApiController@sendproduct');
Route::post('/sendproduct', 'App\Http\Controllers\ApiController@sendproduct');

Route::post('/singletap', 'App\Http\Controllers\ApiController@singletap');
Route::post('/getcusname', 'App\Http\Controllers\ApiController@getcusname');
Route::post('/stoproduct', 'App\Http\Controllers\ApiController@stoproduct');

Route::post('/successproduct', 'App\Http\Controllers\ApiController@successproduct');
Route::post('/creditbuy', 'App\Http\Controllers\ApiController@creditbuy');
Route::post('/customer/support', 'App\Http\Controllers\ApiController@customersupport');
Route::get('/appi', 'App\Http\Controllers\HelperController@appi');
