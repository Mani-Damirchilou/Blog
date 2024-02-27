<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function delete(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index');
    }

    public function store(Article $article,StoreCommentRequest $request)
    {
        $article->comments()->create([
            'text' => $request->text,
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
