@extends('layouts.app')

@section('title', 'Edit Recipe')

@section('content')
    <h1>Edit Recipe</h1>

    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $recipe->title) }}">
        <input type="text" name="cuisine" value="{{ old('cuisine', $recipe->cuisine) }}">
        <input type="number" name="cook_time_minutes" value="{{ old('cook_time_minutes', $recipe->cook_time_minutes) }}">
        <textarea name="ingredients">{{ old('ingredients', $recipe->ingredients) }}</textarea>

        <button type="submit">Update Recipe</button>
    </form>
@endsection