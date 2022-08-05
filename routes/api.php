<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;

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
    $a = 'TEST API DATA';

    // return $a;
    // return [
    //     'data' => $a
    // ];
    return response()->json([
        'status' => 200,
        'data' => $a
    ], 404);
});

// php artisan route:list để kiểm tra ds route hiện tại trong project
Route::resource('positions', PositionController::class);
