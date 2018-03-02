<?php

namespace App\ViewComposers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandComposer
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
        $brands = Brand::orderBy('name', 'asc')->get();

        $view->with('brands', $brands);
    }
}
