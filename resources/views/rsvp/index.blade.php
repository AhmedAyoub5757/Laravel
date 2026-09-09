<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responses | Event Desk</title>
    <link rel="stylesheet" href="{{ asset('css/rsvp.css') }}">
</head>
<body class="rsvp-page">
    <main class="rsvp-shell">
        <header class="rsvp-nav">
            <a class="rsvp-brand" href="{{ route('rsvp.create') }}"><span>ED</span> Event Desk</a>
            <a class="rsvp-nav-link" href="{{ route('rsvp.create') }}">Submit an RSVP &rarr;</a>
        </header>
        <section class="responses-header">
            <div><p class="rsvp-kicker">Guest list</p><h1>Who's joining us?</h1><p class="responses-subtitle">Every response, in one quiet little place.</p></div>
            <div class="response-count"><strong>{{ $rsvps->where('attending', true)->count() }}</strong><span>attending</span></div>
        </section>
        <section class="response-list">
            @forelse ($rsvps as $rsvp)
                <article class="response-row">
                    <div class="guest-monogram">{{ strtoupper(substr($rsvp->guest_name, 0, 1)) }}</div>
                    <div class="guest-info"><h2>{{ $rsvp->guest_name }}</h2><p>{{ $rsvp->email }}</p></div>
                    <div class="response-status {{ $rsvp->attending ? 'is-attending' : 'is-declined' }}">{{ $rsvp->attending ? 'Attending' : 'Not attending' }}</div>
                    <time datetime="{{ optional($rsvp->created_at)->toIso8601String() }}">{{ optional($rsvp->created_at)->format('M j, Y') }}</time>
                </article>
            @empty
                <div class="response-empty"><span>RSVP</span><h2>No responses yet</h2><p>Be the first to save a seat.</p><a class="rsvp-submit inline-submit" href="{{ route('rsvp.create') }}">Submit an RSVP <span>&rarr;</span></a></div>
            @endforelse
        </section>
    </main>
</body>
</html>
