<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

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

    public function delete(User $user)
    {
        // Nếu sử dụng model binding thì tên tham số === tên biến trên url
        // Cách 1
        if($user) {
            // Tìm ra $user có id = $id
            // $user = User::find($id); // không cần nếu dùng model binding
            // Tìm ra toàn bộ Post có user_id = $id;
            $posts = Post::where('user_id', '=', $user->id)->get();

            // Chạy qua toàn bộ post liên quan và update user_id
            // Update relation cách 1
            // foreach($posts as $post) {
            //     $post->update(['user_id' => 0]);
            // }
            // Update relation cách 2
            $postIds = $posts->pluck('id'); // Lấy ra mảng id
            Post::whereIn('id', $postIds)->update(['user_id' => 0]); // update các post có id trong mảng

            $user->delete();
            // return redirect()->route('users.list');
            return redirect()->back();
            // dd($posts->pluck('id'));
        }
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store()
    {

    }
}
