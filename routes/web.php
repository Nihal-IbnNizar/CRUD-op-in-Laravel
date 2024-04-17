<?php

use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/addblogs',[BlogsController::class,'add'])->name('add');
Route::post('/addblogs',[BlogsController::class,'addblogs'])->name('addblogs');
Route::get('/viewblogs',[BlogsController::class,'view'])->name('viewblogs');
Route::get('blogs/{id}/delete',[BlogsController::class,'delete'])->name('delete');
Route::get('blogs/{id}/edit',[BlogsController::class,'edit'])->name('edit');
Route::put('blogs/{id}/edit',[BlogsController::class,'editblogs'])->name('editblogs');