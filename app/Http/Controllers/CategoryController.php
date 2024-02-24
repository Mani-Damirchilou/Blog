<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->only('name','slug'));
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    public function update(Category $category,UpdateCategoryRequest $request)
    {
        $category->update($request->only('name','slug'));

        return redirect()->route('categories.index');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
