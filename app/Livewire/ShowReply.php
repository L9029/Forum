<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reply;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowReply extends Component
{
    use AuthorizesRequests;

    public Reply $reply;
    public $body;
    public $is_creating = false;
    public $is_editing = false;

    // No es necesario en este caso ya que Livewire 3 ya renderiza el componente por su cuenta
    // protected $listeners = ['refresh' => '$refresh'];

    public function updatedIsCreating()
    {
        $this->reset("body", "is_editing");
    }

    public function updatedIsEditing()
    {
        $this->authorize('update', $this->reply);
        $this->reset("is_creating");
        $this->body = $this->reply->body;
    }

    public function editChildReply()
    {
        $this->authorize('update', $this->reply);

        $this->validate([
            "body" => "required"
        ]);

        $this->reply->update([
            "body" => $this->body,
        ]);

        $this->reset("body");
        $this->is_editing = false;
    }

    public function saveChildReply()
    {
        // Valida que la respuesta hija ya no tenga un respuesta hija asociada para no generar un bucle
        if(!is_null($this->reply->reply_id)) return;

        $this->validate([
            "body" => "required"
        ]);

        auth()->user()->replies()->create([
            "reply_id" => $this->reply->id,
            "thread_id" => $this->reply->thread->id,
            "body" => $this->body,
        ]);

        $this->reset("body");
        $this->is_creating = false;
        // $this->dispatch('refresh')->self();
    }

    public function render()
    {
        return view('livewire.show-reply');
    }
}
