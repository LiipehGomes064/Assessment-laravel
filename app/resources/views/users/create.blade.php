@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<div class="container my-5">
    <h2 class="mb-4">Create New User</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" min="1" max="120" required>
                    @error('age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" pattern="[0-9]{10,15}">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="professional_summary" class="form-label">Professional Summary</label>
                <textarea class="form-control" id="professional_summary" name="professional_summary" rows="4">{{ old('professional_summary') }}</textarea>
                @error('professional_summary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>

<!-- Link para o JavaScript do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
