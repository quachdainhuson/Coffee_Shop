<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
