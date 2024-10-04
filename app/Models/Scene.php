<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    use HasFactory;

    protected $fillable = ['chapter_id', 'situation', 'task', 'action', 'result', 'conflict_type', 'emotional_beat', 'scene_goal'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
