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
        'postTypeEnum',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reacts()
    {
        return $this->hasMany(PostReact::class);
    }


}
