<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['novel_id', 'name', 'description'];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }
}
