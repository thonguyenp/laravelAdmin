@extends('layouts.main')

@section('content')
    <h1>Login</h1>
    <form method="POST" action="{{route('postLogin')}}" novalidate>
        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
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
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <button type="submit" class="btn btn-success">Login</button>
    </form>
@endsection