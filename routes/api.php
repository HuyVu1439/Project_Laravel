<?php

use Illuminate\Http\Request;
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
use App\Http\Controllers\API\SanphamController;
use App\Http\Controllers\API\KhachhangController;
use App\Http\Controllers\API\NhanvienController;
use App\Http\Controllers\API\LoaispController;
use App\Http\Controllers\API\NhacungcapController;
use App\Http\Controllers\API\KhoController;
use App\Http\Controllers\API\TintucController;
use App\Http\Controllers\API\SlideController;
use App\Http\Controllers\api\HDBanController;
use App\Http\Controllers\api\ChitietHDBanController;
use App\Http\Controllers\api\HDNhapController;
use App\Http\Controllers\api\ChitietHDNhapController;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\PhanhoiController;
// use App\Http\Controllers\API\lienhecontroller;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('sanphams', SanphamController::class);
Route::resource('sanphamhome', SanphamController::class);
Route::resource('khachhangs', KhachhangController::class);
Route::resource('nhanviens', NhanvienController::class);
Route::resource('loaisps', LoaispController::class);
Route::resource('nhacungcaps', NhacungcapController::class);
Route::resource('khos', KhoController::class);
Route::resource('tintucs', TintucController::class);
Route::resource('slides', SlideController::class);
Route::resource('lienhe', lienhecontroller::class);
Route::resource('userss', UsersController::class);
Route::resource('phanhois', PhanhoiController::class);
Route::resource('hdbans', HDBanController::class);
Route::resource('chitiethdbans', ChitietHDBanController::class);
Route::resource('hdnhaps', HDNhapController::class);
Route::resource('chitiethdnhaps', ChitietHDNhapController::class);