<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function add()
    {
        $recipes = Recipe::all();
        $data = [];
        $data['recipes'] = $recipes;
        return view('ingredients', $data);
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $recipeId = $request->input('recipe');
        $amount = $request->input('amount', 1);
        $validatedData = $request->validate([
            'name' => 'required',
            'recipe' => 'required',
            'amount' => 'required',
        ]);
        if (!is_array($validatedData))
        {
            if ($validatedData->fails()) {
                return redirect('ingredient/create')
                    ->withErrors($validatedData)
                    ->withInput();
            }
        }
        $ingredient = Ingredient::query()->where('name', $name)->first();


        if (!$ingredient) {
            $ingredient = Ingredient::create([
                'name' => $name
            ]);
        }


        $recipe = Recipe::find($recipeId);


        $recipe->ingredients()->attach($ingredient->id, ['amount' => $amount]);



        return redirect()->route('home');
    }

    public function error($validator)
    {

        $errors = $validator->errors();

        echo $errors->first('ERROR');
    }

}
