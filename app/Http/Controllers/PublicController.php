<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Category;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function welcome()
    {

        $announcements = Announcement::where('is_accepted', true)->latest()->take(6)->get();
        $comments = Comment::latest()->take(8)->get();


        $announcementsCounter = Announcement::Where('is_accepted', true)->count();
        $userCounter = User::all()->count();
        $categoryCounter = Category::all()->count();
        
        return view('welcome', compact('announcements', 'comments', 'announcementsCounter', 'userCounter', 'categoryCounter'));
    }

    public function categoryShow(Category $category)
    {
        $announcements = Announcement::where('category_id', $category->id)->where('is_accepted', true)->get();

        return view('categoryShow', compact('announcements', 'category'));
    }

    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->latest()->paginate(12);
        return view('index', compact('announcements'));
    }

    public function profileView()
    {
        $announcements = Auth::user()->announcements()->where('is_accepted', true)->latest()->get();
        return view('profileView', compact('announcements'));
    }


    public function searchAnnouncements(Request $request)
    {

        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(6);
        return view('index', compact('announcements'));
    }

    public function setLanguageLocale($lang)
    {

        session()->put('locale', $lang);
        return redirect()->back();
    }
}
