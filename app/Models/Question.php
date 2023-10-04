<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class);
    }
}
