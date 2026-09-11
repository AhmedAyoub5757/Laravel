@extends('layouts.app')

@section('title', 'New Recipe')
@section('body-class', 'recipe-page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
@endpush

@section('content')
    <main class="recipe-shell recipe-form-shell">
        <a class="recipe-back-link" href="{{ route('recipes.index') }}">← Back to recipes</a>
        <div class="recipe-form-heading">
            <p class="recipe-kicker">Add to the collection</p>
            <h1>Make it memorable.</h1>
            <p>Capture the details now, so cooking it later feels effortless.</p>
        </div>
        <form class="recipe-form" action="{{ route('recipes.store') }}" method="POST">
            @csrf
            @include('recipes._form')
        </form>
    </main>
@endsection