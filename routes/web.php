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
            'email' => 'tuannda3@fe.edu.vn'
        ],
        [
            'name' => 'tuannda4',
            'age' => '29',
            'address' => 'HN',
            'phone' => '0392871869',
            'email' => 'tuannda4@fe.edu.vn'
        ],
        [
            'name' => 'NGUYEN VAN A',
            'age' => '20',
            'address' => 'HN',
            'phone' => '0123xxxxxxx',
            'email' => 'nva@fe.edu.vn'
        ],
    ];
    // Truyền giá trị sang view bằng tham số thứ 2
    // key là tên biến bên view nhận, và value là giá trị ở bên này
    return view('user-list', [
        'class_name' => $class,
        'user_list' => $users
    ]);
});
