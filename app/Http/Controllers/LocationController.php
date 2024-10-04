<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index($novelId)
    {
        return Location::where('novel_id', $novelId)->get();
    }

    public function store(Request $request, $novelId)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $location = Location::create([
            'novel_id' => $novelId,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        return response()->json($location, 201);
    }

    public function show($novelId, $locationId)
    {
        $location = Location::where('novel_id', $novelId)->findOrFail($locationId);

        return response()->json($location);
    }

    public function update(Request $request, $novelId, $locationId)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $location = Location::where('novel_id', $novelId)->findOrFail($locationId);

        $location->update($validatedData);

        return response()->json($location);
    }

    public function destroy($novelId, $locationId)
    {
        $location = Location::where('novel_id', $novelId)->findOrFail($locationId);
        $location->delete();

        return response()->noContent();
    }
}
