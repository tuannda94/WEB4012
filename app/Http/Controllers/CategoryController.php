<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
            // ->where('id', '>', 3)
            // ->get();
            ->paginate(10);

        return view('category.index', ['categories' => $categoriesGet]);
        // dd('Danh sach category', $categories, $categoriesGet);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $categoryRequest = $request->all();
        $category = new Category();
        $category->name = $categoryRequest['name'];
        $category->description = $categoryRequest['description'];
        $category->status = $categoryRequest['status'];
        $category->slug = Str::slug($categoryRequest['name']);
        // use Illuminate\Support\Str;

        $category->save();

        return redirect()->route('categories.index');
    }

    public function delete(Category $cate) {
        // Neu muon su dung model binding
        // 1. Dinh nghia kieu tham so truyen vao la model tuong ung
        // 2. Tham so o route === ten tham so truyen vao ham
        if ($cate->delete()) {
            return redirect()->route('categories.index');
        }

        // Cach 1: destroy, tra ve id cua thang duoc xoa
        // Chi ap dung khi nhan vao tham so la gia tri
        // Neu k xoa duoc thi tra ve 0
        $categoryDelete = Category::destroy($id);
        if ($categoryDelete !== 0) {
            return redirect()->route('categories.index');
        }
        // dd($categoryDelete);

        // Cach 2: delete, tra ve true hoac false
        // $category = Category::find($id);
        // $category->delete();
    }
}
