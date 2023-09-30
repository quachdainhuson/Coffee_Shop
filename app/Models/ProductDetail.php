<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductDetail extends Model
{
    use HasFactory;
    public function store(){
        DB::table('product_details')->insert([
            'product_id' => $this->product_id,
            'size_id' => $this->size_id,
            'product_price' => $this->price,
        ]);
    }
    public function updateProductDetail(){
        DB::table('product_details')
            ->where('product_id', $this -> product_id)
            ->where('size_id', $this -> size_id)
            ->update([
                'product_price' => $this->price,
            ]);
    }
}
