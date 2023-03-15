<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategory = sub_Category::all();
        return view('Backend.SubCategory.index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();

         return view('Backend.SubCategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

        {
            $sub_category = new Sub_Category();
            $sub_category->cat_id = $request->category;

            $sub_category->name = $request->name;
            $sub_category->description = $request->description;
            $sub_category->save();
            return redirect()->back()->with('message', 'Sub Category Added Successfully');
        }


    /**
     * Display the specified resource.
     */
    public function category_status(Sub_Category $subcategory)
    {
        if ($subcategory->status == 1) {

            $subcategory->update(['status' => 0]);
        } else {

            $subcategory->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'status added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */


          /*public function edit(Sub_Category $subcategory)
      {
            $categories=Category::all();
            //$subcategory=Sub_Category::find($id);
            return view('Backend.SubCategory.edit', compact('categories','subcategory'));
        }*/



        public function edit($id)
        {
            $subCategory = Sub_Category::find($id);
            $categories=Category::all();
            return view('Backend.SubCategory.edit', compact('categories', 'subCategory'));
        }



    /**
     * Update the specified resource in storage.
     */

   /*public function update(Request $request, Sub_Category $subcategory){

        $update=$subcategory->update([
            'name'=>$request->name,
            'cat_id' =>$request->category,
            'description' => $request->description,
        ]);

        if ($update)
            return redirect('/sub_categories')->with('message', 'Category Updated successfully');*/

        public function update(Request $request, $id)
        {
        $subcategory = Sub_Category::find($id);
        $subcategory->cat_id = $request->category;

        $subcategory->name = $request->name;

        $subcategory->description = $request->description;

        $subcategory->save();
        if ($subcategory)
            return redirect('/sub_categories')->with('message', 'Category Updated successfully');



    }
    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $subcategory = Sub_Category::find($id);

        $subcategory->delete();
        if( $subcategory)
            return redirect('/categories')->with('message', 'Delete Successfully');
    }

}
