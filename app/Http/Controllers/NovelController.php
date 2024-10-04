<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NovelController extends Controller
{
    /**
     * Display a listing of the novels for the authenticated user.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $novels = Novel::where('user_id', $user->id)->get();

        return response()->json(['success' => true, 'data' => $novels], 200);
    }

    /**
     * Store a newly created novel.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $novel = Novel::create([
            'title' => $request->title,
            'synopsis' => $request->synopsis,
            'user_id' => $request->user()->id,
        ]);

        return response()->json(['success' => true, 'data' => $novel], 201);
    }

    /**
     * Display the specified novel.
     */
    public function show(Novel $novel)
    {
        return response()->json(['success' => true, 'data' => $novel], 200);
    }

    /**
     * Update the specified novel.
     */
    public function update(Request $request, Novel $novel)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'synopsis' => 'sometimes|nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $novel->update($request->only(['title', 'synopsis']));
        return response()->json(['success' => true, 'data' => $novel], 200);
    }

    /**
     * Remove the specified novel.
     */
    public function destroy(Novel $novel)
    {
        $novel->delete();
        return response()->json(['success' => true, 'message' => 'Novel deleted successfully'], 204);
    }
}
