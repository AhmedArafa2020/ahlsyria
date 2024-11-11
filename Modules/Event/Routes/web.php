<?php



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

use Illuminate\Support\Facades\Route;
use Modules\Event\Http\Controllers\MentoringController;
use Modules\Event\Http\Controllers\EventController;

Route::prefix('admin')->middleware(['auth.routes'])->group(function () {

    // Start events  Routes
    Route::controller(EventController::class)->prefix('events')->group(function () {
        Route::get('/',                 'index')->name('events.index')->middleware('PermissionCheck:event_read');
        Route::get('/create',           'create')->name('events.create')->middleware('PermissionCheck:event_create');
        Route::post('/store',           'store')->name('events.store')->middleware('PermissionCheck:event_store');
        Route::get('/edit/{id}',        'edit')->name('events.edit')->middleware('PermissionCheck:event_update');
        Route::put('/update/{id}',      'update')->name('events.update')->middleware('PermissionCheck:event_update');
        Route::get('/delete/{id}',      'destroy')->name('events.destroy')->middleware('PermissionCheck:event_delete');
    });
    // End events Routes

    Route::controller(MentoringController::class)->prefix('mentorings')->group(function () {
        Route::get('/',                 'index')->name('mentorings.index')->middleware('PermissionCheck:mentoring_read');
        Route::get('/show/{id}',      'show')->name('mentorings.show')->middleware('PermissionCheck:mentoring_show');
    });
});
