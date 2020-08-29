<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Step;

class EditCounter extends Component
{
    public $steps = [];

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function decrement($index)
    {
        $step = $this->steps[$index];
        if (isset($step['id'])) {
            Step::find($step['id'])->delete();
        }
        unset($this->steps[$index]);
        // $this->steps--;
    }

    public function mount($steps)
    {
        $this->steps = $steps->toArray();
    }

    public function render()
    {
        return view('livewire.edit-counter');
    }
}
