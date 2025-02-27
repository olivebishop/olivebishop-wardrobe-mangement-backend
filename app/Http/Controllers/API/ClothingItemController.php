<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ClothingItem;
use Illuminate\Http\Request;

class ClothingItemController extends Controller {
    public function index() {
        return ClothingItem::where('user_id', auth()->id())->get();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        return ClothingItem::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);
    }

    public function show(ClothingItem $clothingItem) {
        $this->authorizeItem($clothingItem);
        return $clothingItem;
    }

    public function update(Request $request, ClothingItem $clothingItem) {
        $this->authorizeItem($clothingItem);
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $clothingItem->update($request->only('name', 'category', 'description'));
        return $clothingItem;
    }

    public function destroy(ClothingItem $clothingItem) {
        $this->authorizeItem($clothingItem);
        $clothingItem->delete();
        return response()->json(['message' => 'Item deleted']);
    }

    private function authorizeItem(ClothingItem $item) {
        if ($item->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }
}

