<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CreateAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $image;
    public $form_id;
    public $announcement;

    protected $rules = [
        'title'=>'required|max:25',
        'body'=>'required|min:15',
        'price'=>'required|numeric',
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',

    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'max'=>'Il campo :attribute è troppo lungo',
        'numeric'=>'Il campo :attribute dev\' essere numerico',
        'temporary_images.required'=>'l\'immagine è richiesta',
        'temporary_images.*.image'=>'i file devono essere immagini',
        'temporary_images.*.max'=>'l\'immagine dev\' essere massimo di un mega',
        'images.image'=>'i file devono essere immagini',
        'images.max'=>'l\'immagine dev\' essere massimo di un mega',

    ];

    public function updatedTemporaryImages() {
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])) {
            foreach($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key) {
        if(in_array($key, array_keys($this->images))){
            unset ($this->images[$key]);
        }
    }

    public function store(){
        
        $this->validate();

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if(count($this->images)){
            foreach($this->images as $image){
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 400, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));

            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
       
          Auth::user()->announcements()->save($this->announcement);
        

        $this->clear();

        return redirect()->to('/announcement/new')->with('message','Il tuo annuncio è stato inserito correttamente ed è in attesa di approvazione');
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
        $this->temporary_images="";
        $this->images = [];
    }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }

}
