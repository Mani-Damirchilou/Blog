<?php

namespace App\Models;

use App\Observers\CommentObserver;
use App\Traits\HasPersianDateTime;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
#[ObservedBy(CommentObserver::class)]
class Comment extends Model
{
    use HasFactory,Likeable,HasPersianDateTime;
    public function getRouteKeyName()
    {
        return 'id';
    }

    protected $fillable = [
        'text','user_id'
    ];
    // Relations
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessors
    public function getShortTextAttribute()
    {
        return Str::substr($this->text,'0','30').'...';
    }
}
