<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $articles = Article::search($request->query('q'))->with('user','category','views','likes')->paginate(12);
        return view('articles.search',compact('articles'));
    }
}
