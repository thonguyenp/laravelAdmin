<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');  //admin.dashboard
});