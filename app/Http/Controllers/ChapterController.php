<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index($novelId)
    {
        return Chapter::where('novel_id', $novelId)->get();
    }

    public function store(Request $request, $novelId)
{
    $request->merge(['novel_id' => $novelId]);

    if (!$request->has('chapter_number')) {
        $request->merge(['chapter_number' => 0]);
    }

    return Chapter::create($request->all());
}

    public function show($novelId, $chapterId)
{

    $chapter = Chapter::with('scenes')
        ->where('novel_id', $novelId)
        ->where('id', $chapterId)
        ->firstOrFail();

    return response()->json($chapter);
}

    public function update(Request $request, $novelId, $chapterId)
    {

        $chapter = Chapter::where('novel_id', $novelId)
                          ->where('id', $chapterId)
                          ->firstOrFail();
        $chapter->update($request->all());

        return $chapter;
    }

    public function destroy($novelId, $chapterId)
    {
        $chapter = Chapter::where('novel_id', $novelId)
                          ->where('id', $chapterId)
                          ->firstOrFail();
        $chapter->delete();

        return response()->noContent();
    }
}
