<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;

// 1. Route Publik (Root Path / Welcome Message)
Route::get('/', [BiodataController::class, 'index'])->name('home');

// 2. Route Management Admin
Route::get('/admin', [BiodataController::class, 'edit'])->name('admin.index');
Route::post('/admin/update', [BiodataController::class, 'update'])->name('admin.update');