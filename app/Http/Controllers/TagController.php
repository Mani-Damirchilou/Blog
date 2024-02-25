<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function edit(Tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }

    public function store(StoreTagRequest $request)
    {
        Tag::create($request->only('name','slug'));

        return redirect()->route('tags.index');
    }

    public function update(Tag $tag,UpdateTagRequest $request)
    {
        $tag->update($request->only('name','slug'));
        return redirect()->route('tags.index');
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
