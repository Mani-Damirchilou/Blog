<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function delete(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index');
    }
}
