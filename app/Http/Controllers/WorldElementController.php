<?php

namespace App\Http\Controllers;

use App\Models\WorldElement;
use Illuminate\Http\Request;

class WorldElementController extends Controller
{
    public function index($novelId)
    {

        return WorldElement::where('novel_id', $novelId)->get();
    }

    public function store(Request $request, $novelId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $worldElement = WorldElement::create([
            'novel_id' => $novelId,
            'name' => $validated['name'],
            'type' => $validated['type'],
            'description' => $validated['description'],
        ]);

        return response()->json($worldElement, 201);
    }

    public function show($novelId, $worldElementId)
    {

        $worldElement = WorldElement::where('novel_id', $novelId)->findOrFail($worldElementId);

        return response()->json($worldElement);
    }

    public function update(Request $request, $novelId, $worldElementId)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $worldElement = WorldElement::where('novel_id', $novelId)->findOrFail($worldElementId);

        $worldElement->update($validated);

        return response()->json($worldElement);
    }

    public function destroy($novelId, $worldElementId)
    {
        $worldElement = WorldElement::where('novel_id', $novelId)->findOrFail($worldElementId);

        $worldElement->delete();

        return response()->noContent();
    }
}
