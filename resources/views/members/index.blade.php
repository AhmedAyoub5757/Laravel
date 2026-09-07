<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Members</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
	<body>
	<main class="page-shell">
		<div class="page-intro">
			<div>
				<p class="eyebrow">Directory</p>
				<h1>Members</h1>
				<p class="muted">Current members in your organization.</p>
			</div>
			<a class="button button-primary" href="{{ route('members.store') }}">+ Create member</a>
		</div>

		@if (session('success'))
			<div class="alert alert-success" role="alert">{{ session('success') }}</div>
		@endif
		@if (session('error'))
			<div class="mb-6 alert alert-error" role="alert">{{ session('error') }}</div>
		@endif

		<div class="table-card">
			<div class="table-wrap">
				<table>
					<thead>
						<tr>
							<th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Name</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Email</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Membership</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Fee</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
							<th scope="col" class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">View</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-100 bg-white">
						@forelse ($members as $member)
							<tr class="transition hover:bg-gray-50">
								<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ $member->name }}</td>
								<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">{{ $member->email }}</td>
								<td class="whitespace-nowrap px-6 py-4 text-sm"><a class="member-link" href="{{ route('members.show', $member->id) }}">{{ $member->membership_type ?? '—' }}</a></td>
								<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">${{ number_format($member->membership_fee, 2) }}</td>
								<td class="whitespace-nowrap px-6 py-4 text-sm">
									<span class="status {{ $member->is_active ? 'status-active' : 'status-inactive' }}">{{ $member->is_active ? 'Active' : 'Inactive' }}</span>
								</td>
								<td class="row-action"><a class="member-link" href="{{ route('members.show', $member->id) }}">Open profile &rarr;</a></td>
							</tr>
						@empty
							<tr>
								<td colspan="6" class="empty-state">No members found yet. Create your first member to get started.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>

			@if (method_exists($members, 'links'))
				<div class="border-t border-gray-200 px-6 py-4">{{ $members->links() }}</div>
			@endif
		</div>
	</main>
</body>
</html>
