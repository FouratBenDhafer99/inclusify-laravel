<?php

namespace App\Models\ORM\Extension;

use App\Models\User;

interface BlamableAwareInterface
{
    /**
     * Relation between the model and User
     * Called with $object->createdBy
     */
    public function createdBy();

    /**
     * Relation between the model and User
     * Called with $object->updatedBy
     */
    public function updatedBy();
}
