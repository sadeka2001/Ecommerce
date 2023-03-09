<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $category = Category::all();
        return view('Backend.Category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $category = new Category();

        $category->description = $request->description;
        $category->name = $request->name;

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category', $fileName);
            $category->image = $fileName;
        }
        $category->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    /**
     * Display the specified resource.
     */
    public function category_status(Category $category)
    {

        if ($category->status == 1) {

            $category->update(['status' => 0]);
        } else {

            $category->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'status added successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    /* public function edit(Category $category)

        { $category = Category::all();
        return view('Backend.Category.edit', compact('category'));  }*/
    public function edit($id)
    {
        $category = Category::find($id);
        return view('Backend.Category.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category', $fileName);
            $category->image = $fileName;

        }
        $category->save();
        if ($category)
            return redirect('/categories')->with('message', 'Category Updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();
        if($category)
            return redirect('/categories')->with('message', 'Delete Successfully');
    }

}
