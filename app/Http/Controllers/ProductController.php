<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Sizes;

use App\Models\Color;
use App\Models\Units;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('Backend.Products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=Sub_Category::all();
        $brands=Brand::all();
        $units=Units::all();
        $sizes=Sizes::all();
        $colors=Color::all();
        return view('Backend.Products.create',compact('categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->brand_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = $request->size;
        $product->color_id=$request->color;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->product_code = $request->product_code;

        if($files=$request->file('file')){
        $images = array();
        $i=0;
        foreach($files as $file){

        $name=$file->getClientOriginialName();
        $fileNameExtract=explode('.',$name);
        $fileName=$fileNameExtract[0];
        $fileName.=time();
        $fileName.=$i;
        $fileName.='.';
        $fileName=$fileNameExtract[1];
        $file->move('image',$fileName);
        $images[]=$fileName;
        $i++;
      }
        $product['images']=implode("|",$images);
        $product ->save();
        return redirect()->back()->with('message', 'Product Added Successfully');

    }

   else{
    echo "No files";
     }
 }
    /**
     * Display the specified resource.
     */
    public function Product_status(Product $product)
    {
        if ($product->status == 1) {

            $product->update(['status' => 0]);
        } else {

            $product->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'status added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories=Category::all();
        $subcategories=Sub_Category::all();
        $brands=Brand::all();
        $units=Units::all();
        $sizes=Sizes::all();
        $colors=Color::all();
        return view('Backend.Products.edit',compact('product','categories','subcategories','brands','units','sizes','colors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = new Product();
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->brand_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = $request->size;
        $product->color_id=$request->color;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->product_code = $request->product_code;

        if($files=$request->file('file')){
        $images = array();
        $i=0;
        foreach($files as $file){

        $name=$file->getClientOriginialName();
        $fileNameExtract=explode('.',$name);
        $fileName=$fileNameExtract[0];
        $fileName.=time();
        $fileName.=$i;
        $fileName.='.';
        $fileName=$fileNameExtract[1];
        $file->move('image',$fileName);
        $images[]=$fileName;
        $i++;
      }
        $product['images']=implode("|",$images);
        $product ->save();
        return redirect()->back()->with('message', 'Product Added Successfully');

    }

   else{
    echo "No files";
     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Product::find($id);

        $delete->delete();
        if($delete)
        return redirect('/products')->with('message', 'Delete Product Successfully');
    }
}
