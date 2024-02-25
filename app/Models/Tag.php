<?php

namespace App\Models;

use App\Traits\HasPersianDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory,HasPersianDateTime;
    protected $fillable = [
        'name',
        'slug'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
