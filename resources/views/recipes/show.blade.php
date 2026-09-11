@extends('layouts.app')

@section('title', $recipe->title)
@section('body-class', 'recipe-page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
@endpush

@section('content')
    <main class="recipe-shell recipe-detail-shell">
        <a class="recipe-back-link" href="{{ route('recipes.index') }}">← Back to recipes</a>
        @if (session('success'))
            <div class="recipe-alert recipe-alert-success" role="status">{{ session('success') }}</div>
        @endif
        <article class="recipe-detail">
            <div class="recipe-detail-intro">
                <span class="recipe-tag">{{ $recipe->cusine }}</span>
                <h1>{{ $recipe->title }}</h1>
                <p class="recipe-detail-summary">A reliable favorite for the table, with everything you need in one place.</p>
            </div>
            <div class="recipe-meta" aria-label="Recipe details">
                <div><span>Cook time</span><strong>{{ $recipe->cook_time_minutes }} minutes</strong></div>
                <div><span>Cuisine</span><strong>{{ $recipe->cusine }}</strong></div>
            </div>
            <div class="recipe-ingredients">
                <h2>Ingredients</h2>
                <p>{!! nl2br(e($recipe->ingredients)) !!}</p>
            </div>
            <div class="recipe-detail-actions">
                <a class="recipe-button recipe-button-primary" href="{{ route('recipes.edit', $recipe) }}">Edit recipe</a>
                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Delete this recipe?');">
                    @csrf
                    @method('DELETE')
                    <button class="recipe-button recipe-button-danger" type="submit">Delete</button>
                </form>
            </div>
        </article>
    </main>
@endsection