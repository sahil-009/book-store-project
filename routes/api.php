<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;

// Author routes
Route::apiResource('authors', AuthorController::class);

// Book routes
Route::apiResource('books', BookController::class);
