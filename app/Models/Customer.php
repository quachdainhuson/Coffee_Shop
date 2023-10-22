<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable=[
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
    ];
    public function receipts(){
        return $this->hasMany(Receipt::class, 'customer_id');
    }
    use HasFactory;

}
