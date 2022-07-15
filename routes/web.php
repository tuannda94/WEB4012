<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Nếu báo UserController không tồn tại
use App\Http\Controllers\UserController;

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
    // trả về view resources/views/welcome.blade.php
    return view('welcome');
});

// use Illuminate\Http\Request;
// Route::get('/users', function (Request $request) {
//     dd($request->all()); // ~ var_dump($request);die();
//     $requestData = $request->all();
//     // trả về ds users có kết hợp bootstrap
//     $title = 'Danh sách người dùng';
//     $users = [
//         [
//             'name' => 'tuannda3',
//             'age' => 30,
//             'address' => 'HN',
//             'status' => 1
//         ],
//         [
//             'name' => 'tuannda4',
//             'age' => 31,
//             'address' => 'HCM',
//             'status' => 0
//         ],
//     ];

//     return view('users', [
//         'view_title' => $title,
//         'user_list' => $users
//     ]);
// });

// Route::get('/users/{id}/{name}', function ($userId, $username) {
//     // vị trí của tham số phải khớp với vị trí biến trong url
//     // không cần đặt tên giống nhau
//     dd($userId, $username);
// });

// Route::get('/register', function () {
//     // cần tạo 1 file register.blade.php và có form name, email, pw
//     return view('register');
// });
// Route::get('/register-success', function (Request $request) {
//     // Nhận dữ liệu và truyền sang cho view request-success.blade.php
//     $requestData = $request->all(); // ['name' => gtri, 'email' => gtr, 'password' => gtri]
//     return view('register-success', $requestData);
// })->name('regis-success');

// Route::post('/register-success', function (Request $request) {
//     $requestData = $request->all();
//     dd($requestData);
// });

// Route::prefix(tiền tố đường dẫn)->name(tên)->group(function() {
    // Route::phuong_thuc(đường dẫn, [Controller::class, hàm])->name(tên);
// })
Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('list'); //users.list
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete'); //name: users.delete
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
});
