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
    protected $appends = [
        'is_dis_liked_by_user',
        'is_liked_by_user',
    ];

    // Relations
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


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }
    // Scopes
    public function scopeActive($query)
    {
        return $query->where('active',true);
    }

    public function scopeSearch($query,$title)
    {
        return $query->where('title','like',"%{$title}%");
    }

    // Accessors
    public function getThumbnailAttribute()
    {
        return '/storage/'.Str::substr($this->thumbnail_path,strlen('public/'));
    }
   // Eloquent Calls
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function syncTags($tags)
    {
        $this->tags()->sync($tags);
    }
    public function attachTags($tags)
    {
        $this->tags()->attach($tags);
    }

    public function getComments()
    {
        return $this->comments()->with('user')->withCount(['likes as likes_count' => function ($query) {
            $query->where('vote', 1);
        }])->orderByDesc('likes_count')->get();
    }

    public function getRelated()
    {
        return $this->category->articles()->where('id','!=',$this->id)->take(3)->get();
    }

    public function isViewedByUser()
    {
        return $this->views()->where('user_id',auth()->id())->exists();
    }
    public function view()
    {
        if (auth()->check() && !$this->isViewedByUser())
        {
            $this->views()->create([
                'user_id' => auth()->id()
            ]);
        }
    }

    public function getViewsCount()
    {
        return $this->views()->count();
    }
}
