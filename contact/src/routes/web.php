<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/admin', [ContactController::class, 'admin']);
Route::delete('/admin/delete/{id}', [ContactController::class, 'destroy'])->name('delete');
Route::get('/admin/search', [ContactController::class, 'search'])->name('admin.search');
Route::post('/admin/search', [ContactController::class, 'search']);
