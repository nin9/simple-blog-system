<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

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
        $admin_categories = Category::all();
        $categories = Category::withCount('posts')->having('posts_count', '>', 0)->get();
        
        $view->with([
            'categories' => $categories,
            'admin_categories' => $admin_categories
        ]);
    }
}