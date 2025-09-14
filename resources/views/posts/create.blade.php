@extends('layouts.main')

@section('content')
    <h1>Tạo bài viết mới</h1>
    <form method="POST" action="{{route('posts.store')}}" novalidate enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Thumbnail</label> <br>
            {{-- accept="image/*" để chỉ cho phép chọn file ảnh --}}
            <input type="file" name="thumbnail" accept="image/*" id="">
            @error('thumbnail')
                <div class="text-danger">{{$message}}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="4"></textarea>
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
        <a href="{{route('posts.index')}}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection