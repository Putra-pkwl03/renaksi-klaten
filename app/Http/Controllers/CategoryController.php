<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('unit')->latest()->get();
        $units = Unit::all(); 
        $topbarTitle = 'Daftar Kategori'; 

        return view('apps.category', compact('categories', 'units', 'topbarTitle'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('components.CategoryForm', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
        ]);

        Category::create($request->only(['nama_kategori', 'unit_id']));

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $units = Unit::all();
        return view('categories.edit', compact('category', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
        ]);

        $category->update($request->only(['nama_kategori', 'unit_id']));

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
