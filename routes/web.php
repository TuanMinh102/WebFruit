<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PusherController;

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
Route::get('/home',[HomeController::class,"homeview"]);
Route::get('/',[HomeController::class,"welcomeview"]);

Route::get('/login',[UserController::class,"loginview"]);
Route::get('/logout',[UserController::class,"logout"]);
Route::get('/dn',[UserController::class,"dangnhap"]);
Route::get('/dk',[UserController::class,"dangky"]);
Route::get('/edit{id}',[UserController::class,"editProfile"]);
Route::get('/otp',[UserController::class,"SendOTP"]);
Route::get('/recoverpass',[UserController::class,"Laylaimk"]);

Route::get('/shop',[ProductController::class,"Shopview"]);
Route::get('/basket',[ProductController::class,"Shopview"]);
Route::get('/ct',[ProductController::class,"chitiet"]);
Route::get('/cats{id}',[ProductController::class,"Catogories"]);
Route::get('/brands{id}',[ProductController::class,"Brands"]);
Route::get('/ct{id}',[ProductController::class,"details"]);
Route::get('/search',[ProductController::class,"timkiem"]);
Route::get('/range',[ProductController::class,"RangePrice"]);
Route::get('/review',[ProductController::class,"insertReview"]);

Route::get('/gh',[CartController::class,"getcart"]);
Route::get('/gh{id}',[CartController::class,"addcart"]);
Route::get('/delAll',[CartController::class,"xoatoanbo"]);
Route::get('/update{id}',[CartController::class,"capnhatgh"]);
Route::get('/delProduct{id}',[CartController::class,"delProduct"]);
Route::get('/getDetailInvoices',[CartController::class,"get_detailBill"]);
Route::get('/reviewProduct',[CartController::class,"reviewProduct"]);


Route::get('/tt',[CheckoutController::class,"checkoutview"]);
Route::get('/ttoan',[CheckoutController::class,"thanhtoan"]);
// Route::get('/sendmail',[CheckoutController::class,"sendMail2"]);


Route::get('/admin',[AdminController::class,"adminview"]);
Route::post('/login-admin',[AdminController::class,"login"]);

Route::get('/chat',[ChatController::class,"chatview"]);
Route::get('/chat{id}',[ChatController::class,"get_history_chat"]);
Route::get('/send',[ChatController::class,"sendMessage"]);
Route::get('/getmsg',[ChatController::class,"getmsg"]);


Route::get('/ckeditor',[NewsController::class,"editor"]);
Route::get('/news',[NewsController::class,"newsList"]);
Route::get('/news{id}',[NewsController::class,"getNews"]);
Route::get('/insertNews',[NewsController::class,"insert"]);

Route::get('/pusher',[PusherController::class,"index"]);
Route::post('/broadcast',[PusherController::class,"broadcast"]);
Route::post('/receive',[PusherController::class,"receive"]);

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');