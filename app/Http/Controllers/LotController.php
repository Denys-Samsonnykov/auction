<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLotRequest;
use App\Http\Requests\UpdateLotRequest;
use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LotController extends Controller
{
    public function index(Request $request)
    {
        $queryLots = Lot::query();
        $categories = Category::all();
        if ($request->filled('select')) {
            $queryLots->where('category_id', '=', $request->select);
        }
        $lots = $queryLots->paginate(10);
        return view('lots.index', compact('lots', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('lots.new', compact('categories'));
    }

    public function edit(Lot $lot)
    {
        $categories = Category::all();
        return view('lots.edit', compact('lot', 'categories'));
    }

    public function update(UpdateLotRequest $request, Lot $lot)
    {
        $lot->update($request->validated());
        return redirect(route('lots.index'))
            ->with("status", "The lot: \"{$lot->title}\" was successfully updated!");
    }

    public function store(CreateLotRequest $request)
    {
        $lot = Lot::query()->create($request->validated());
        return redirect(route('lots.index'))
            ->with("status", "The lot: \"{$lot->title}\" was successfully created!");
    }

    public function destroy(Lot $lot)
    {
        $lot->delete();
        return redirect()->back()->with("status", "The lot: \"{$lot->title}\" was successfully removed!");
    }

}
