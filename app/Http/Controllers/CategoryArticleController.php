<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
    public function index(Category $category)
    {
        $articles = $category->articles()->latest()->active()->paginate(12);

        return view('categories.articles',compact('articles'));
    }
}
