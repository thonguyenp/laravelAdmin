@extends('layouts.main')

@section('content')
    <h1>Tạo bài viết mới</h1>

    <form method="POST" action="/posts">
        <div class="mb-3">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="list.html" class="btn btn-secondary">Hủy</a>
    </form>
@endsection