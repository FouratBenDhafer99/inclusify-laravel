<?php

namespace App\Models;

use App\Models\ORM\Extension\BlamableAwareInterface;
use App\Models\ORM\Extension\Traits\BlamableTableTrait;
use App\Models\ORM\Extension\Traits\ModelCreatingUpdatingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements BlamableAwareInterface
{
  use HasFactory;
  use BlamableTableTrait;
  use ModelCreatingUpdatingTrait;

    protected $fillable = [
        'user_id',
        'comment',
        'post_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function post()
    {
        return $this->belongsTo(Post::class , 'post_id');
    }
}
