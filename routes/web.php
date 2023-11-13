<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\VoteController;
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
    return view('auth.login');
});
Route::get('registration', [LoginController::class, 'registration'])->name('registration');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('signup', [LoginController::class, 'signUp'])->name('signup');
Route::post('login-user', [LoginController::class, 'userLogin'])->name('user.login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Define routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('admin_dashboard', [LoginController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('feedback', [FeedbackController::class, 'feedback'])->name('feedback');
    Route::post('submit_feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::post('feedback/{feedback}/vote', [VoteController::class, 'vote'])->name('feedback.vote');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/feedback/{feedback}/comments', [CommentController::class, 'viewComments'])->name('feedback.comments');
    Route::get('user_data', [AdminController::class, 'usersData'])->name('user.data');
    Route::get('delete/{id}', [AdminController::class, 'destroy'])->name('user.delete');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
    Route::post('update_user', [AdminController::class, 'update'])->name('user.update');
    Route::get('feedback_list', [AdminController::class, 'feedbackList'])->name('feedback.list');
    Route::post('/update_feedback_status', [AdminController::class, 'updateStatus'])->name('feedback.updateStatus');
});
