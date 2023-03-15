<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $units = Units::all();
        return view('Backend.Unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = new Units();

        $unit ->description = $request->description;
        $unit ->name = $request->name;
        $unit ->save();
        return redirect()->back()->with('message', 'Unit Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function unit_status(Units $unit)
    {
        if ($unit->status == 1) {

            $unit->update(['status' => 0]);
        } else {

            $unit->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'status added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = Units::find($id);
        return view('Backend.Unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $unit = Units::find($id);

        $unit->name = $request->name;

        $unit->description = $request->description;
        $unit->save();
        if ($unit)
            return redirect('/units')->with('message', 'Unit Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Units::find($id);

        $delete->delete();
        if($delete)
            return redirect('/units')->with('message', 'Delete Successfully');
    }
}
