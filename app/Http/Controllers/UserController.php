<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Lấy ra toàn bộ bản ghi trong DB bảng users
        // $users = User::all();

        $users = User::select('id', 'name', 'birthday', 'username', 'email')
        ->get();
        // dd($users);

        return view('admin.user.list', ['user_list' => $users]);
    }
}
