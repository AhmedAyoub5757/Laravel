@extends('layouts.app')

@section('title', $recipe->title)

@section('content')
    <h1>{{ $recipe->title }}</h1>
    <p><strong>Cuisine:</strong> {{ $recipe->cuisine }}</p>
    <p><strong>Cook Time:</strong> {{ $recipe->cook_time_minutes }} minutes</p>
    <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>

    <a href="{{ route('recipes.index') }}">← Back to all recipes</a>
@endsection