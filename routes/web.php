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
use Illuminate\Support\Facades\Auth;


Route::get('/test', function () {
    dd(Auth::guard('member'));
    // dd(config());
});
Route::get('/', function () {
//    return view('welcome');
    dd(config());
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function(){
    Route::get('/user', function(){
        $user = session('wechat.oauth_user.default'); //拿到授权用户资料
        dd($user);
    });
});