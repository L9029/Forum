<div>
    <select name="category_id" id="category_id" class="bg-slate-800 border-1 border-slate-900 rounded-md w-full p-3 text-white/60 text-xs capitalize mb-4">
        <option value="">Seleccione una Categoria</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected($category->id == old('category_id', $thread->category_id))>{{ $category->name }}</option>
        @endforeach
    </select>

    <input type="text" name="title" placeholder="Título" value="{{ old('title', $thread->title) }}" class="bg-slate-800 border-1 border-slate-900 rounded-md w-full p-3 text-white/60 text-xs mb-4">

    <textarea name="body" id="body" rows="10" placeholder="Descripción del problema" class="bg-slate-800 border-1 border-slate-900 rounded-md w-full p-3 text-white/60 text-xs mb-4">{{ old('body', $thread->body) }}</textarea>
</div>