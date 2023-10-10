<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'cate_name'
    ];
    public function products(){
        return $this->hasMany(Product::class, 'cate_id');
    }

}
