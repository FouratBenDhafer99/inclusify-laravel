<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ORM\Extension\BlamableAwareInterface;
use App\Models\ORM\Extension\Traits\BlamableTableTrait;
use App\Models\ORM\Extension\Traits\ModelCreatingUpdatingTrait;

class JobApplication extends Model implements BlamableAwareInterface
{
    protected $fillable = [
        'job_id',
        'resume_path',
        'motivation',
        'status',
    ];

    use HasFactory;
    use BlamableTableTrait;
    use ModelCreatingUpdatingTrait;

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    
    public function user()
    {
    return $this->belongsTo(User::class, 'created_by');
    }
}
