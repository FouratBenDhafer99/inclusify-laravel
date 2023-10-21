<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_id',
        'resume_path',
        'motivation',
        'status',
        'user_id',
    ];
    use HasFactory;
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}