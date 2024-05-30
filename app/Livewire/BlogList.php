<?php

// app/Http/Livewire/BlogList.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;

class BlogList extends Component
{
    public $blogs;
    public $perPage = 5;
    public $currentPage = 1;

    public function mount()
    {
        $this->loadBlogs();
    }

    public function loadBlogs()
    {
        $this->blogs = Blog::latest()->paginate($this->perPage, ['*'], 'page', $this->currentPage);
    }

    public function loadMore()
    {
        $this->currentPage++;
        $this->loadBlogs();
    }

    public function render()
    {
        return view('livewire.blog-list');
    }
}

