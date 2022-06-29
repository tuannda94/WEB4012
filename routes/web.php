<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route mới
Route::get('/users', function () {
    // trả về giao diện resources/views/user-list.blade.php
    $class = 'WE16307';
    $users = [
        [
            'name' => 'tuannda3',
            'age' => '28',
            'address' => 'HN',
            'phone' => '0392871868',
            'email' => 'tuannda3@fe.edu.vn',
            'status' => 0
        ],
        [
            'name' => 'tuannda4',
            'age' => '29',
            'address' => 'HN',
            'phone' => '0392871869',
            'email' => 'tuannda4@fe.edu.vn',
            'status' => 1
        ],
        [
            'name' => 'NGUYEN VAN A',
            'age' => '20',
            'address' => 'HN',
            'phone' => '0123xxxxxxx',
            'email' => 'nva@fe.edu.vn',
            'status' => 0
        ],
    ];
    // Truyền giá trị sang view bằng tham số thứ 2
    // key là tên biến bên view nhận, và value là giá trị ở bên này
    return view('user-list', [
        'class_name' => $class,
        'user_list' => $users
    ]);
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    dd($id, $name);
});

// use Illuminate\Http\Request;
Route::get('/products', function (Request $request) {
    dd($request->all());
    // /products?id=1&product-name=iphone
});

// Chức năng đăng ký và hiển thị kết quả đăng ký
Route::get('/register', function () {
    return view('register'); // cần 1 file register.blade.php có chứa form đăng ký
});
Route::get('/register-success', function (Request $request) {
    // dd($request->all());
    // nhận kết quả từ request GET gửi sang -> trả sang view để hiển thị
    // có 1 view là register-success.blade.php để hiển thị kq
    $response = $request->all();
    return view('register-success', $response
    // [
    //     'name' => $response['name'],
    //     'email' => $response['email'],
    //     'password' => $response['password'],
    // ]
    );
})->name('register-success');

