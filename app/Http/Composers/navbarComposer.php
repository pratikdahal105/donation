<?php

namespace App\Http\Composers;

use App\Modules\Category\Model\Category;
use Illuminate\Contracts\View\View;

class navbarComposer
{
    public function compose(View $view){
        $view->with('categories', Category::limit(4)->where('status', 1)->get());
    }
}
