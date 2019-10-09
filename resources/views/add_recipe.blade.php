@extends('layouts.app')

@section('content')
    <h3>Add Recipe</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/recipe">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" placeholder="Enter recipe name" name="name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" placeholder="Enter recipe description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection