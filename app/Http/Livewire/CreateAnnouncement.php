<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules=[
        'title'=>'required|max:25',
        'body'=>'required|min:15',
        'price'=>'required|numeric'
    ];

    protected $messages=[
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'max'=>'Il campo :attribute è troppo lungo',
        'numeric'=>'Il campo :attribute dev\' essere numerico',
    ];

    public function store(){
        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);

        // session()->flash('message','Il tuo annuncio è stato inserito correttamente');

        $this->clear();

        return redirect()->to('/')->with('message','Il tuo annuncio è stato inserito correttamente');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function clear(){
        $this->title="";
        $this->body="";
        $this->price="";
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }

}
