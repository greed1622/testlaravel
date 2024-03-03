<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{
    public $title = '';
    public $content = '';
    public $createdby = '';
    public $postID = 0;
    public $records = '';

    public function mount()
    {
        $this->fetchAll(); // Automatically fetch all records when the component is mounted
    }
    
    public function save()
    {
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'createdby' => Auth::user()->name,
        ]);
 
        $this->resetFields(); // Reset form fields after saving
        $this->fetchAll(); // Fetch all records again after saving
    }
    
    public function fetchByid()
    {
        $this->records = Post::find($this->postID); // Fetch record by ID
    }
    
    public function fetchAll()
    {
        $this->records = Post::orderBy('id', 'asc')->get(); // Fetch all records
    }
    
    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
    }
    
    public function render()
    {
        return view('livewire.create-post');
    }
}