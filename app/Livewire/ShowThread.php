<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Thread;

class ShowThread extends Component
{
    public Thread $thread;

    public function render()
    {
        return view('livewire.show-thread');
    }
}
