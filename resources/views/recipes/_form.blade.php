@if ($errors->any())
    <div class="recipe-alert" role="alert" aria-labelledby="recipe-error-title">
        <strong id="recipe-error-title">Please fix the following:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="recipe-form-grid">
    <div class="recipe-field recipe-field-wide">
        <label for="title">Recipe name</label>
        <input id="title" type="text" name="title" value="{{ old('title', $recipe->title ?? '') }}" required maxlength="255" autofocus>
    </div>

    <div class="recipe-field">
        <label for="cusine">Cuisine</label>
        <select id="cusine" name="cusine" required>
            <option value="">Choose a cuisine</option>
            @foreach (['Italian', 'Chinese', 'Mexican', 'French', 'Japanese'] as $cuisine)
                <option value="{{ $cuisine }}" @selected(old('cusine', $recipe->cusine ?? '') === $cuisine)>{{ $cuisine }}</option>
            @endforeach
        </select>
    </div>

    <div class="recipe-field">
        <label for="cook_time_minutes">Cook time <span>(minutes)</span></label>
        <input id="cook_time_minutes" type="number" name="cook_time_minutes" value="{{ old('cook_time_minutes', $recipe->cook_time_minutes ?? '') }}" required min="1" max="1440">
    </div>

    <div class="recipe-field recipe-field-wide">
        <label for="ingredients">Ingredients</label>
        <textarea id="ingredients" name="ingredients" rows="9" required placeholder="List each ingredient on a new line">{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>
        <small>Use a new line for each ingredient so the recipe is easy to scan.</small>
    </div>
</div>

<div class="recipe-form-actions">
    <a class="recipe-button recipe-button-quiet" href="{{ isset($recipe) ? route('recipes.show', $recipe) : route('recipes.index') }}">Cancel</a>
    <button class="recipe-button recipe-button-primary" type="submit">{{ isset($recipe) ? 'Save changes' : 'Create recipe' }}</button>
</div>