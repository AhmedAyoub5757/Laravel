@extends('layouts.app')

@section('title', 'Recipes')
@section('body-class', 'recipe-page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
@endpush

@section('content')
    <main class="recipe-shell">
        <header class="recipe-hero">
            <div>
                <p class="recipe-kicker">The recipe book</p>
                <h1>Good food starts<br><em>with a plan.</em></h1>
                <p class="recipe-lede">Keep your favorite dishes close, clear, and ready for the next hungry moment.</p>
            </div>
            <a class="recipe-button recipe-button-primary" href="{{ route('recipes.create') }}">＋ New recipe</a>
        </header>

        @if (session('success'))
            <div class="recipe-alert recipe-alert-success" role="status">{{ session('success') }}</div>
        @endif

        <section aria-labelledby="recipe-list-title">
            <div class="recipe-section-heading">
                <div>
                    <p class="recipe-kicker">Your collection</p>
                        <h2 id="recipe-list-title">{{ $recipes->count() }} recipe{{ $recipes->count() === 1 ? '' : 's' }}</h2>
                </div>
            </div>

            @if ($recipes->isEmpty())
                <div class="recipe-empty">
                    <span class="recipe-empty-mark" aria-hidden="true">✦</span>
                    <h2>Your book is waiting.</h2>
                    <p>Add your first recipe and make this page yours.</p>
                    <a class="recipe-button recipe-button-primary" href="{{ route('recipes.create') }}">Add the first recipe</a>
                </div>
            @else
                <div class="recipe-grid">
                    @foreach ($recipes as $recipe)
                        <article class="recipe-card">
                            <div class="recipe-card-top">
                                <span class="recipe-tag">{{ $recipe->cusine }}</span>
                                <span class="recipe-time">{{ $recipe->cook_time_minutes }} min</span>
                            </div>
                            <h3><a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->title }}</a></h3>
                            <p>{{ \Illuminate\Support\Str::limit($recipe->ingredients, 110) }}</p>
                            <div class="recipe-card-actions">
                                <a class="recipe-text-link" href="{{ route('recipes.show', $recipe) }}">View recipe <span aria-hidden="true">→</span></a>
                                <a class="recipe-icon-link" href="{{ route('recipes.edit', $recipe) }}" aria-label="Edit {{ $recipe->title }}">Edit</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </main>
@endsection