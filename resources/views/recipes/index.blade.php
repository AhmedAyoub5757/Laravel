@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
    <h1>All Recipes</h1>
    <a href="{{ route('recipes.create') }}">+ Add Recipe</a>

    <ul>
        @foreach ($recipes as $recipe)
            <li>
                <a href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->title }}</a>
                ({{ $recipe->cuisine }}, {{ $recipe->cook_time_minutes }} min)

                <a href="{{ route('recipes.edit', $recipe->id) }}">Edit</a>

                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection