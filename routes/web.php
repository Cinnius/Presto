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

Route::patch('/announcement/accept/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('acceptAnnouncement');

Route::patch('/announcement/reject/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('rejectAnnouncement');



Route::get('/revisor/home', [RevisorController::class, 'indexRevisor'])->name('indexRevisor');