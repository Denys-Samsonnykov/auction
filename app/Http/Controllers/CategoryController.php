<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.new');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect(route('categories.index'))
            ->with("status", "The category: \"{$category->title}\" was successfully updated!");

    }

    public function store(CategoryRequest $request)
    {
        $category = Category::query()->create($request->validated());
        return redirect(route('categories.index'))
            ->with("status", "The category: \"{$category->title}\" was successfully created!");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with("status", "The lot: \"{$category->title}\" was successfully removed!");
    }
}
