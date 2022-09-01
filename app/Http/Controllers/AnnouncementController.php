<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement(){
        return view('announcements.createAnnouncement');
    }

    public function announcementShow(Announcement $announcement){
        return view('announcements.announcementShow', compact('announcement'));
    }

    public function destroyAnnouncement(Announcement $announcement){
        $announcement->delete();
        return redirect()->back();
    }

    public function modifyAnnouncement(Announcement $announcement){

        return view('announcements.editAnnouncement', compact('announcement'));
    }
    
}
