<?php

namespace App\View\Components\Main\Articles;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class RelatedArticles extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     */
    public function __construct(Article $article)
    {
        $this->articles = !is_null($article->category) ? $article->getRelated() : new Collection();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.articles.related-articles');
    }
}
