<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Dom\Text;
use Illuminate\Support\Facades\Route;

//Route có thể trả về 1 view, 1 json, hoặc 1 chuỗi đơn thuần
// Đặt tên cho route: ->name('');
Route::get('/trang-chu', function () {
    return view('welcome');
})->name('trang-chu');

// route có tham số bắt buộc
Route::get('/user/{id}', function(int $id){
    return "ID: {$id}";
});

// //route có tham số không bắt buộc
// Route::get('users/{name?}', function(?string $name = 'Tho Nguyen') {
//     return "Name: {$name}";
// });
//Chặn route bằng middleware alias
// Route::get('/user', [UserController::class, 'index'])->middleware('access.time');
Route::get('/user', [UserController::class, 'index']);

//Gom nhóm route
Route::prefix('/san-pham')->group(function(){
    Route::get('/', function(){
        return 'Products';
    });
    //route con phía sau /products
    Route::get('/{id}', function(int $id){
        return 'Products: ' . $id;
    });
});

//Xử lí lỗi 404
Route:: fallback(function() {
    return view('404');
});

Route::get('/home', function(){
    return view('home');
});

// Route::get('/', [HomeController::class, 'index']);

// Route::get('/about', [HomeController::class, 'about']);

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/about', 'about');
});

Route::get('/login', function(){
    return 'login page';
})->name('login');

Route::prefix('users')->controller(UserController::class)
    ->name('users.')->group(function(){
    
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

Route::prefix('posts')->controller(PostController::class)
    ->name('posts.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{id}', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::get('/{id}/destroy', 'destroy')->name('destroy');
});

Route::prefix('categories')->controller(CategoryController::class)
    ->name('categories.')
    ->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/destroyAll','destroyAll')->name('destroyAll');
    Route::get('/{id}', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::get('/{id}/destroy', 'destroy')->name('destroy');
});

Route::get('register', [AuthController::class, 'register'])->name('register');