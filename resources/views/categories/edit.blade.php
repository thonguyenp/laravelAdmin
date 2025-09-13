@extends('layouts.main')

@section('content')
<h1 class="mb-4">Cập nhật danh mục</h1>

<form method="POST" action="{{route('categories.update', ['id' =>$category->id])}}">
    @csrf
  <input type="hidden" name="_method" value="PUT">
  
  <div class="mb-3">
    <label class="form-label">Tên</label>
    <input type="text" name="name" value="{{$category->name}}" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Mô tả</label>
    <textarea name="description" class="form-control" rows="4" required>{{$category->description}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Cập nhật</button>
  <a href="{{route('categories.index')}}" class="btn btn-secondary">Hủy</a>
</form>
    
@endsection