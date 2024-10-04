<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotArc extends Model
{
    use HasFactory;

    protected $fillable = ['novel_id', 'title', 'description'];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

    public function plotPoints()
    {
        return $this->hasMany(PlotPoint::class);
    }
}
