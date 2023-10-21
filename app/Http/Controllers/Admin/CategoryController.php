<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if(Session::get('employee')->role  == 1){
            return view('Admin.Categories.categories',[
                'categories' => $categories
            ]);
        }else{
            flash()->addError('Bạn không có quyền truy cập');
            return redirect()->route('dashboard.dashboard');
        }

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

        Category::create($request->all());
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
        return view('Admin.Categories.edit_categories',[
            'categories' => $category,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return Redirect::route('categories.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {
        if ($category->products->count() > 0){
            flash()->addError('Không thể xóa danh mục này');
            return Redirect::route('categories.category');
        }else{
            $category->delete();
            return Redirect::route('categories.category');
        }

    }
}
