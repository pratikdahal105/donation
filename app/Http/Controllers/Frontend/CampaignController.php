<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function campaignDetail(Request $request, $slug){
        $page['title'] = 'Campaign | Details';
        $campaign = Campaign::where('slug', $slug)->with('user', 'donations.user')->first();
        return view('frontend.campaign.detail')->with(compact('page', 'campaign'));
    }
}
