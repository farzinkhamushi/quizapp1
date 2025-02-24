<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {

    //Route::resource('users', ManageUserController::class);

    Route::get('/users', [ManageUserController::class, 'index'])->name('usersIndex');

    Route::get('/adminhome', [AdminController::class, 'adminhome'])->name('adminhome');

    Route::get('/createSection', [SectionsController::class, 'createSection'])
        ->name('createSection');

    Route::post('/deleteSection/{id}', [SectionsController::class, 'deleteSection'])
        ->name('deleteSection');

    Route::post('/storeSection/section', [SectionsController::class, 'storeSection'])
        ->name('storeSection');

    Route::get('/editSection/{section}', [SectionsController::class, 'editSection'])
        ->name('editSection');

    Route::post('/updateSection/{section}', [SectionsController::class, 'updateSection'])
        ->name('updateSection');

    Route::get('/listSection', [SectionsController::class, 'listSection'])
        ->name('listSection');

    Route::get('/detailSection/{section}', [SectionsController::class, 'detailSection'])
        ->name('detailSection');

    Route::get('/createQuestion/{section}', [QuestionsController::class, 'createQuestion'])
        ->name('createQuestion');

    Route::get('/detailQuestion/{question}', [QuestionsController::class, 'detailQuestion'])
        ->name('detailQuestion');

    Route::post('/storeQuestion/{section}', [QuestionsController::class, 'storeQuestion'])
        ->name('storeQuestion');
    Route::post('/deleteQuestion/{id}', [QuestionsController::class, 'deleteQuestion'])
        ->name('deleteQuestion');
});

Route::middleware(['auth', 'verified', 'role:admin|user'])->prefix('appuser')->group(function () {

    Route::get('/userQuizHome', [AppUserController::class, 'userQuizHome'])
        ->name('userQuizHome');

    Route::get('/userQuizDetails/{id}', [AppUserController::class, 'userQuizDetails'])
        ->name('userQuizDetails');

    Route::post('/deleteUserQuiz/{id}', [AppUserController::class, 'deleteUserQuiz'])
        ->name('deleteUserQuiz');

    Route::get('/startQuiz', [AppUserController::class, 'startQuiz'])
        ->name('startQuiz');
});
