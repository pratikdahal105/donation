<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Villa\Model\Villa;
use App\Modules\Page\Model\Page;
use App\Modules\Banner\Model\Banner;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $page['title'] = 'Donation | Home';

        return view('frontend.home')->with(compact('page'));
    }
}
