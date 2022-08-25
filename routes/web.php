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









/* rotte ricerca */

Route::controller(PublicController::class)->group(
        function(){
                
                Route::get('/', 'welcome')->name('welcome');
                Route::get('/category/{category}','categoryShow')->name('categoryShow');
                Route::get('/index','index')->name('index');
                Route::get('/user/profile', 'profileView')->name('profileView');
                Route::get('/announcements/research', 'searchAnnouncements')->name('searchAnnouncements');
        }
);

Route::controller(AnnouncementController::class)->group(
        function(){
                Route::get('/announcement/new','createAnnouncement')->middleware('auth')->name('createAnnouncement');
                Route::get('/announcement/detail/{announcement}', 'announcementShow')->name('announcementShow');
        }
);

Route::controller(RevisorController::class)->group(
        function(){
                Route::patch('/announcement/accept/{announcement}', 'acceptAnnouncement')->middleware('isRevisor')->name('acceptAnnouncement');
                Route::patch('/announcement/reject/{announcement}', 'rejectAnnouncement')->middleware('isRevisor')->name('rejectAnnouncement');
                Route::get('/announcement/review', 'rewiewAnnouncement')->middleware('isRevisor')->name('rewiewAnnouncements');
                Route::get('/revisor/home', 'indexRevisor')->middleware('isRevisor')->name('indexRevisor');
                // Route work like revisor
                Route::get('/request/becomerevisor', 'becomeRevisor')->middleware('auth')->name('becomeRevisor');
                Route::get('/request/makerevisor/{user}','makeRevisor')->middleware('auth')->name('makeRevisor');
        }
);
