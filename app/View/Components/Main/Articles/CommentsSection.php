<?php

namespace App\View\Components\Main\Articles;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentsSection extends Component
{
    public $comments;
    public $article;
    /**
     * Create a new component instance.
     */
    public function __construct(Article $article)
    {
        $this->comments = $article->getComments();
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.articles.comments-section');
    }
}
