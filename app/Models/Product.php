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
            'product_image' => '1',
            'cate_id' => $this->cate_id,
        ]);

    }
}
