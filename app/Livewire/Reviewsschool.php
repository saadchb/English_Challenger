<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\review;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\WithPagination;
class Reviewsschool extends Component
{
    use WithPagination;

    public $school;
    public $perPage = 5;
    public $isLoading = false;

    public function mount($school)
    {
        $this->school = School::findOrFail($school);
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
        $reviews = review::where('school_id', $this->school->id)
            ->latest()
            ->paginate($this->perPage);
        return view('livewire.reviewsschool',[
            'reviews' => $reviews,'teachers'=>$teachers,'studentR'=>$studentR

        ]);
    
    }
}
