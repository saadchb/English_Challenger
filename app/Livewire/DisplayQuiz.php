<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class DisplayQuiz extends Component
{
    public $start = false;
    public $quizActivee;
    public $retakingg;
    public $passs;
    #[On('startQuiz')]
    public function Display($quizActivee, $retakingg, $passs){
        $this->quizActivee = $quizActivee;
        $this->retakingg = $retakingg;
        $this->passs = $passs;
        $this->start = true;
    }
    public function render()
    {
        return view('livewire.display-quiz');
    }
}
