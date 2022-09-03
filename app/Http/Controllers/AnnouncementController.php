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
        $reviews = Review::latest()->get();
        $avg = 0;
        $count =0;
        $sum = 0;
        return view('announcements.announcementShow', compact('announcement', 'reviews', 'avg','count', 'sum'));
    }

    public function destroyAnnouncement(Announcement $announcement){
        $announcement->delete();
        return redirect()->back();
    }
}
