<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj = new Category();
        $categories = $obj ->index();
        return view('Admin.Categories.categories',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.add_categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $obj = new Category();
        $obj->cate_name = $request->cate_name;
        $obj->store();
        return Redirect::route('categories.category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Request $request)
    {
        $obj = new Category();
        $obj->id = $request->id;
        $categories = $obj->edit();
        return view('Admin.Categories.edit_categories',[
            'categories' => $categories,
            'id' => $obj->id
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $obj = new Category();
        $obj -> id = $request -> id;
        $obj -> cate_name = $request -> cate_name;
        $obj -> updateCategory();
        return Redirect::route('categories.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {
        $obj = new Category();
        $obj -> id = $request->id;
        $obj -> deleteCategory();
        return Redirect::route('categories.category');
    }
}
