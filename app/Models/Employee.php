<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{

    use HasFactory;
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
            'employee_phone' => $this->employee_phone,
            'username' => $this->username,
            'password' => $this->password,
            'role' => $this->role
        ]);
    }
    public function edit()
    {
        $employee = DB::table('employees')
            ->where('employee_id', $this->employee_id)
            ->get();
        return $employee;
    }
    public function updateEmployee(){
        DB::table('employees')
            ->where('employee_id', $this->employee_id)
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
            ->where('employee_id', $this->employee_id)
            ->delete();
    }
}
