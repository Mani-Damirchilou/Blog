<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(string $likeable_type,$likeable_id)
    {
        $likeable_id->like();
        return back();
    }
    public function dislike(string $likeable_type,$likeable_id)
    {
        $likeable_id->disLike();
        return back();
    }
}
