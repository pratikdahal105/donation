<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function campaignDetail(Request $request, $slug){
        $page['title'] = 'Campaign | Details';
        return view('frontend.campaign.detail')->with(compact('page'));
    }
}
