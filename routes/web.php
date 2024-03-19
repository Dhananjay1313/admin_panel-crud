<?php

use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

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
    return view('backend.admin.layouts/index');
});

Route::get('/user', function () {
    return view('backend.admin.user/index');
});

Route::post('/adduser',[Usercontroller::class,'save']);

Route::get('/listuser',[Usercontroller::class,'index']);

Route::post('/getoptions',[Usercontroller::class,'getoptions']);

Route::get('/getuser',[Usercontroller::class,'get']);

Route::post('/update-admin-status',[Usercontroller::class,'updateAdminStatus']);

Route::post('/delete',[Usercontroller::class,'delete']);
