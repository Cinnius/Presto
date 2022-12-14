<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ReviewAnnouncement extends Component
{
    public $review;
    public $vote;
    public $announcement;
    

    protected $rules = [
        'review'=>'required',
        'vote'=>'required|numeric',
    ];

    protected function clear(){
        $this->review = '';
        $this->vote ='';
    }

    public function store(){
         $this->validate();

        if(Auth::user()){
            $this->reviewBody = Announcement::find($this->announcement)->reviews()->create($this->validate());
            Auth::user()->reviews()->save($this->reviewBody);
            $this->clear();
            return redirect()->to('/')->with('message', trans('ui.message_Review_Accepted'));
        } else {
            $this->clear();
            return redirect()->to('/')->with('message', trans('ui.message_Review_Rejected'));
        }
        
       
    }

    public function render()
    {
        $reviews = Review::all();
        return view('livewire.review-announcement', compact('reviews') );
    }
}
