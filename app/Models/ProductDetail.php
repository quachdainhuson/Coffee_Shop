<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'size_id',
        'product_price',
    ];
    public function products(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function sizes(){
        return $this->belongsTo(Size::class, 'size_id');
    }
}
