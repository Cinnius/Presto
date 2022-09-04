<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;

class SearchSort extends Component
{
    public $searchValue = ' ';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $categorySearch;

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
        sleep(0.8);
        if ($this->categorySearch) {
            if ($this->searchValue) {
                $announcements = Announcement::search($this->searchValue)->where('is_accepted', true)->where('category_id', $this->categorySearch)->orderBy($this->sortField, $this->sortDirection)->get();
            } else {
                $announcements = Announcement::where('is_accepted', true)->where('category_id', $this->categorySearch)->orderBy($this->sortField, $this->sortDirection)->get();
            }
        } else {
            if ($this->searchValue) {
                $announcements = Announcement::search($this->searchValue)->where('is_accepted', true)->orderBy($this->sortField, $this->sortDirection)->get();
            } else {
                $announcements = Announcement::where('is_accepted', true)->orderBy($this->sortField, $this->sortDirection)->get();
            }
        }
        return view('livewire.search-sort', compact('announcements'));
    }
}
