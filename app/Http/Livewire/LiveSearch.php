<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;

class LiveSearch extends Component
{
    public $searchValue = ' ';
    public $announcements;


    public function resetSearchValue() {
        $this->searchValue = '';
        $this->announcements = [];
    }
    public function mount()
    {
        $this->resetSearchValue();
    }


   
    public function render()
    {
       $categories =  Category::all();
        $this->announcements = Announcement::where('title',  'like', '%'.$this->searchValue.'%')->get();
        
        return view('livewire.live-search', compact('categories'));
    }
}
