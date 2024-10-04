<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['novel_id', 'title', 'synopsis', 'content','chapter_number'];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

    public function scenes()
    {
        return $this->hasMany(Scene::class);
    }

    public function plotPoints()
    {
        return $this->hasMany(PlotPoint::class);
    }
}
