<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index($novelId)
    {
        $goals = Goal::where('novel_id', $novelId)->get();

        return response()->json(['success' => true, 'data' => $goals], 200);
    }

    public function store(Request $request, $novelId)
{
    $validatedData = $request->validate([
        'goal_type' => 'required|string',
        'target' => 'required|integer',
        'deadline' => 'nullable|date',
    ]);

    $goal = Goal::create([
        'novel_id' => $novelId,
        'goal_type' => $validatedData['goal_type'],
        'target' => $validatedData['target'],
        'current_progress' => 0,
        'deadline' => $validatedData['deadline'],
    ]);

    return response()->json($goal, 201);
}

    public function show($novelId, $goalId)
    {
        $goal = Goal::where('novel_id', $novelId)->findOrFail($goalId);

        return response()->json(['success' => true, 'data' => $goal], 200);
    }

    public function update(Request $request, $novelId, $goalId)
    {
        $goal = Goal::where('novel_id', $novelId)->findOrFail($goalId);
        $goal->update($request->all());

        return response()->json(['success' => true, 'data' => $goal], 200);
    }

    public function destroy($novelId, $goalId)
    {
        $goal = Goal::where('novel_id', $novelId)->findOrFail($goalId);
        $goal->delete();

        return response()->json(['success' => true, 'message' => 'Goal deleted successfully'], 200);
    }

    public function goalsOverview(Request $request)
{
    $user = $request->user();

    $goals = Goal::whereHas('novel', function($query) use ($user) {
        $query->where('user_id', $user->id);
    })
    ->with('novel')
    ->get();

    $formattedGoals = $goals->map(function($goal) {
        return [
            'id' => $goal->id,
            'novel_id' => $goal->novel_id,
            'novel_title' => $goal->novel->title,
            'goal_type' => $goal->goal_type,
            'target' => $goal->target,
            'current_progress' => $goal->current_progress,
            'deadline' => $goal->deadline,
        ];
    });

    return response()->json($formattedGoals, 200);
}
}
