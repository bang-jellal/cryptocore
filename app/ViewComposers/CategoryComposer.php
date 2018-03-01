<?php

namespace App\ViewComposers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * @var Request
     */
    protected $group;
    private $request;

    /**
     * Create a new profile composer.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $view->with('categories', $categories);
    }
}
