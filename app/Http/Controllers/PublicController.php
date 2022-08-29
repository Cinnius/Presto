<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function welcome(){

        $announcements = Announcement::where('is_accepted', true)->latest()->take(6)->get();
        // $categories = Category::all();
        
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category){
        $announcements = Announcement::where('category_id', $category->id)->where('is_accepted', true)->get();

        return view('categoryShow', compact('announcements' ,'category'));
    }

    public function index(){
        $announcements = Announcement::where('is_accepted', true)->latest()->paginate(10);
        return view('index',compact('announcements'));
    }
    
    public function profileView(){
        $announcements = Auth::user()->announcements()->where('is_accepted', true)->latest()->get();
        return view('profileView', compact('announcements'));
    }


    public function searchAnnouncements(Request $request){
        
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);
        return view( 'index', compact('announcements'));
    }

    public function setLanguageLocale($lang){

        session()->put('locale', $lang);
        return redirect()->back();
    }

}
