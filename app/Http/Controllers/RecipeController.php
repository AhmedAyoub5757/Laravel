<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(){

        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create(){

        return view('recipes.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cusine' => 'required|in:Italian,Chinese,Mexican,French,Japanese',
            'cook_time_minutes' => 'required|integer|min:1',
            'ingredients' => 'required|string',
        ]);

        Recipe::create($validated);

        return redirect('/recipes');
    }

    public function show($id){

    $recipe = Recipe::findorFail($id);

    return view('recipes.show', compact('recipe'));
    }

    public function edit($id){

        $recipe = Recipe::findorFail($id);

        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cusine' => 'required|in:Italian,Chinese,Mexican,French,Japanese',
            'cook_time_minutes' => 'required|integer|min:1',
            'ingredients' => 'required|string',
        ]);

        $recipe = Recipe::findorFail($id);
        $recipe->update($validated);

        return redirect('/recipes');
    }

    public function destroy($id){

        Recipe::destroy($id);

        return redirect('/recipes');
    }


}
