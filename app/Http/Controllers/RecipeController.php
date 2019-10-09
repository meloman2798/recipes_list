<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function add()
    {
        return view('add_recipe');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');

        $validatedData = $request->validate([
            'name' => 'required',
            'description' =>'required'
        ]);
        if (!is_array($validatedData))
        {
            if ($validatedData->fails()) {
                return redirect('recipe/create')
                    ->withErrors($validatedData)
                    ->withInput();
            }
        }

        $recipe = new Recipe();
        $recipe->name = $name;
        $recipe->description=$description;
        $recipe->save();
        return redirect()->route('home');


    }

}
