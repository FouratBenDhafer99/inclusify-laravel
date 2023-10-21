<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ORM\Extension\BlamableAwareInterface;
use App\Models\ORM\Extension\Traits\BlamableTableTrait;
use App\Models\ORM\Extension\Traits\ModelCreatingUpdatingTrait;

class Job extends Model implements BlamableAwareInterface
{
    protected $fillable = [
        'title',
        'description',
        'salaryRange',
        'company',
        'address',  
    ];
    use HasFactory;
    use BlamableTableTrait;
    use ModelCreatingUpdatingTrait;

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
