<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use phpDocumentor\Reflection\Types\Boolean;

class RevisorController extends Controller
{
    public function indexRevisor() {
        $announcement=Announcement::where('is_accepted', null)->first();
        return view('revisor.indexRevisor', compact('announcement'));
    }

    public function acceptAnnouncement(Announcement $announcement) {
        $announcement->setAccepted(true);
        

        return redirect()->back()->with('message', 'Annuncio accettato');
    }
    
    public function rejectAnnouncement(Announcement $announcement) {
        $announcement->setAccepted(false);
        
        return redirect()->back()->with('message', 'Annuncio rifiutato');
    }
    
    /* public function lastAcceptedAnnouncement(Announcement $announcement) {
        $announcement=Announcement::where('is_accepted' != null)->latest()->take(6)->get();
        dd($announcement);

        return redirect( compact('lastAnnouncement') )->back()->with('message', 'Annuncio non accettato correttamente!');
    } */

    public function rewiewAnnouncement(){
        $announcements =Announcement::where('is_accepted', '!=', null)->latest('updated_at')->take(8)->get();
        return view('revisor.rewiewAnnouncements', compact('announcements'));
    }

    // function work like revisor->da sistemare per dire "sei sicuro?"
    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message',"Hai richiesto di diventare revisore");
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:MakeUserRevisor',["email"=>$user->email]);
        return redirect()->back()->with('message',"L'utente $user->name è diventato revisore");
    }

}