<?php

namespace App\Models;

use App\Models\ORM\Extension\BlamableAwareInterface;
use App\Models\ORM\Extension\Traits\BlamableTableTrait;
use App\Models\ORM\Extension\Traits\ModelCreatingUpdatingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements BlamableAwareInterface
{

    use HasFactory;
    use BlamableTableTrait;
    use ModelCreatingUpdatingTrait;

    protected $fillable = [
        'description',
        'images',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



}
