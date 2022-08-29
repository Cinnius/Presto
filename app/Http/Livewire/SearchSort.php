<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;

class SearchSort extends Component
{
    public $searchValue = ' ';
    public $announcements;
    public $sortField = 'created_at';
    public $sortDirection = 'asc';
  

    public function mount()
    {
        $this->resetSearchValue();
    }
    
    public function sortBy($field, $direction){
      
        $this->sortField = $field; 
        $this->sortDirection = $direction;
        
    }
    
    public function resetSearchValue() {
        $this->searchValue = '';
        $this->announcements = [];
    }
    
/*     public function searchByCategory($categoryValue, Category $category){
        $this-> announcements = Announcement::where($categoryValue === $category->name)->get();
    } */
   
    public function render()
    {
        sleep(1);
        $this->announcements = Announcement::where('title',  'like', '%'.$this->searchValue.'%')->orderBy($this->sortField, $this->sortDirection)->get();
         
        
        return view('livewire.search-sort');
    }
}
