@extends('layouts.app')

@section('title', 'New Recipe')

@section('content')
    <h1>Add a Recipe</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf

        <input type="text" name="title" placeholder="Recipe title" value="{{ old('title') }}">
        <input type="text" name="cuisine" placeholder="Cuisine" value="{{ old('cuisine') }}">
        <input type="number" name="cook_time_minutes" placeholder="Cook time (mins)" value="{{ old('cook_time_minutes') }}">
        <textarea name="ingredients" placeholder="Ingredients">{{ old('ingredients') }}</textarea>

        <button type="submit">Save Recipe</button>
    </form>
@endsection