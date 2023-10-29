<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReceiptDetail extends Model
{
    use HasFactory;
    protected $table = 'receipt_details';
    public $timestamps = false;
    protected $fillable = [
        'receipt_id',
        'product_detail_id',
        'quantity',
        'price',
    ];
    public function receipt(){
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }
    public function product_detail(){
        return $this->belongsTo(ProductDetail::class, 'product_detail_id');
    }
    public function getOrderDetail(){
         return DB::table('receipt_details')
             ->select(
                 'receipt_details.*',
                 'product_details.id',
                 'product_details.product_price',
                 'product_details.product_id',
                 'product_details.size_id',
                 'sizes.id',
                 'sizes.size_name',
                 'products.product_name',
                 'products.product_image',
                 'products.product_description'
             )
             ->join('product_details', 'product_details.id', '=', 'receipt_details.product_detail_id')
             ->join('sizes', 'product_details.size_id', '=', 'sizes.id')
             ->join('products', 'product_details.product_id', '=', 'products.id')
             ->where('receipt_details.receipt_id', $this->receipt_id)
             ->get();
    }
}
