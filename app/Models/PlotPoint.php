<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotPoint extends Model
{
    use HasFactory;

    protected $fillable = ['plot_arc_id', 'chapter_id', 'title', 'description'];

    public function plotArc()
    {
        return $this->belongsTo(PlotArc::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
