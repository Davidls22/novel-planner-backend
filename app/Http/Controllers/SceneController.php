<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function index($novelId, $chapterId)
    {
        return Scene::where('chapter_id', $chapterId)->get();
    }

    public function store(Request $request, $novelId, $chapterId)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'situation' => 'required|string',
            'task' => 'required|string',
            'action' => 'required|string',
            'result' => 'required|string',
        ]);

        $scene = Scene::create([
            'chapter_id' => $chapterId,
            'description' => $request->input('description'),
            'situation' => $request->input('situation'),
            'task' => $request->input('task'),
            'action' => $request->input('action'),
            'result' => $request->input('result'),
        ]);

        return response()->json($scene, 201);
    }

    public function show($novelId, $chapterId, $sceneId)
    {
        return Scene::where('chapter_id', $chapterId)
                    ->where('id', $sceneId)
                    ->firstOrFail();
    }

    public function update(Request $request, $novelId, $chapterId, $sceneId)
    {
        $scene = Scene::where('chapter_id', $chapterId)
                      ->where('id', $sceneId)
                      ->firstOrFail();

        $scene->update($request->all());

        return response()->json($scene);
    }

    public function destroy($novelId, $chapterId, $sceneId)
    {
        $scene = Scene::where('chapter_id', $chapterId)
                      ->where('id', $sceneId)
                      ->firstOrFail();

        $scene->delete();

        return response()->noContent();
    }
}
