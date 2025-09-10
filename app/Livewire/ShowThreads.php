<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Thread;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = Category::get();
        $threads = Thread::get();

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
