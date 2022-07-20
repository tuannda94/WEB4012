<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        // Lấy ra toàn bộ bản ghi trong DB bảng users
        // $users = User::all();

        $users = User::select('id', 'name', 'birthday', 'username', 'email', 'avatar')
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

    public function create()
    {
        // 1. Lấy ra danh sách room để bên view select
        $rooms = Room::select('id', 'name')->get();
        // 2. Trả về view kèm dữ liệu room
        return view('admin.user.create', [
            'rooms' => $rooms
        ]);
    }

    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : $fileName;

        return $file->storeAs($folder, $fileName);
    }

    public function store(Request $request)
    {
        // 1. Khởi tạo đối tượng user mới
        $user = new User();
        // 2. Cập nhật giá trị cho các thuộc tính của $user
        // $user->name = $request->name;
        // $user->phone = $request->phone;
        $user->fill($request->all()); // đặt name ở form cùng giá trị với thuộc tính
        // 3. Xử lý file avatar gửi lên
        if($request->hasFile('avatar')) {
            // Nếu trường avatar có file thì sẽ trả về true
            // 3.1 Xử lý tên file
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            // dd($avatar->storeAs('images/users', $avatarName));
            // 3.2 Lưu file và gán đường dẫn cho $user->avatar
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
            // storage/app/images/users
            // Cấu hình config/filesystems.php để public/images ~ storage/app/images
            // Chạy câu lệnh: php artisan storage:link
        } else {
            $user->avatar = '';
        }
        // 4. Lưu
        $user->save();

        return redirect()->route('users.list');
        // Lab: Thực hiện chức năng chỉnh sửa, method PUT, có dữ liệu của user hiện tại và lưu

    }

    public function edit(User $user)
    {
        $user->birthday = date('Y-m-d', strtotime($user->birthday));
        $rooms = Room::select('id', 'name')->get();
        return view('admin.user.create', [
            'user' => $user,
            'rooms' => $rooms,
        ]);
    }

    public function update(Request $request, User $user) {
        $user->fill($request->except('password'));

        if($request->hasFile('avatar')) {
            $user->avatar = $this->saveFile(
                $request->avatar,
                $request->name,
                'images/users/'
            );
        }
        if($request->password) {
            $user->password = $request->password;
        }

        $user->save();
        return redirect()->route('users.list');
    }
}
