@extends('layouts.app')

@section('title', 'Edit Recipe')
@section('body-class', 'recipe-page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
@endpush

@section('content')
    <main class="recipe-shell recipe-form-shell">
        <a class="recipe-back-link" href="{{ route('recipes.show', $recipe) }}">← Back to recipe</a>
        <div class="recipe-form-heading">
            <p class="recipe-kicker">Refine your recipe</p>
            <h1>Make it even better.</h1>
            <p>Update the details below and keep your collection current.</p>
        </div>
        <form class="recipe-form" action="{{ route('recipes.update', $recipe) }}" method="POST">
            @csrf
            @method('PUT')
            @include('recipes._form')
        </form>
    </main>
@endsection