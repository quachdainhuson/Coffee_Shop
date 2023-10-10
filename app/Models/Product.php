<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'cate_id',
    ];
    public function categories(){
        return $this->belongsTo(Category::class, 'cate_id');
    }
    public function product_details(){
        return $this->hasMany(ProductDetail::class, 'product_id');
    }

}
