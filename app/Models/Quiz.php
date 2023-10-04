<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;


    protected $fillable = [
        'score',
        'isSuccessful',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

}
