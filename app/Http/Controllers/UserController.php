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
        // ->get();
        ->where('id', '>', 3) // (tên trường, toán tử điều kiện, giá trị)
        // ->where('id', '<=', 7)
        ->paginate(5);
        // ->cursorPaginate(5); truy vấn where id > 5 limit 5
        // dd($users);

        return view('admin.user.list', ['user_list' => $users]);
    }

    // public function delete($id) {
    //     // Cách 1
    //     // if ($id) {
    //     //     $user = User::find($id);
    //     //     if ($user->delete()) {
    //             // return redirect()->route('users.list');
    //     //     }
    //     // }

    //     // Cách 2
    //     if($id) {
    //         if(User::destroy($id)) {
    //             return redirect()->back();
    //         }
    //     }
    // }
    // Cách 3
    public function delete(User $user) {
        if($user->delete()) {
            return redirect()->back();
        }
    }
}
