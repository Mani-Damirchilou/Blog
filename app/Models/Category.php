<?php

namespace App\Models;

use App\Traits\HasPersianDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasPersianDateTime;
    use HasFactory;
    protected $fillable = [
        'name',
        'slug'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
