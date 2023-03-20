<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Sizes;

use App\Models\Color;
use App\Models\Units;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
    //return view('Fronted.Welcome');

        $categories = Category::all();
        $subcategories = Sub_Category::all();
        $brands = Brand::all();
        $units = Units::all();
        $sizes = Sizes::all();
        $colors = Color::all();
        $products = Product::where('status',1)->latest()->limit(12)->get();
        return view('Fronted.Welcome', compact('categories', 'subcategories', 'brands', 'units', 'sizes', 'colors','products'));
   }
   public function view_details($id){

        $categories = Category::all();
        $subcategories = Sub_Category::all();
        $brands = Brand::all();
        $units = Units::all();
        $product = Product::FindOrFail($id);
        $sizes = Sizes::find($product->size_id);
        $colors = Color::find($product->color_id);
        $cat_id=$product->cat_id;
        $related_products=product::where('cat_id',$cat_id)->limit(4)->get();

        return view('Fronted.Pages.view_details', compact('categories', 'subcategories', 'brands', 'units', 'product','sizes', 'colors','related_products'));
   }

   public function product_by_cat($id){

    $categories = Category::all();
    $subcategories = Sub_Category::all();
    $brands = Brand::all();
    $products = Product::where('status',1)->where('cat_id',$id)->limit(12)->get();
    return view('Fronted.Pages.product_by_cat', compact('categories', 'subcategories', 'brands', 'products'));

   }

   public function product_by_subcat($id){

    $categories = Category::all();
    $subcategories = Sub_Category::all();
    $brands = Brand::all();
    $products = Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
    return view('Fronted.Pages.product_subcat', compact('categories', 'subcategories', 'brands', 'products'));

   }
 public function search(Request $request){
   $products=Product::orderBy('id','desc')->where('name','LIKE','%'.$request->product.'%');
        if($request->category != "ALL") $products->where('cat_id',$request->category);
        $products= $products->get();
        $categories= Category::all();
        $subcategories= Sub_Category::all();
        $brands= Brand::all();
        return view('Fronted.Pages.product_subcat',compact('categories','subcategories','brands','products'));
}
}
