<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    public function table(){
        return $this->belongsTo(Table::class, 'table_id');
    }
    public function receipt_details(){
        return $this->hasMany(ReceiptDetail::class, 'receipt_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public function getOrder(){
        $customer = Session::get('customer');
        return DB::table('receipts')
            ->select('receipts.*', 'customers.id as customer_id', 'customers.customer_name', 'customers.email', 'customers.customer_phone', 'customers.customer_address')
            ->join('customers', 'customers.id', '=', 'receipts.customer_id')
            ->where('customers.id', $customer['id'])
            ->orderBy('receipts.id', 'desc')
            ->get();
    }
}
