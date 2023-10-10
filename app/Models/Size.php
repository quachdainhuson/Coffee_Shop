<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'size_name',
    ];
    public function product_details(){
        return $this->hasMany(ProductDetail::class, 'size_id');
    }
}
