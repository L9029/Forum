<div>
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img src="{{ $reply->user->avatar() }}" alt="{{ $reply->user->name }}" class="rounded-md">
            </div>
            <div class="w-full">
                <p class="mb-2 text-blue-600 font-semibold text-xs">
                    {{ $reply->user->name }}
                </p>

                <p class="text-white/60 text-xs">
                    {{ $reply->body }}
                </p>

                <!-- Formulario -->
                @if($is_creating)
                    <form wire:submit.prevent="saveChildReply" class="mt-4">
                        <input class="bg-slate-800 border-1 border-slate-900 rounded-md w-full p-3 text-white/60 text-xs" wire:model.defer="body" type="text" name="body" id="body" placeholder="Escribe una respuesta">
                    </form>
                @endif

                <p class="mt-4 text-white/60 text-xs flex gap-2 justify-end">
                    @if(is_null($this->reply->reply_id))
                        <a href="#" wire:click.prevent="$toggle('is_creating')" class="hover:text-white">Responder</a>
                    @endif
                    <a href="#" class="hover:text-white">Editar</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Respuestas Hijas -->
    @foreach($reply->replies as $item)
        <div class="ml-8">
            <livewire:show-reply :reply="$item" :key="'reply-' . $item->id" />
        </div>
    @endforeach
</div>
