<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class LiveSearch extends Component
{
    public $searchValue = ' ';
    public $announcements;
    public $sortField = 'title';
    public $sortDirection = 'asc';

    public function resetSearchValue() {
        $this->searchValue = '';
        $this->announcements = [];
    }
    public function mount()
    {
        $this->resetSearchValue();
    }

    public function sortBy($field){
        $this->sortField = $field;
        
    }
   
    public function render()
    {
        $this->announcements = Announcement::where('title',  'like', '%'.$this->searchValue.'%')->get();
        
        return view('livewire.search-sort');
    }
}
