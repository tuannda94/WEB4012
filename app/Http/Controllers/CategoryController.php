<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Eloquent
        // all: lay ra toan bo cac ban ghi
        $categories = Category::all();
        // get: lay ra toan bo cac ban ghi, ket hop dc cac dieu kien #
        // get se nam cuoi cung cua doan truy van
        $categoriesGet = Category::select('id', 'name', 'description')
            ->where('id', '>', 3)
            ->get();

        return view('category.index', ['categories' => $categoriesGet]);
        dd('Danh sach category', $categories, $categoriesGet);
    }

    public function add()
    {
        // return ve view tao moi category
    }
}
