<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement(){
        return view('announcements.createAnnouncement');
    }

    public function announcementShow(Announcement $announcement){
        $reviews = Review::where('announcement_id' == $announcement->id);
        return view('announcements.announcementShow', compact('announcement', 'reviews'));
    }

    public function destroyAnnouncement(Announcement $announcement){
        $announcement->delete();
        return redirect()->back();
    }
}
