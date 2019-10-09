<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all() ;
        $data = [];
        $data['recipes'] = $recipes;


        return view('recipe', $data);
    }
}
