<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
    public function index(Category $category)
    {
        $articles = $category->getRelatedArticles();

        return view('categories.articles',compact('articles'));
    }
}
