<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Employee extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    public $timestamps = false;
    public function index()
    {
        $employees = DB::table('employees')->get();
        return $employees;
    }
    public function store()
    {
        DB::table('employees')->insert([
            'employee_name' => $this->employee_name,
            'employee_email' => $this->employee_email,
            'employee_phone' => '1023456789',
            'username' => $this->username,
            'password' => $this->password,
            'role' => $this->role
        ]);
    }
    public function edit()
    {
        $employee = DB::table('employees')
            ->where('id', $this->id)
            ->get();
        return $employee;
    }
    public function updateEmployee(){
        DB::table('employees')
            ->where('id', $this->id)
            ->update([
                'employee_name' => $this->employee_name,
                'employee_email' => $this->employee_email,
                'employee_phone' => $this->employee_phone,
                'username' => $this->username,
                'password' => $this->password,
                'role' => $this->role
            ]);

    }
    public function destroyUser(){
        DB::table('employees')
            ->where('id', $this->id)
            ->delete();
    }

}
