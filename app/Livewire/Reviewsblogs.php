<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;

class Reviewsblogs extends Component
{

    use WithPagination;

    public $perPage = 4;
    public $isLoading = false;
    public function loadMore()
    {
        $this->isLoading = true;
        $this->perPage += 4;

        sleep(1);

        $this->isLoading = false;
    }
    public function render()
    {
        $blogs = Blog::latest()->paginate($this->perPage);
        return view('livewire.reviewsblogs' ,compact('blogs'));
    }
}
