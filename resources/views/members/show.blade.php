<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $member->name }} | Members</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <main class="page-shell">
        <a class="back-link" href="{{ route('members.index') }}">&larr; Back to members</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert" role="alert">{{ session('error') }}</div>
        @endif
        <section class="detail-card">
            <div class="detail-heading">
                <div>
                    <p class="eyebrow">Member profile</p>
                    <h1>{{ $member->name }}</h1>
                    <p class="muted">{{ $member->email }}</p>
                </div>
                <span class="status {{ $member->is_active ? 'status-active' : 'status-inactive' }}">
                    {{ $member->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="detail-grid">
                <div><span class="label">Membership</span><strong>{{ $memberType }}</strong></div>
                <div><span class="label">Membership fee</span><strong>${{ number_format($member->membership_fee, 2) }}</strong></div>
                <div><span class="label">Joined</span><strong>{{ optional($member->created_at)->format('M j, Y') }}</strong></div>
            </div>
            <div class="action-row">
                <a class="button button-primary" href="{{ route('members.update', $member->id) }}">Update member</a>
                @if ($member->is_active)
                    <a class="button button-muted" href="{{ route('members.deactivate', $member->id) }}">Deactivate</a>
                @endif
                <a class="button button-danger" href="{{ route('members.delete', $member->id) }}">Delete member</a>
            </div>
        </section>
    </main>
</body>
</html>
