<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Assuming you have an Item model

class ItemController extends Controller
{
    // Retrieve all items
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    // Create a new item
    public function store(Request $request)
    {
        $item = Item::create($request->all());
        return response()->json($item, 201);
    }

    // Update an existing item
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    // Delete an item
    public function destroy($id)
    {
        Item::destroy($id);
        return response()->json(null, 204);
    }
}
