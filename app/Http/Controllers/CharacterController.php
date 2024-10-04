<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index($novelId)
    {
        return Character::where('novel_id', $novelId)->get();
    }

    public function store(Request $request, $novelId)
    {
        $request->merge(['novel_id' => $novelId]);
        return Character::create($request->all());
    }

    public function show($novelId, Character $character)
{
    return response()->json($character);
}

public function update(Request $request, $novelId, Character $character)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $character->update($validated);

    return response()->json($character);
}

    public function destroy($novelId, $characterId)
    {
        $character = Character::where('novel_id', $novelId)->findOrFail($characterId);

        $character->delete();

        return response()->noContent();
    }
}
