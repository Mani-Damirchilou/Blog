<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function index(User $user)
    {
        $articles = $user->articles()->with('views','category','user','tags','likes')->paginate(12);
        return view('users.articles',compact('articles'));
    }
}
