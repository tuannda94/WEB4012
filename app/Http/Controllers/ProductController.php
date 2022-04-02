<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Tra ve danh sach cac ban ghi product
    public function index()
    {
        // Lấy danh sách kèm bản ghi quan hệ
        // 1. with() ngay trong câu truy vấn
        $products = Product::
        select('id', 'name', 'price', 'category_id')
            // Sử dụng 1 trong 3 cách bên dưới để select cho quan hệ
            // ->with('category', function ($query) {
            //     $query->select('id', 'name');
            // })
            // ->with('category:categories.id,categories.name')
            // ->with('category:id,name')
            ->with('categories:id,name')
            ->orderBy('id', 'desc')
            ->paginate(10);

            // dd($products);

        // 2. load() sau khi đã lấy danh sách
        // $products->load('category');

        return view('product.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Tao ban ghi product moi
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Tra ve thong tin ban ghi product theo id
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Cap nhat thong tin cua 1 ban ghi
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Xoa 1 ban ghi product
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect()->route('products.index');
        }
    }
}
