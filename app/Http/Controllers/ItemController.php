<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'condition' => 'nullable|string|max:255',
            'owner_name' => 'required|string|max:255',
        ]);

        $validated['reward_coins'] = 100;
        $validated['is_available'] = true;

        Item::create($validated);

        return redirect()
            ->route('items.create')
            ->with('success', 'Item added successfully! You earned 100 coins.');
    }
}
