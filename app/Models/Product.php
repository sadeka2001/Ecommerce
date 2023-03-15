<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['id','cat_id', 'subcat_id', 'brand_id','unit_id', 'size_id', 'color_id','product_code','name','description','price', 'image', 'status'];
public function Category(){
       return  $this->belongsTo(Category::class,'cat_id');
    }

    public function subcategory(){
        return  $this->belongsTo(Sub_Category::class,'subcat_id');
     }
     public function brand(){
        return  $this->belongsTo(Brand::class,'brand_id');
     }
     public function unit(){
        return  $this->belongsTo(Units::class,'unit_id');
     }
     public function size(){
        return  $this->belongsTo(Sizes::class,'size_id');
     }

     public function Color(){
        return  $this->belongsTo(Color::class,'color_id');
     }
}
