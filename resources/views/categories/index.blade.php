@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Danh sách danh mục</h1>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Thêm danh mục</a>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Xóa tất cả</a>

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên</th>
      <th>Ngày tạo</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <!-- Dữ liệu động -->
    @forelse ($categories as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->created_at}}</td>
            <td>
                <a href="{{route('categories.edit',  ['id' => $c->id])}}" class="btn btn-warning">Sửa</a>
                <a href="{{route('categories.destroy', ['id' => $c->id])}}" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    @empty 
        <tr>
            <td colspan="4" class="text-center">
                Danh sách danh mục hiện đang trống
            </td>
        </tr>
    @endforelse
  </tbody>
</table>

@endsection