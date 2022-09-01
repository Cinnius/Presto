<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateComment extends Component
{
    public $comment;

    protected $rules = [
        'comment'=>'required|min:15',
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
    ];
    
    public function store(){
        
        $this->validate();
        
        if (Auth::user()) {
            $this->comment = Auth::user()->comments()->create($this->validate());
            return redirect()->to('/')->with('message','Il tuo commento è stato inserito correttamente');
        } else {
            return redirect()->to('/')->with('message','Devi registrati per lasciare un commento');
        }
        
        $this->clear();
    }

    protected function clear(){
        $this->comment="";
    }

    public function render()
    {
        $comments=Comment::all();
        return view('livewire.create-comment', compact('comments'));
    }
}
