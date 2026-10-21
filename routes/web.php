
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Models\Item;

Route::get('/', function () {
    $search = trim(request('search', ''));

    if ($search !== '') {
        $items = Item::where('item_name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('category', 'like', "%{$search}%")
            ->orWhere('owner_name', 'like', "%{$search}%")
            ->latest()
            ->get();
    } else {
        $items = Item::latest()->get();
    }

    return view('welcome', compact('items'));
});

Route::get('/items/create', [ItemController::class, 'create'])
    ->name('items.create');

Route::post('/items', [ItemController::class, 'store'])
    ->name('items.store');
