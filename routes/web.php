<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestBookController;

Route::get('/', [GuestBookController::class, 'index']);
Route::get('/guestbook', [GuestBookController::class, 'guestbook']);
Route::post('/guestbook', [GuestBookController::class, 'addComment']);
Route::post('/guestbook', [GuestBookController::class, 'store'])->name('guestbook.store');
Route::get('/', [GuestBookController::class, 'index'])->name('guestbook.index');
Route::get('/guestbook/create', 'GuestBookController@create')->name('guestbook.create');
Route::post('/guestbook/reset', [GuestBookController::class, 'reset'])->name('guestbook.reset');

