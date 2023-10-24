<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class CategoryEvent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
        public function events()
    {
        return $this->hasMany(Event::class);
    }
}