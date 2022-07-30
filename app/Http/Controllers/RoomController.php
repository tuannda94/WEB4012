<?php

namespace App\Http\Controllers;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        // Sử dụng with và tên quan hệ định nghĩa trong model
        // Tránh N+1 query
        $rooms = Room::with('users')->paginate(5);

        return view('admin.room.list', ['rooms' => $rooms]);
    }
}
