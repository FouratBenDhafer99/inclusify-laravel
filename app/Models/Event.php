<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\User;

class Event extends Model
{
    const STATUS_UPCOMING = 'UPCOMING';
    const STATUS_ONGOING = 'ONGOING';
    const STATUS_PAST = 'PAST';
    const STATUS_CANCELED = 'CANCELED';

    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
        'status',
        'capacity',
        'registration_deadline',
        'image',
        'organizer_id',
        'category_id',
    ];
    
    protected $casts = [
        'date' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class);
    }

    public function organizer()
    {
        return $this->belongsTo(User::class);
    }

}
