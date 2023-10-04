<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    public function index(){
        $products = DB::table('products')
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->select(['products.*',
                'categories.cate_name as cate_name',
            ])
            ->get();
        return $products;
    }
    public function store(){

        return DB::table('products')->insertGetId([
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'product_image' => $this->product_image,
            'cate_id' => $this->cate_id,
        ]);
    }
    public function edit(){
        $products = DB::table('products')
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->select(['products.*',
                'categories.cate_name as cate_name',
            ])
            ->where('products.id', '=', $this->id)
            ->get();
        $products_detail =  DB::table('products')
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->join('sizes', 'product_details.size_id', '=', 'sizes.id')
            ->select(['products.*',
                'categories.cate_name as cate_name',
                'product_details.product_price as product_price',
                'sizes.size_name as size_name',
                'sizes.id as size_id'
            ])
            ->where('products.id', '=', $this->id)
            ->get();
        return [
            'products' => $products,
            'products_detail' => $products_detail
        ];
    }
    public function updateProduct(){
        DB::table('products')
            ->where('id', $this -> id)
            ->update([
                'product_name' => $this->product_name,
                'product_description' => $this->product_description,
                'cate_id' => $this->cate_id,
            ]);
    }

    public function deleteProduct(){

        DB::table('product_details')
            ->where('product_id', $this->id)
            ->delete();

        DB::table('products')
            ->where('id', $this->id)
            ->delete();

    }
}
