<?php

namespace App\ViewComposers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductComposer
{
    /**
     * @var Request
     */
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
        $products = Product::published()
            ->orderBy('created_at', 'ASC')
            ->limit(8)
            ->get();

        $view->with('products', $products);
    }
}
