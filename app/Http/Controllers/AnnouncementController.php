<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement(){
        return view('announcements.create');
    }

    public function announcementShow(Announcement $announcement){
        return view('announcements.announcementShow', compact('announcement'));
    }
}
