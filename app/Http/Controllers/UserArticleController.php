<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function index(User $user)
    {
        $articles = $user->getRelatedArticles();
        return view('users.articles',compact('articles'));
    }
}
