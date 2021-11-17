<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\Category\Model\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function campaignCategory($slug){
        $category_first = Category::where('slug', $slug)->with('campaigns.donations')
            ->whereHas('campaigns', function ($q){
                $q->where('status', 1);
            })->first();
        $campaign_sum = Campaign::where('category.slug', $slug)
            ->join('category', 'category.id', 'campaign.category_id')
            ->join('donation', 'campaign.id', 'donation.campaign_id')
            ->sum('donation.amount');
        $page['title'] = 'Campaign | '.$category_first->name;
        $top = \DB::table('donation_campaign_view')->selectRaw('*,campaign_id, sum(amount) as sum, count(campaign_id) as count')
            ->groupBy('campaign_id')
            ->orderBy('count','desc')
            ->where('status', 1)
            ->where('category_id', $category_first->id)
            ->get();
        return view('frontend.category.detail', compact('page', 'category_first', 'campaign_sum', 'top'));
    }

    public function allCategory(){
        $categories = Category::with('campaigns.donations')->get();
        $page['title'] = 'Campaign | All Categories';
        $top = \DB::table('donation_campaign_view')->selectRaw('*,campaign_id, sum(amount) as sum, count(campaign_id) as count')
            ->groupBy('campaign_id')
            ->orderBy('count','desc')
            ->where('status', 1)
            ->get();
        return view('frontend.category.allCategory', compact('page', 'categories', 'top'));
    }

    public function discoverCategory(){
        $categories = Category::with('campaigns.donations')->get();
        $page['title'] = 'Campaign | All Categories';
        return view('frontend.category.discover', compact('page', 'categories'));
    }
}
