<?php

namespace App\Models\ORM\Extension\Traits;

use App\Models\User;

trait BlamableTableTrait
{
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }
}
