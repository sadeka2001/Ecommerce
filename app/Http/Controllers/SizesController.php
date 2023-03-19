<?php

namespace App\Http\Controllers;

use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sizes = Sizes::all();

        return view('Backend.Size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sizes=explode(',',$request->size);
        $size = new Sizes();
        $size->size=json_encode($sizes);
        $size->save();
        return redirect()->back()->with('message', ' Size Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function size_status(Sizes  $size)
    {
        if ( $size->status == 1) {

            $size->update(['status' => 0]);
        } else {

            $size->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'status added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $size = Sizes::find($id);
        return view('Backend.Size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $sizes=explode(',',$request->size);
        $size =Sizes::find($id);
        $update=$size->update(['size'=>json_encode($sizes)]);
     //   $update->save();
        if($update)
            return redirect('/sizes')->with('message', 'sizes Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Sizes::find($id);

        $delete->delete();
        if($delete)
            return redirect('/sizes')->with('message', 'Delete Successfully');
    }
}
