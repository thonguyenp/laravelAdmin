@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Danh sách bài viết</h1>

<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ Thêm bài viết</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tiêu đề</th>
      <th>Ngày tạo</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <!-- Dữ liệu động -->
    @forelse ($posts as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->title}}</td>
            <td>{{$p->created_at}}</td>
            <td>
                <a href="edit.html?id=1" class="btn btn-warning">Sửa</a>
                <a href="delete.html?id=1" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    @empty 
        <tr>
            <td colspan="4" class="text-center">
                Danh sách bài viết hiện đang trống
            </td>
        </tr>
    @endforelse
  </tbody>
</table>

@endsection