<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Thread;

class ShowThread extends Component
{
    public Thread $thread;
    public $body;

    public function saveReply()
    {
        $this->validate([
            "body" => "required"
        ]);

        auth()->user()->replies()->create([
            "thread_id" => $this->thread->id,
            "body" => $this->body,
        ]);

        $this->reset("body");
    }

    public function render()
    {
        $replies = $this->thread->replies()->whereNull("reply_id")->get();

        return view('livewire.show-thread', [
            "replies" => $replies,
        ]);
    }
}
