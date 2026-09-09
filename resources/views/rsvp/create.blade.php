<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP | Event Desk</title>
    <link rel="stylesheet" href="{{ asset('css/rsvp.css') }}">
</head>
<body class="rsvp-page">
    <main class="rsvp-shell">
        <header class="rsvp-nav">
            <a class="rsvp-brand" href="{{ route('rsvp.create') }}"><span>ED</span> Event Desk</a>
            <a class="rsvp-nav-link" href="{{ route('rsvp.index') }}">View responses &rarr;</a>
        </header>

        <section class="rsvp-hero">
            <div class="rsvp-copy">
                <p class="rsvp-kicker">Annual gathering &middot; 2026</p>
                <h1>Save your seat<br><em>for the evening.</em></h1>
                <p>Tell us who is joining us. We will keep your response on the guest list.</p>
            </div>
            <div class="rsvp-form-card">
                @if (session('success'))
                    <div class="rsvp-alert rsvp-alert-success" role="alert">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="rsvp-alert rsvp-alert-error" role="alert">Please check the highlighted fields.</div>
                @endif
                <form action="{{ route('rsvp.store') }}" method="POST">
                    @csrf
                    <div class="rsvp-field">
                        <label for="guest_name">Your name</label>
                        <input id="guest_name" type="text" name="guest_name" value="{{ old('guest_name') }}" placeholder="Alex Morgan" required>
                        @error('guest_name')<small>{{ $message }}</small>@enderror
                    </div>
                    <div class="rsvp-field">
                        <label for="email">Email address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="alex@example.com" required>
                        @error('email')<small>{{ $message }}</small>@enderror
                    </div>
                    <fieldset class="rsvp-field">
                        <legend>Will you attend?</legend>
                        <div class="rsvp-options">
                            <label class="rsvp-option"><input type="radio" name="attending" value="1" {{ old('attending', '1') === '1' ? 'checked' : '' }} required><span>Yes, I am in</span></label>
                            <label class="rsvp-option"><input type="radio" name="attending" value="0" {{ old('attending') === '0' ? 'checked' : '' }}><span>Sorry, I cannot</span></label>
                        </div>
                        @error('attending')<small>{{ $message }}</small>@enderror
                    </fieldset>
                    <button class="rsvp-submit" type="submit">Send my RSVP <span>&rarr;</span></button>
                </form>
            </div>
        </section>
        <footer class="rsvp-footer"><span>EVENT DESK</span><span>We look forward to seeing you.</span></footer>
    </main>
</body>
</html>