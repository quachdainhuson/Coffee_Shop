<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TableCoffee extends Model
{
    use HasFactory;
    protected $table = 'table_coffees';
    protected $fillable = [
        'table_name',
        'table_status'
    ];
    public $timestamps = false;
    public function receipt(){
        return $this->hasMany(Receipt::class, 'table_id', 'id');
    }
    public function index(){
        $tables = DB::table('table_coffees')
                    ->get();
        return $tables;
    }


    public function store(){
        DB::table('table_coffees')->insert([
            'table_name'=> $this->table_name,
            'table_status'=> $this->table_status
        ]);
    }

    public function edit(){
        $tables = DB::table('table_coffees')
        ->where('id', $this->id)
        ->get();
        return $tables;
    }

    public function updateTable(){
        DB::table('table_coffees')
        ->where('id', $this -> id)
        ->update([
            'table_name' => $this->table_name,
            'table_status'=> $this->table_status

        ]);
    }

    public function deleteTable(){
        DB::table('table_coffees')
        ->where('id', $this->id)
        ->delete();
    }
}
