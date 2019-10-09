@extends('layouts.app')
@push('head-styles')
    <link rel="stylesheet" href="{{asset('css/recipe.css') }}">
@endpush
@section('content')
    <div>
        <h2>Recipes</h2>
        @foreach($recipes as $recipe)
            <div>
                <h4 class="recipe-name">{{$recipe->name}}</h4>
                <div class="red">Description: {{$recipe->description}}</div>
                <div>
                    <ul>
                    @foreach($recipe->ingredients as $item)
                        <li class="ingredient-item"><b>{{$item->name}}</b>, {{$item->pivot->amount}} g.</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection