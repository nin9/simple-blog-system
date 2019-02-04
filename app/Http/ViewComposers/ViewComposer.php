<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ViewComposer {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with([
            'categories' => $categories,
        ]);
    }
}