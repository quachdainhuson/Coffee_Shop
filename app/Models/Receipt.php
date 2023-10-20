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
        'order_at',
        'employee_id',
        'customer_id',
        'table_id',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
