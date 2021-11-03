<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\Donation\Model\Donation;
use App\Modules\Success_story\Model\Success_story;
use Illuminate\Http\Request;
use App\Modules\Villa\Model\Villa;
use App\Modules\Page\Model\Page;
use App\Modules\Banner\Model\Banner;
use Illuminate\Support\Facades\DB;


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
//        $top = Campaign::with('donations')->where('status', 1)->limit(6)->get();
//        $top = \DB::table('donation_campaign_view')->selectRaw('*,campaign_id, sum(amount) as sum_x, count(campaign_id) as count')
//        $top = \DB::table('donation_campaign_view')->selectRaw('*,campaign_id, sum(amount) as sum, count(campaign_id) as count')
////              ->join()
////            ->whereRaw('sum(amount) < target_amount')
//            ->groupBy('campaign_id')
//            ->orderBy('count','desc')
////            ->havingRaw('sum(amount) < target_amount')
////            ->whereHas('campaign',function ($q){
////                $q->whereRaw('sum(amount) < 20');
////            })
//            ->get();
//        $top = DB::select(DB::raw('SELECT campaign.target_amount, donation.campaign_id FROM donation INNER JOIN campaign ON donation.campaign_id = campaign.id GROUP BY(donation.campaign_id) HAVING(SUM(donation.amount) < campaign.target_amount) ORDER BY (COUNT(donation.campaign_id))'));
//        dd($top);
        $top = \DB::table('donation_campaign_view')->selectRaw('*,campaign_id, sum(amount) as sum, count(campaign_id) as count')
//            ->selectRaw('campaign.thumbnail, campaign.campaign_name, campaign.body, campaign.slug, campaign.target_amount, sum(donation.amount) as sum, count(campaign_id) as count')
//            ->selectRaw('*, sum(amount) as sum, count(campaign_id) as count')
            ->groupBy('campaign_id')
            ->orderBy('count','desc')
            ->where('status', 1)
            ->get();
        $campaigns = Campaign::with('donations')->where('status', 1)->orderBy('id', 'Desc')->limit(6)->get();
        $success_stories = Success_story::with('campaign')->limit(3)->get();

        return view('frontend.home')->with(compact('page', 'campaigns', 'success_stories', 'top'));
    }
}
