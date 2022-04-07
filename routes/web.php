<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
// Su dung Request $request trong callback cua route

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
// Thu muc view: resources/views/"welcome".blade.php
// Route::get('/', function () {
//     $students = [
//         [
//             'name' => 'Tuannda3',
//             'age' => 20,
//             'class' => 'WE16201',
//             'id' => '1',
//             'avatar' => "https://iap.poly.edu.vn/user/ph/PH13025.jpg"
//         ],
//         [
//             'name' => 'Tuannda3',
//             'age' => 20,
//             'class' => 'WE16201',
//             'id' => '2',
//             'avatar' => "https://iap.poly.edu.vn/user/ph/PH13025.jpg"
//         ],
//     ];
//     // dd($students);
//     return view('welcome', ['students' => $students]);
// });

// Thu muc view: resources/views/"auth/login".blade.php => auth.login
Route::get('/login', function () {
    // dd('login view');
    $email = 'tuannda3@fe.edu.vn';
    $password = '123456';
    // return view('auth.login')->with('emaill', $email);
    // view(ten view, mang gia tri truyen sang view)
    return view('auth.login', [
        'emaill' => $email,
        'password' => $password
    ]);
});

Route::get('/', function () {
    $students = [
        [
            'name' => 'Tuannda3',
            'age' => 20,
            'class' => 'WE16201',
            'id' => '1',
            'avatar' => "https://iap.poly.edu.vn/user/ph/PH13025.jpg"
        ],
        [
            'name' => 'Tuannda3',
            'age' => 20,
            'class' => 'WE16201',
            'id' => '2',
            'avatar' => "https://iap.poly.edu.vn/user/ph/PH13025.jpg"
        ],
    ];
    // dd($students);
    return view('home', ['students' => $students]);
})->name('home');

Route::get('/product', function () {
    return view('product');
});

// Route kem query string va params
// Voi tham so truyen vao url thi function se nhan 1 tham so tuong ung
Route::get('/users/{userId}/{username?}', function (
    Request $request,
    $userId,
    $userName = 'profile'
) {
    // dd($userId, $userName, $request->all());
});

// Route::get('/categories', [CategoryController::class, 'index'])
// ->name('categories');

// prefix: duong dan chung cua group, noi -> /categories/create
// name: name chung cua group, noi cac name con: categories.index
Route::prefix('/categories')->name('categories.')->group(function () {
    // Danh sach
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Tao moi
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    // Chinh sua
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
    // Xoa
    Route::delete('/{cate}', [CategoryController::class, 'delete'])->name('delete');
});

Route::middleware('auth')->prefix('/products')->name('products.')->group(function () {
    // Danh sach
    Route::get('/', [ProductController::class, 'index'])->name('index');
    // Tao moi
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    // Chinh sua
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    // Xoa
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('delete');
});

// Logout phải được tiến hành khi người dùng đã đăng nhập, nên middleware là auth
Route::get('/auth/logout', [LoginController::class, 'logout'])
    ->middleware('auth')->name('auth.logout');

Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('post-login');
});
