<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

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
}