<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('views','category','user','tags','likes')->paginate(15);

        return view('articles.index',compact('articles'));
    }
    public function edit(Article $article)
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('articles.edit',compact('article','tags','categories'));
    }

    public function update(Article $article,UpdateArticleRequest $request)
    {
        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'content' => $request->input('content'),
            'thumbnail_path' => $request->has('thumbnail') ? $request->thumbnail->store('public/thumbnails') : $article->thumbnail_path,
            'active' => $request->has('active')
        ]);

        $article->syncTags($request->tags);

        return redirect()->route('articles.index');
    }

    public function store(StoreArticleRequest $request)
    {
        $article = $request->user()->articles()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'content' => $request->input('content'),
            'thumbnail_path' => $request->thumbnail->store('public/thumbnails'),
            'active' => $request->has('active')
        ]);

       $article->attachTags($request->tags);

        return redirect()->route('articles.index');
    }

    public function delete(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $article->view();
        $isDisLiked = $article->isDisLikedByUser();
        $isLiked = $article->isLikedByUser();
        abort_if(!$article->active,403,'دسترسی غیر مجاز میباشد');
        return view('articles.show',compact('article','isDisLiked','isLiked'));
    }
}
