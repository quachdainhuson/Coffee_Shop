<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Employee extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    protected $table = 'employees';
    protected $fillable = [
        'employee_name',
        'employee_email',
        'employee_phone',
        'username',
        'password',
        'role'
    ];

    public $timestamps = false;
    public function receipts(){
        return $this->hasMany(Receipt::class, 'employee_id');
    }
}
