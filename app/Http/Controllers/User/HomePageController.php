<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\StoreHomePageRequest;
use App\Http\Requests\UpdateHomePageRequest;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Client.home');
    }
    public function product()
    {
        $objProduct = new Product();
        $products = $objProduct->index();
        $objCate = new Category();
        $categories = $objCate->index();
        return view('Client.product',[
            'products' => $products,
            'categories' => $categories
        ]);
    }
    public function detail(Request $request)
    {
        $objSize = new Size();
        $sizes = $objSize->index();
        $objCate = new Category();
        $categories = $objCate->index();
        $objProductDetail = new Product();
        $objProductDetail->id = $request->id;
        $products_detail = $objProductDetail->edit();
        return view('Client.product_detail',[
            'categories' => $categories,
            'sizes' => $sizes,
            'products_detail' => $products_detail['products_detail'],
            'products' => $products_detail['products']

        ]);
    }
    public function cart()
    {
        return view('Client.cart');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomePageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomePageRequest $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
