<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome(){

        $announcements = Announcement::latest()->take(6)->get();
        // $categories = Category::all();
        
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category){
        return view('categoryShow', compact('category'));
    }

    public function index(){
        $announcements = Announcement::paginate(8);
        return view('index',compact('announcements'));
    }
    
    public function profileView(){
        return view('profileView');
    }
}
