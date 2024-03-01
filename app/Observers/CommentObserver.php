<?php

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\UserNotification;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        if ($comment->user_id !== $comment->article->user_id)
        {
            $text = $comment->user->name . ' ' . 'برای مقاله شما با عنوان :' . ' ' . '"' . $comment->article->title . '"' . ' ' . 'نظر جدیدی ثبت کرد !';
            $comment->article->user->notify(new UserNotification($text,'success'));
        }
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        $text = '"'. $comment->text . '"';
        $comment->user->notify(new UserNotification("نظر شما با متن : {$text} حذف شد !",'danger'));
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
