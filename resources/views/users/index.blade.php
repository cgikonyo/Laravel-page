<!-- resources/views/users/index.blade.php -->

<h1>All Registered Users</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f4f4f4;">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Joined Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at ? $user->created_at->diffForHumans() : 'No date' }}</td>

            </tr>
        @empty
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>
<a href="{{ route('users.create') }}">Add New User</a>