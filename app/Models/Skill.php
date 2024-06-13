<?php

namespace App\Models;

use App\Models\Hero;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function heros()
    {
        return $this->hasMany(Hero::class);
    }
}
