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
        $users = User::select('id', 'name', 'username', 'email')
            ->where('id', '>', 5) // (trường, toán tử so sánh, giá trị)
            ->where('id', '<', 7) // (trường, toán tử so sánh, giá trị)
            ->get();
        // dd($users);
        $usersPaginate = User::select('id', 'name', 'username', 'email', 'role')
            // ->cursorPaginate(5);
            ->paginate(5);
        // dd($usersPaginate);
        return view('admin.user.list', ['user_list' => $usersPaginate]);
    }
}
