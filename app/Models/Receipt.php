<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{

    use HasFactory;
    protected $table = 'receipts';
    public $timestamps = false;
    protected $fillable = [
        'status',
        'order_date',
        'total_price',
        'note',
        'employee_id',
        'customer_id',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
