<?php

namespace App\Http\Controllers;

use App\Models\PlotArc;
use Illuminate\Http\Request;

class PlotArcController extends Controller
{
    public function index($novelId)
    {
        return PlotArc::where('novel_id', $novelId)->get();
    }

    public function store(Request $request, $novelId)
    {
        $request->merge(['novel_id' => $novelId]);
        return PlotArc::create($request->all());
    }

    public function show(PlotArc $plotArc)
    {
        return $plotArc;
    }

    public function update(Request $request, PlotArc $plotArc)
    {
        $plotArc->update($request->all());
        return $plotArc;
    }

    public function destroy(PlotArc $plotArc)
    {
        $plotArc->delete();
        return response()->noContent();
    }
}
