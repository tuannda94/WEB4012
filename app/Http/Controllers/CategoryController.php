<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        // Eloquent
        // all: lay ra toan bo cac ban ghi
        $categories = Category::all();
        // get: lay ra toan bo cac ban ghi, ket hop dc cac dieu kien #
        // get se nam cuoi cung cua doan truy van
        $categoriesGet = Category::select('*')
            ->withCount('products')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('category.index', ['categories' => $categoriesGet]);
        // dd('Danh sach category', $categories, $categoriesGet);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        // Validate
        // $request->validate([
        //     // name nào sẽ validate điều kiện gì
        //     'name' => 'required|min:6|max:32',
        //     'description' => 'min:6',
        //     'status' => 'required'
        // ]);
        // Nếu có lỗi trong điều kiện truyền vào thì tự động kết thúc
        // hàm và quay trở lại form kèm biến $errors

        $categoryRequest = $request->all();
        $category = new Category();
        $category->name = $categoryRequest['name'];
        $category->description = $categoryRequest['description'];
        $category->status = $categoryRequest['status'];
        $category->slug = Str::slug($categoryRequest['name']) . '-' . uniqid();
        // use Illuminate\Support\Str;

        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit(Category $id)
    {
        // Neu khong sd model binding
        // $cate = Category::find($id);
        // $id bây giờ không phải 1 số mà là đối tương Category có id = id trên param

        // 1. Nếu việc gọi đến phương thức mà không có cú pháp gọi hàm
        // -> trả về 1 collection (array object), giống all()
        $products = $id->products; // $id là 1 thể hiện của model Category
        // dd($id, $id
        // ->products()->select('name')->paginate(10));
        // 2. Nếu việc gọi đến phương thức có cú pháp gọi hàm
            // -> tiến hành query tiếp được và get() hoặc paginate()
        $productsWithPaginate = $id
            ->products()->select('name')->paginate(10);
        return view('category.create', [
            'category' => $id,
            'products' => $productsWithPaginate
        ]);
    }

    public function update(CategoryRequest $request, Category $id)
    {
        // $request->validate([
        //     // name nào sẽ validate điều kiện gì
        //     'name' => 'required|min:6|max:32',
        //     'description' => 'min:6',
        //     'status' => 'required'
        // ]);

        // $cateUpdate chinh la doi tuong Category co id = $id
        $cateUpdate = $id;
        // Gan gia tri moi cho doi tuong $cateUpdate
        $cateUpdate->name = $request->name;
        $cateUpdate->description = $request->description;
        $cateUpdate->slug = Str::slug($request->name) . '-' . uniqid();
        $cateUpdate->status = $request->status;
        // Thuc thi viec luu du lieu moi vao DB
        $cateUpdate->update();
        // Quay ve danh sach
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
