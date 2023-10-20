<?php

namespace App\Models;

use App\Models\ORM\Extension\BlamableAwareInterface;
use App\Models\ORM\Extension\Traits\BlamableTableTrait;
use App\Models\ORM\Extension\Traits\ModelCreatingUpdatingTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements BlamableAwareInterface
{
    use HasFactory;
    use BlamableTableTrait;
    use ModelCreatingUpdatingTrait;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'image',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}