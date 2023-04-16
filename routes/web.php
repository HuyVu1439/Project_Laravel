<?php

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
use App\Http\Controllers\API\SanphamController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\LoaispController;
use App\Http\Controllers\NhacungcapController;
use App\Http\Controllers\TintucController;
use App\Http\Controllers\SlideController;

// frontend
Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/frontend/shop', function () {
    return view('frontend.shop');
});
Route::get('/frontend/shoploai/{id}', function () {
    return view('frontend.shoploai');
});
Route::get('/frontend/detail', function () {
    return view('frontend.detail');
});

Route::get('/frontend/contact', function () {
    return view('frontend.contact');
});
Route::get('/frontend/cart', function () {
    return view('frontend.cart');
});
Route::get('/frontend/checkout', function () {
    return view('frontend.checkout');
});



// backend
Route::get('admin/login', function () {
    return view('admin.login');
});
//
Route::get('admin/wellcome', function () {
    return view('admin.wellcome');
});
//
Route::get('admin/sanpham', function () {
    return view('admin.sanpham');
});
//
Route::get('admin/khachhang', function () {
    return view('admin.khachhang');
});
//
//
Route::get('admin/nhanvien', function () {
    return view('admin.nhanvien');
});
//
//
Route::get('admin/loaisp', function () {
    return view('admin.loaisp');
});
//
Route::get('admin/nhacungcap', function () {
    return view('admin.nhacungcap');
});
//
Route::get('admin/tintuc', function () {
    return view('admin.tintuc');
});
//
Route::get('admin/slide', function () {
    return view('admin.slide');
});
//
Route::get('admin/kho', function () {
    return view('admin.kho');
});
//
Route::get('admin/users', function () {
    return view('admin.users');
});
//
Route::get('admin/phanhoi', function () {
    return view('admin.phanhoi');
});
//
Route::get('admin/hdban', function () {
    return view('admin.hdban');
});
//
Route::get('admin/chitiethdban', function () {
    return view('admin.chitiethdban');
});
//
Route::get('admin/hdnhap', function () {
    return view('admin.hdnhap');
});
//
Route::get('admin/chitiethdnhap', function () {
    return view('admin.chitiethdnhap');
});
