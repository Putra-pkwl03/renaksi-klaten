<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $units = Unit::latest()->get();
        $topbarTitle = 'Daftar Unit'; 
        return view('apps.unit', compact('units', 'topbarTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.UnitsForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        Unit::create($request->only(['nama_unit', 'tahun']));

        return redirect()->route('units.index')
            ->with('success', 'Unit berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'nama_unit' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        $unit->update($request->only(['nama_unit', 'tahun']));

        return redirect()->route('units.index')
            ->with('success', 'Unit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')
            ->with('success', 'Unit berhasil dihapus.');
    }
}
