<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

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

Route::get('/',[PublicController::class,'welcome'])->name('welcome');



Route::get('/category/{category}',[PublicController::class,'categoryShow'])->name('categoryShow');

Route::get('/index',[PublicController::class,'index'])->name('index');

Route::get('/user/profile', [PublicController::class, 'profileView'])->name('profileView');



Route::get('/announcement/new',[AnnouncementController::class,'createAnnouncement'])->middleware('auth')->name('createAnnouncement');

Route::get('/announcement/detail/{announcement}',[AnnouncementController::class,'announcementShow'])->name('announcementShow');

/* route revisione */
Route::patch('/announcement/accept/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('acceptAnnouncement');
Route::patch('/announcement/reject/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('rejectAnnouncement');
Route::get('/announcement/review', [RevisorController::class, 'rewiewAnnouncement'])->middleware('isRevisor')->name('rewiewAnnouncements');
Route::get('/revisor/home', [RevisorController::class, 'indexRevisor'])->middleware('isRevisor')->name('indexRevisor');

// Route work like revisor
Route::get('/request/becomerevisor',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('becomeRevisor');
Route::get('/request/makerevisor/{user}',[RevisorController::class,'makeRevisor'])->middleware('auth')->name('makeRevisor');

/* rotte ricerca */
Route::get('/announcements/research', [PublicController::class, 'searchAnnouncements'])->name('searchAnnouncements');

