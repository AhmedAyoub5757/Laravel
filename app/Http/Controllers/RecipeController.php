<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cusine' => 'required|in:Italian,Chinese,Mexican,French,Japanese',
            'cook_time_minutes' => 'required|integer|min:1|max:1440',
            'ingredients' => 'required|string',
        ]);

        Recipe::create($validated);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.show', compact('recipe'));
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cusine' => 'required|in:Italian,Chinese,Mexican,French,Japanese',
            'cook_time_minutes' => 'required|integer|min:1|max:1440',
            'ingredients' => 'required|string',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->update($validated);

        return redirect()->route('recipes.show', $recipe)->with('success', 'Recipe updated successfully.');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }
}
