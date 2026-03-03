<form action="{{ route('users.store') }}" method="POST">"
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Create User</button>
    <a href="{{ route('users.index') }}">View All Users</a>
</form>
<hr>
<h3>Users List</h3>
<table border="1" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif