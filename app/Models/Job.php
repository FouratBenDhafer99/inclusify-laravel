<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'salaryRange',
        'company',
        'address',
        
    ];
    use HasFactory;
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
