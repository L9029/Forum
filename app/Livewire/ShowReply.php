<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reply;

class ShowReply extends Component
{
    public Reply $reply;

    public function render()
    {
        return view('livewire.show-reply');
    }
}
