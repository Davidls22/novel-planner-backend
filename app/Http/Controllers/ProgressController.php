<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index($goalId)
    {
        $progress = Progress::where('goal_id', $goalId)->get();

        return response()->json(['success' => true, 'data' => $progress], 200);
    }

    public function store(Request $request, $goalId)
    {
        $progress = Progress::create([
            'goal_id' => $goalId,
            'progress_made' => $request->progress_made,
            'date' => $request->date,
        ]);

        return response()->json(['success' => true, 'data' => $progress], 201);
    }

    public function show($goalId, $progressId)
    {
        $progress = Progress::where('goal_id', $goalId)->findOrFail($progressId);

        return response()->json(['success' => true, 'data' => $progress], 200);
    }

    public function update(Request $request, $goalId, $progressId)
    {
        $progress = Progress::where('goal_id', $goalId)->findOrFail($progressId);
        $progress->update($request->all());

        return response()->json(['success' => true, 'data' => $progress], 200);
    }

    public function destroy($goalId, $progressId)
    {
        $progress = Progress::where('goal_id', $goalId)->findOrFail($progressId);
        $progress->delete();

        return response()->json(['success' => true, 'message' => 'Progress deleted successfully'], 200);
    }
}
