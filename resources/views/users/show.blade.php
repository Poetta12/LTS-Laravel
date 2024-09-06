<!-- resources/views/users/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>User Details</h1>

    <table>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <!-- Add other fields as necessary -->
    </table>

    <a href="{{ route('users.index') }}">Back to List</a>
@endsection
