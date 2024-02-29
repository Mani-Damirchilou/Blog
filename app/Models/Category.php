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

    // Relations
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    // Eloquent Calls
    public function getRelatedArticles()
    {
        return $this->articles()->with('user','category','views','likes')->latest()->active()->paginate(12);
    }
}
