<?php

namespace App\Models;

use App\Observers\ArticleObserver;
use App\Traits\HasPersianDateTime;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[ObservedBy(ArticleObserver::class)]
class Article extends Model
{
    use HasFactory,HasPersianDateTime,Likeable;

    protected $fillable = [
        'title','category_id','slug','content','active','thumbnail_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getThumbnailAttribute()
    {
        return '/storage/'.Str::substr($this->thumbnail_path,strlen('public/'));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
