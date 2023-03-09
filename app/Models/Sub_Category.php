<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sub_Category extends Model
{
    use HasFactory;
    protected $fillable=['id','cat_id', 'name', 'description','status'];

    public function category(){
       return  $this->belongsTo(Category::class,'cat_id');
    }
}
