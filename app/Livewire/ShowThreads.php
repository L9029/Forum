<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;
use App\Models\Thread;

class ShowThreads extends Component
{
    use WithPagination;

    public $search_title;
    public $search_category;

    public function select_category($category_id)
    {
        $this->search_category = $category_id;
    }

    public function render()
    {
        $categories = Category::get();

        $query = Thread::query();
        $query->with("user", "category");
        $query->where("title", "ilike", "%{$this->search_title}%");

        if ($this->search_category) {
            $query->where("category_id", $this->search_category);
        }

        $threads = $query
            ->latest()
            ->withCount("replies")
            ->paginate(10);

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
