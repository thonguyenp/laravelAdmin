@extends('layouts.main')

@section('content')
<h1 class="mb-4">Sửa bài viết</h1>

<form method="POST" action="{{route('posts.update', ['id' =>$posts->id])}}">
    @csrf
  <input type="hidden" name="_method" value="PUT">
  
  <div class="mb-3">
    <label class="form-label">Tiêu đề</label>
    <input type="text" name="title" value="{{$posts->title}}" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea name="content" class="form-control" rows="4" required>{{$posts->content}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Cập nhật</button>
  <a href="{{route('posts.index')}}" class="btn btn-secondary">Hủy</a>
</form>
    
@endsection