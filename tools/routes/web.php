<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShapeController;
use App\Http\Controllers\Users;
use App\Http\Controllers\AuthController; // Adjust according to your folder structure

Route::post('login', [AuthController::class, 'login'])->name('login');


// Root route (optional: you can change this to redirect to any default page)
Route::get('/', function () {
    return view('welcome');
});

// Route to show the create form (GET)
Route::get('/create', [ShapeController::class, 'create'])->name('create');

// Route to handle form submission (POST) for creating new shape
Route::post('/store', [ShapeController::class, 'store'])->name('store');

// Route to list all shapes for the user page (GET)
Route::get('/user', [ShapeController::class, 'index'])->name('user.page');

// Admin page route (GET)
Route::get('/admin', [ShapeController::class, 'admin'])->name('admin');

// Login page route (GET)
Route::get('/login', [ShapeController::class, 'login'])->name('login');

// Route for listing users (assuming a Users controller exists)
Route::get('/list', [Users::class, 'list'])->name('user.list');

Route::get('/edit/{id}', [ShapeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ShapeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [ShapeController::class, 'destroy'])->name('delete');



