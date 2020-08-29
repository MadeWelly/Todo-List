<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $steps = [];

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function decrement($index)
    {
        unset($this->steps[$index]);
        // $this->steps--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
