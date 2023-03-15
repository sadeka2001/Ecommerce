<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('Backend.Color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $colors=explode(',',$request->color);
        $color = new Color();
        $color->color = json_encode($colors);
        $color->save();
        return redirect()->back()->with('message', 'Color Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function color_status(Color  $color)
    {
        if ($color->status == 1) {

            $color->update(['status' => 0]);
        } else {

            $color->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'status added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $color = Color::find($id);
        return view('Backend.Color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $colors=explode(',',$request->color);
        $color =Color::find($id);
        $color->color = json_encode($colors);
        $color->save();
        if ($color)
            return redirect('/color')->with('message', 'color Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Color::find($id);

        $delete->delete();
        if($delete)
            return redirect('/color')->with('message', 'Delete Successfully');
    }
}
