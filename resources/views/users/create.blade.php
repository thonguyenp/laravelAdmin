<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 15px;
            }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h3 class="text-center mb-4">Create New User</h3>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('users.store')}}" method="post" novalidate>
                @csrf 
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <!-- Dùng old('name') để lưu lại các giá trị cũ -->
                    <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Enter full name">
                    <!-- Hiển thị lỗi cho từng trường dữ liệu -->
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Email Address</label>
                    <input type="text" class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Confirm Password</label>
                    <!-- Luôn phải là password_confirmation cho phần name của trường confirmed Password -->
                    <input type="password" class="form-control" id="confirmedPassword" name="password_confirmation" placeholder="Retype Password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Create User</button>
            </form>
        </div>
    </div>
</body>
</html>