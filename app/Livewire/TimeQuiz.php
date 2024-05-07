<?php

namespace App\Livewire;

use Livewire\Component;

class TimeQuiz extends Component
{
    public function startQuiz(){
        $this->dispatch('startQuiz',var:'hi');
    }
    public function render()
    {
        return view('livewire.time-quiz');
    }
}
