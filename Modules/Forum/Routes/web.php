<?php

use Illuminate\Support\Facades\Route;
use Modules\Forum\Http\Controllers\ForumReplyController;
use Modules\Forum\Http\Controllers\ForumAnswerController;
use Modules\Forum\Http\Controllers\ForumCategoryController;
use Modules\Forum\Http\Controllers\ForumQuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Routes
Route::prefix('forum')->group(function () {
  Route::get('/', [ForumQuestionController::class, 'index'])->name('forum.index');
  Route::get('/course', [ForumQuestionController::class, 'index_course'])->name('forum.index_course');
  Route::get('/details/{slug}', [ForumQuestionController::class, 'details'])->name('forum.details');
  Route::get('/create', [ForumQuestionController::class, 'create'])->name('forum.create');
  Route::get('/create-course/{slug}', [ForumQuestionController::class, 'create_course'])->name('forum.create_course');
  Route::post('/store', [ForumQuestionController::class, 'store'])->middleware('auth')->name('forum.store');
  Route::get('/edit/{id}', [ForumQuestionController::class, 'edit'])->middleware('auth')->name('forum.edit');
  Route::post('/update/{id}', [ForumQuestionController::class, 'update'])->middleware('auth')->name('forum.update');
  Route::get('/destroy/{id}', [ForumQuestionController::class, 'destroy'])->middleware('auth')->name('forum.destroy');

  // Ajax
  Route::get('/get-questions', [ForumQuestionController::class, 'getQuestions'])->name('forum.getQuestions');
  Route::get('/search-query', [ForumQuestionController::class, 'searchQuery'])->name('forum.searchQuery');

  // Answer on Question Details
  Route::prefix('answer')->group(function () {
    Route::post('/store', [ForumAnswerController::class, 'store'])->name('forum.answer.store');
    Route::get('/destroy/{id}', [ForumAnswerController::class, 'destroy'])->middleware('auth')->name('forum.answer.destroy');
  });

  // Comment on Question Details
  Route::prefix('comment')->group(function () {
    Route::get( '/create/{id}', [ForumReplyController::class, 'create'])->middleware('auth')->name('forum.comment.create');
    Route::post('/store/{id}', [ForumReplyController::class, 'store'])->middleware('auth')->name('forum.comment.store');
    Route::get('/destroy/{id}', [ForumReplyController::class, 'destroy'])->middleware('auth')->name('forum.comment.destroy');

    // Ajax
    Route::get('/see-all-reply/{id}', [ForumReplyController::class, 'allReply'])->name('forum.comment.allCommentModal');
  });
});


// Admin Panel Routes
Route::prefix('admin/forum')->middleware(['auth.routes'])->group(function () {
  // Start Forum Routes
  Route::prefix('manage-queries')->group(function () {
    Route::get('/', [ForumQuestionController::class, 'manage'])->name('forum.admin.index')->middleware('PermissionCheck:forum_read');
    Route::get('/delete/{id}', [ForumQuestionController::class, 'destroy'])->name('forum.admin.destroy')->middleware('PermissionCheck:forum_delete');
    Route::get('/swipe-featured/{id}', [ForumQuestionController::class, 'swipeFeatured'])->name('forum.admin.swipeFeatured')->middleware('PermissionCheck:forum_featured_manage');
    Route::get('/swipe-status/{id}', [ForumQuestionController::class, 'swipeActive'])->name('forum.admin.swipeActive')->middleware('PermissionCheck:forum_status_manage');
  });
  // Start Forum Routes

  // Start forum Category Routes
  Route::prefix('category')->group(function () {
    Route::get('/', [ForumCategoryController::class, 'index'])->name('forum.category.index')->middleware('PermissionCheck:forum_category_read');
    Route::get('/create', [ForumCategoryController::class, 'create'])->name('forum.category.create')->middleware('PermissionCheck:forum_category_create');
    Route::post('/store', [ForumCategoryController::class, 'store'])->name('forum.category.store')->middleware('PermissionCheck:forum_category_store');
    Route::get('/edit/{id}', [ForumCategoryController::class, 'edit'])->name('forum.category.edit')->middleware('PermissionCheck:forum_category_update');
    Route::post('/update/{id}', [ForumCategoryController::class, 'update'])->name('forum.category.update')->middleware('PermissionCheck:forum_category_update');
    Route::get('/delete/{id}', [ForumCategoryController::class, 'destroy'])->name('forum.category.destroy')->middleware('PermissionCheck:forum_category_delete');
  });
  // End forum Category Routes


  // select data by ajax
  Route::post('ajax-creator-list', [ForumQuestionController::class, 'creatorFilter'])->name('ajax-forum-creator-list');
  Route::post('ajax-categories-list', [ForumQuestionController::class, 'categoryFilter'])->name('ajax-forum-categories-list');
});
