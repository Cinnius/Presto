<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;
    public $category;

    protected $rules=[
        'title'=>'required|max:25',
        'body'=>'required|min:15',
        'price'=>'required|numeric',
        'category'=>'required',
    ];

    protected $messages=[
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'max'=>'Il campo :attribute è troppo lungo',
        'numeric'=>'Il campo :attribute dev\' essere numerico',
    ];

    public function store(){
        
        $this->validate();
        
        $category=Category::find($this->category);
        $announcement = $category->announcements()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);
         Auth::user()->announcements()->save($announcement);
        

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
        $this->category="";
    }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }

}