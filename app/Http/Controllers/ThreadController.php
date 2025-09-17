<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Thread;

class ThreadController extends Controller
{
    public function create(Thread $thread)
    {
        $categories = Category::get();

        return view("thread.create", [
            "categories" => $categories,
            "thread" => $thread,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "category_id" => "required|exists:categories,id",
            "title" => "required",
            "body" => "required",
        ]);

        auth()->user()->threads()->create($request->all());

        return redirect()->route("dashboard");
    }

    public function edit(Thread $thread)
    {
        $categories = Category::get();

        return view("thread.edit", [
            "categories" => $categories,
            "thread" => $thread,
        ]);
    }

    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            "category_id" => "required|exists:categories,id",
            "title" => "required",
            "body" => "required",
        ]);

        $thread->update($request->all());

        return redirect()->route("thread", $thread);
    }
}
