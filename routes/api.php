<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// http://localhost:8000/api/test-api
Route::get('test-api', function () {
    return response()->json([
        'status' => 200,
        'data' => [
            'username' => 'tuannda3',
            'password' => '1234567'
        ]
    ]);
});
// http://localhost:8000/api/users
Route::get('users', [UserController::class, 'apiGetListUser']);

// Route tự định nghĩa phương thức và hàm xử lý theo rule của laravel
Route::resource('classrooms', UserController::class);
