<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'synopsis', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function plotArcs()
    {
        return $this->hasMany(PlotArc::class);
    }

    public function worldElements()
    {
        return $this->hasMany(WorldElement::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
