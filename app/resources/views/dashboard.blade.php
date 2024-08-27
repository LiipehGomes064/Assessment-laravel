@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('dashboard.css')}}">

<main class="container my-5">
    <h2 class="mb-4">User List</h2>
    
    <!-- Tabela Responsiva -->
    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th> 
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Professional Summary</th>
                    @if (Auth::check() && Auth::user()->usertype == 1)
                        <th>Info</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->professional_summary }}</td>
        
                        @if (Auth::check() && Auth::user()->usertype == 1)
                            <td>
                                <a href="{{ route('userinfo', $user->id) }}" class="btn btn-info btn-sm">Info</a>
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
<div class="line"></div>

<!-- Link to Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
