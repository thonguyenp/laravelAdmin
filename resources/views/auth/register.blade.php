@extends('layouts.main')

@section('content')
    <h1>Register</h1>
    <form method="POST" action="#" novalidate>
        @csrf
        <div class="mb-3">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Re-Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
            @error('password_confirmation')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <button type="submit" class="btn btn-success">Register</button>
    </form>
@endsection