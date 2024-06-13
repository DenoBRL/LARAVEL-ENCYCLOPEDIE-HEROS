<?php

namespace App\Models;

use App\Models\Hero;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
