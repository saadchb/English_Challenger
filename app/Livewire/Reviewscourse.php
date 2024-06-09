<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\review;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use Livewire\WithPagination;

class Reviewscourse extends Component
{
    use WithPagination;

    public $course;
    public $perPage = 5;
    public $isLoading = false;

    public function mount($course)
    {
        $this->course = Course::findOrFail($course);
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
        $reviews = review::where('course_id', $this->course->id)
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.reviewscourse',[
            'reviews' => $reviews,'teachers'=>$teachers,'studentR'=>$studentR

        ]);
    }
}
