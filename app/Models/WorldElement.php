<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldElement extends Model
{
    use HasFactory;

    protected $fillable = ['novel_id', 'type', 'description'];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }
}
