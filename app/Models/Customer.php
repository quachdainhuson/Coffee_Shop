<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable=[
        'customer_name',
        'email',
        'customer_phone',
        'customer_address',
        'password',
    ];
    public function receipts(){
        return $this->hasMany(Receipt::class, 'customer_id');
    }
    use HasFactory;

}
