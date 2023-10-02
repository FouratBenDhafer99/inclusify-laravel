<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'organizer',
        'status',
        'capacity',
        'registration_deadline',
        'image',
        'creation_date',
    ];
}
