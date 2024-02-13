<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnitStoreRequest;
use App\Models\Unit;
use Barryvdh\Debugbar\Twig\Extension\Extension;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $units = Unit::all();
        return view('unit.index', compact('units'));
    }

    public function create()
    {
        return view('unit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'shot_name'=>'required'
        ]);
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->shot_name = $request->shot_name;
        $unit->save();
        return redirect()->route('unit.index')->with('success', 'Unit created successfully!');
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('unit.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'shot_name'=>'required'
        ]);
        try {
            $unit = Unit::find($id);
            $unit->name = $request->name;
            $unit->shot_name = $request->shot_name;
            $unit->save();
            return redirect()->route('unit.index')->with('success', 'Unit created successfully!');
        } catch (Extension $e) {
            dd($e);
            return redirect()->route('unit.index')->with('error', 'Something went wrong!');
        }
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return redirect()->back();
    }
}
