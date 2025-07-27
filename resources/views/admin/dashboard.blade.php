@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2 class="mb-4"> Admin Panel – Users List</h2>
 

    <table class="table table-bordered table-striped">
        <thead style="background: #f8f9fa;">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
       <tbody>
    @forelse ($users as $user)
        @if ($user->role !== 'admin')
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <a href="{{ route('admin.edit', $user) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('admin.destroy', $user) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endif
    @empty
        <tr><td colspan="6">No users found.</td></tr>
    @endforelse
</tbody>

    </table>
</div>
@endsection
