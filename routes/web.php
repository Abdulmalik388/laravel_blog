<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\CommentAdminController;
use Illuminate\Support\Facades\Route;

// Home / welcome page
Route::get('/', [PagesController::class, 'index'])->name('pages.welcome');

// Static pages
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');

// Blog listing and single post
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index'); // list all posts
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show'); // show single post

// Admin routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/posts/create', [AdminController::class, 'createPost']);
Route::post('/admin/posts', [AdminController::class, 'storePost']);
// Admin view all posts
Route::get('/admin/posts', [AdminController::class, 'allPosts'])->name('admin.posts');

// Admin edit and update post
Route::get('/admin/posts/{id}/edit', [AdminController::class, 'editPost'])->name('admin.posts.edit');
Route::put('/admin/posts/{id}', [AdminController::class, 'updatePost'])->name('admin.posts.update');

// Admin delete post
Route::delete('/admin/posts/{id}', [AdminController::class, 'deletePost'])->name('admin.posts.delete');


Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::prefix('admin')->group(function () {
    Route::get('/comments', [CommentAdminController::class, 'index'])->name('admin.comments');
    Route::get('/comments/{comment}/edit', [CommentAdminController::class, 'edit'])->name('admin.comments.edit');
    Route::put('/comments/{comment}', [CommentAdminController::class, 'update'])->name('admin.comments.update');
    Route::delete('/comments/{comment}', [CommentAdminController::class, 'destroy'])->name('admin.comments.delete');
});

