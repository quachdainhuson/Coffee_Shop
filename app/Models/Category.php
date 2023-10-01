<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class Category extends Model
{
    use HasFactory;

    public function index(){
        $categories = DB::table('categories')
                    ->get();
        return $categories;
    }

    public function store(){
        DB::table('categories')->insert([
            'cate_name'=> $this->cate_name
        ]);
    }

    public function edit(){
        $categories = DB::table('categories')
        ->where('id', $this->id)
        ->get();
        return $categories;
    }

    public function updateCategory(){
        DB::table('categories')
        ->where('id', $this -> id)
        ->update([
            'cate_name' => $this->cate_name
        ]);
    }

    public function deleteCategory(){
        DB::table('categories')
        ->where('id', $this->id)
        ->delete();
    }
}
