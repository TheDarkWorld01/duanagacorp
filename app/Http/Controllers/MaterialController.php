<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('category')->get();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('materials.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'date_input' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        Material::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'date_input' => $request->date_input,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('materials.index');
    }

    public function edit(Material $material)
    {
        $categories = Category::all();
        return view('materials.edit', compact('material', 'categories'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'date_input' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $material->update($request->all());
        return redirect()->route('materials.index');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index');
    }
}
