<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
    public $timestamps = false;

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'recipes_ingredients', 'recipe_id', 'ingredient_id')->withPivot('amount');
    }
}
