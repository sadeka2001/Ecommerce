<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $brand = Brand::all();
        return view('Backend.Brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = new Brand();

        $brand ->description = $request->description;
        $brand ->name = $request->name;
        $brand ->save();
        return redirect()->back()->with('message', 'Brand Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function brand_status(Brand $brand)
    {
        if ($brand->status == 1) {

            $brand->update(['status' => 0]);
        } else {

            $brand->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'status added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('Backend.Brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $brand->name = $request->name;

        $brand->description = $request->description;
        $brand->save();
        if ($brand)
            return redirect('/brand')->with('message', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Brand::find($id);

        $delete->delete();
        if($delete)
            return redirect('/brand')->with('message', 'Delete Successfully');
    }
}
