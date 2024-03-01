<?php

namespace App\Observers;

use App\Models\Article;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Storage;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        $notification = 'مقاله شما با عنوان :'.' '.'"'.$article->title.'"'.' '.'با موفقیت منتشر شد !';
        $article->user->notify(new UserNotification($notification,'success'));
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        if ($article->isDirty('thumbnail_path'))
        {
            Storage::delete($article->getOriginal('thumbnail_path'));
        }
        if ($article->isDirty(['title','category_id','content','thumbnail_path']))
        {
            $title = $article->isDirty('title') ? $article->getOriginal('title') : $article->title;
            $text = 'مقاله شما با عنوان (قبلی) :'.' '.'"'. $title .'"'.' '.'ویرایش شد !';
            $article->user->notify(new UserNotification($text,'info'));
        }
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        Storage::delete($article->thumbnail_path);
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
