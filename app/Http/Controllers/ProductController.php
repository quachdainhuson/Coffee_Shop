<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj = new Product();
        $products = $obj->index();
        return view('Admin.Product.product',[
            'products' => $products
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objCate = new Category();
        $categories = $objCate->index();
        $objSize = new Size();
        $sizes = $objSize->index();
        return view('Admin.Product.add_product',[
            'categories' => $categories,
            'sizes' => $sizes

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $obj = new Product();
        $obj->product_name = $request->product_name;
        $obj->product_description = $request->product_description;
        $obj->cate_id = $request->cate_id;
        $obj->store();

        return redirect()->route('products.product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
