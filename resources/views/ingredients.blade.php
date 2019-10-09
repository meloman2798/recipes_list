@extends('layouts.app')

@section('content')

        <h3>Add Ingredient</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/ingredient">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" placeholder="Enter ingredient name" name="name" value="{{old('name')}}">
            </div>
            <select name="recipe" class="form-control">
                @foreach($recipes as $recipe)
                    <option value="{{$recipe->id}}">{{$recipe->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input value="{{old('amount')}}" class="form-control" id="amount" placeholder="Enter ingredient amount" name="amount" type="number" min="1"></input>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection