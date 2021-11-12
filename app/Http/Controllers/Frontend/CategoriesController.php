<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\Category\Model\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function campaignCategory($slug){
        $campaign = Campaign::where('category.slug', $slug)
        ->join('category', 'category.id', 'campaign.category_id')
        ->select('campaign.id AS campaign_id', 'category.id AS category_id', 'category.name AS category_name', 'category.thumbnail')
        ->get();
        $campaign_sum = Campaign::where('category.slug', $slug)
            ->join('category', 'category.id', 'campaign.category_id')
            ->join('donation', 'campaign.id', 'donation.campaign_id')
            ->sum('donation.amount');
        $page['title'] = 'Campaign | '.$campaign->first()->category_name;
        $campaigns = Campaign::where('category_id', $campaign->first()->category_id)->with('donations')->where('status', 1)->limit(6)->get();
        $top = \DB::table('donation_campaign_view')->selectRaw('*,campaign_id, sum(amount) as sum, count(campaign_id) as count')
            ->groupBy('campaign_id')
            ->orderBy('count','desc')
            ->where('status', 1)
            ->where('category_id', $campaign->first()->category_id)
            ->get();
        return view('frontend.category.list', compact('page', 'campaigns', 'campaign', 'campaign_sum', 'top'));
    }
}
