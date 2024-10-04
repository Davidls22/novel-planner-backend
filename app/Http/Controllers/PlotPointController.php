<?php

namespace App\Http\Controllers;

use App\Models\PlotPoint;
use Illuminate\Http\Request;

class PlotPointController extends Controller
{
    public function index($plotArcId)
    {
        return PlotPoint::where('plot_arc_id', $plotArcId)->get();
    }

    public function store(Request $request, $plotArcId)
    {
        $request->merge(['plot_arc_id' => $plotArcId]);
        return PlotPoint::create($request->all());
    }

    public function show(PlotPoint $plotPoint)
    {
        return $plotPoint;
    }

    public function update(Request $request, PlotPoint $plotPoint)
    {
        $plotPoint->update($request->all());
        return $plotPoint;
    }

    public function destroy(PlotPoint $plotPoint)
    {
        $plotPoint->delete();
        return response()->noContent();
    }
}
