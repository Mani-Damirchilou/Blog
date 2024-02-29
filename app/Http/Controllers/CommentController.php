<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function delete(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index');
    }

    public function store(Article $article,StoreCommentRequest $request)
    {
        if (RateLimiter::tooManyAttempts("user-{$request->user()->id}-commented",1))
        {
            throw ValidationException::withMessages([
                'text' => __('auth.throttle',['seconds' => RateLimiter::availableIn("user-{$request->user()->id}-commented")])
            ]);
        }
        RateLimiter::hit("user-{$request->user()->id}-commented",60);

        $article->comments()->create([
            'text' => $request->text,
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
