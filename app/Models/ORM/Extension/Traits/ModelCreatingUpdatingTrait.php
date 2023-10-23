<?php

namespace App\Models\ORM\Extension\Traits;

use App\Models\ORM\Extension\BlamableAwareInterface;

trait ModelCreatingUpdatingTrait
{
    public static function boot()
    {
        parent::boot();
        /**
         * Execute before adding to the database
         */
        static::creating(function ($model) {
            if ($model instanceof BlamableAwareInterface) {
                $user = auth()->user();
                $model->created_by = 2;
                //$model->created_by = $user->id;
                if ($model->offsetExists('updated_by'))
                    $model->updated_by = $user->id;
            }
        });
        /**
         * Execute before updating the database
         */
        static::updating(function ($model) {
            if ($model instanceof BlamableAwareInterface && $model->offsetExists('updated_by')) {
                $user = auth()->user();
                $model->updated_by = $user->id;
            }
        });
    }
}
