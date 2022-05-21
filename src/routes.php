<?php

use Illuminate\Support\Facades\Route;
use Moh6mmad\LaravelContent\App\Controllers\ContentController;

Route::get('/'.config('content.entity').'/tag/{tag}', [ContentController::class, 'blogIndex']);
Route::get('/'.config('content.entity').'/category/{category}', [ContentController::class, 'blogIndex']);
Route::get('/'.config('content.entity').'/{page_slug}', [ContentController::class, 'blog']);
Route::get('/'.config('content.entity'), [ContentController::class, 'blogIndex']);
