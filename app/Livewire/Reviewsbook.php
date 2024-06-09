<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\review;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class Reviewsbook extends Component
{
    use WithPagination;

    public $book;
    public $perPage = 5;
    public $isLoading = false;

    public function mount($book)
    {
        $this->book = Book::findOrFail($book);
    }

    public function loadMore()
    {
        $this->isLoading = true;
        $this->perPage += 5;

        sleep(1);

        $this->isLoading = false;
    }
    public function render()
    {
        $teachers = Teacher::all();
        $studentR = Student::all();
        $reviews = review::where('book_id', $this->book->id)
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.reviewsbook',[
            'reviews' => $reviews,'teachers'=>$teachers,'studentR'=>$studentR
        ]);
    }
}
