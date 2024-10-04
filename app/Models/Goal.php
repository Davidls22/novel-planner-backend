<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['novel_id', 'goal_type', 'target', 'current_progress', 'deadline'];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}
