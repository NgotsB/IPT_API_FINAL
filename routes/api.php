<?php


use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;


// Public Routes

// Authentication Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



// Categories Routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);


//Verification Route
// web.php

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->name('verification.verify');



// Protected Routes
Route::middleware('auth:sanctum')->group(function () {

    // Users Routes
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/{id}', 'show');
        Route::post('/users', 'store');
        Route::put('/users/{id}', 'update');
        Route::delete('/users/{id}', 'delete');
    });




    // Categories Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::post('/categories', 'store');
        Route::put('/categories/{id}', 'update');
        Route::delete('/categories/{id}', 'delete');
    });

    // Notes Routes
    Route::controller(NoteController::class)->group(function () {
        Route::get('/notes', 'index');
        Route::get('/notes/{id}', 'show');
        Route::post('/notes', 'store');
        Route::put('/notes/{id}', 'update');
        Route::delete('/notes/{id}', 'delete');
    });


    // Questions Routes
    Route::controller(QuestionController::class)->group(function () {
        Route::get('/questions', 'index');
        Route::get('/questions/{id}', 'show');
        Route::post('/questions', 'store');
        Route::put('/questions/{id}', 'update');
        Route::delete('/questions/{id}', 'delete');
    });


    // Answers Routes
    Route::controller(AnswerController::class)->group(function () {
        Route::get('/answers', 'index');
        Route::get('/answers/{id}', 'show');
        Route::post('/answers', 'store');
        Route::post('/answers/{id}', 'update');
        Route::delete('/answers/{id}', 'delete');
        Route::patch('/answers/{id}/correct-answer', 'setCorrectAnswer');

    });

    // Score Controllers Routes
    Route::controller(ScoreController::class)->group(function () {
        Route::get('/categories/{categoryId}/scores', 'index');
        Route::get('/categories/{categoryId}/scores/{id}', 'show');
        Route::post('/categories/{categoryId}/scores', 'store');
    });


    //Logout User
    Route::post('/logout', [AuthController::class, 'logout']);
});
