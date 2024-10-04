<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['novel_id', 'name', 'role', 'description'];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }
}
