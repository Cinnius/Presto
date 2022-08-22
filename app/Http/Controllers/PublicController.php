<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome(){

        $announcements = Announcement::latest()->take(6)->get();
        
        return view('welcome', compact('announcements'));
    }

    
}
