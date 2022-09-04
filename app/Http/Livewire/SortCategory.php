<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class SortCategory extends Component
{
    public $searchValue = ' ';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $announcements;
    



    public function mount()
    {

        $this->resetSearchValue();
    }

    public function sortBy($field, $direction)
    {

        $this->sortField = $field;
        $this->sortDirection = $direction;
    }

    public function resetSearchValue()
    {
        $this->searchValue = '';
    }
    public function render()
    {
        
        foreach ($this->announcements as $announcement) {

            
            if ($this->searchValue) {
                $announcementsX = Announcement::search($this->searchValue)->where('is_accepted', true)->where('category_id' , $announcement->category_id)->orderBy($this->sortField, $this->sortDirection)->get();
            } else {
                $announcementsX = Announcement::where('is_accepted', true)->where('category_id' , $announcement->category_id)->orderBy($this->sortField, $this->sortDirection)->get();
            }
        }
        return view('livewire.sort-category', compact('announcementsX'));
    }
}
