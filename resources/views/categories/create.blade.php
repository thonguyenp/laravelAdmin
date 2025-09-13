@extends('layouts.main')

@section('content')
    <h1>Tạo bài viết mới</h1>
    <form method="POST" action="{{route('categories.store')}}" novalidate>
        @csrf
        <div class="mb-3">
            <label>Tên</label>
            <input type="text" name="name" class="form-control" required>
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
            @error('content')
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
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{route('categories.index')}}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection