<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\Category\Model\Category;
use App\Modules\City\Model\City;
use App\Modules\Country\Model\Country;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class CampaignController extends Controller
{
    public function campaignDetail(Request $request, $slug){
        $page['title'] = 'Campaign | Details';
        $campaign = Campaign::where('slug', $slug)->where('status', 1)->with('user', 'donations.user', 'campaign_updates')->first();
        return view('frontend.campaign.detail')->with(compact('page', 'campaign'));
    }

    public function createCampaign(Request $request){
        $request->validate([
            'country' => 'required',
            'location_id' => 'required',
            'category_id' => 'required',
            'target_amount' => 'required',
            'thumbnail' => 'required',
            'campaign_name' => 'required',
            'body' => 'required',
            'stop_limit' => 'required',
            'created_for' => 'required',
         ]);
//        $data = $request->except('_token');
        $data['location_id'] = $request->location_id;
        $data['user_id'] = Auth::user()->id;
        $data['category_id'] = $request->category_id;
        $data['target_amount'] = $request->target_amount;
        $data['campaign_name'] = $request->campaign_name;
        $data['body'] = $request->body;
        $data['created_for'] = $request->created_for;
        $data['stop_limit'] = $request->stop_limit;
        $data['slug'] = SlugService::createSlug(Campaign::class, 'slug', $request->campaign_name);
        $city = City::where('id', $data['location_id'])->with('state.country')->first();
        $data['search'] = $data['campaign_name'].','.$data['created_for'].','.$city->name.','.$city->state->name.','.$city->state->country->name.','.$data['body'].','.$data['target_amount'];
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $uploadPath = public_path('uploads/campaign/thumbnail/');
            $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $uploadPath = public_path('uploads/campaign/logo/');
            $data['logo'] = $this->fileUpload($file, $uploadPath);
        }
        try {
            Campaign::Create($data);
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'something went wrong please try again!');
        }

        return redirect()->route('frontend.user.campaign')->with('success', 'Campaign Created Successfully!');
    }

    public function fileUpload($file, $path){
        $ext = $file->getClientOriginalExtension();
        $imageName = md5(microtime()) . '.' . $ext;
        if (!$file->move($path, $imageName)) {
            return redirect()->back();
        }
        return $imageName;
    }

    public function loadMore(Request $request){
        $output = '';
        $campaigns = Campaign::where('category_id', $request->category_id)->where('status', 1)->orderBy('created_at', 'DESC')->skip($request->campaignCount)->take(6)->with('donations')->get();

        foreach ($campaigns as $campaign){
            $output .= '
            <div class="project-item" id="countCampaign">
                <a href="'.route('frontend.campaign.detail', $campaign->slug).'">
                    <div class="img-container">
                        <img src="'.asset('uploads/campaign/thumbnail/'.$campaign->thumbnail).'" alt="">
                    </div>
                    <div class="text-content">
                        <div class="title">
                            <h5>'.$campaign->campaign_name.'</h5>
                        </div>
                        <div class="author">
                            <h5>For '.$campaign->created_for.'</h5>
                        </div>
                        <div class="progress-bar-wrapper common-progress-bar">
                            <div class="progress">
                                <div class="bar progress-bar-striped-custom" data-value="'.$campaign->donations->sum('amount').'" max-value="'.$campaign->target_amount.'">
                                    <div class="pct">
                                        Rs. '.$campaign->donations->sum('amount').'
                                    </div>
                                </div>
                            </div>
                            <p>Rs. '.$campaign->target_amount.'</p>
                        </div>
                    </div>
                </a>
            </div>
            ';
        }

        echo $output;
    }

    public function searchResults(Request $request){
        $key = $request->search;
        $page['title'] = 'Search | '.$key;
        $campaigns = Campaign::where('search', 'like', '%'.$key.'%')->where('status', 1)->with('donations')->limit(12)->get();
        return view('frontend.campaign.search')->with(compact('page', 'campaigns', 'key'));
    }

    public function editCampaign(Request $request, $slug){
        if($request->isMethod('get')) {
            $page['title'] = 'Campaign | Edit';
            $countries = Country::all();
            $categories = Category::all();
            $campaign = Campaign::where('user_id', Auth::user()->id)->where('slug', $slug)->with('location.state.country')->first();
            return view('frontend.campaign.edit')->with(compact('page', 'campaign', 'countries', 'categories'));
        }
        if ($request->isMethod('post')){
            $request->validate([
                'country' => 'required',
                'location_id' => 'required',
                'category_id' => 'required',
                'target_amount' => 'required',
                'campaign_name' => 'required',
                'body' => 'required',
                'stop_limit' => 'required',
                'created_for' => 'required',
            ]);
            $campaign = Campaign::where('slug', $slug)->where('user_id', Auth::user()->id)->first();
            $data['location_id'] = $request->location_id;
            $data['user_id'] = Auth::user()->id;
            $data['category_id'] = $request->category_id;
            $data['target_amount'] = $request->target_amount;
            $data['campaign_name'] = $request->campaign_name;
            $data['body'] = $request->body;
            $data['created_for'] = $request->created_for;
            $data['stop_limit'] = $request->stop_limit;
            $data['slug'] = SlugService::createSlug(Campaign::class, 'slug', $request->campaign_name);
            $city = City::where('id', $data['location_id'])->with('state.country')->first();
            $data['search'] = $data['campaign_name'].','.$data['created_for'].','.$city->name.','.$city->state->name.','.$city->state->country->name.','.$data['body'].','.$data['target_amount'];
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $uploadPath = public_path('uploads/campaign/thumbnail/');
                File::delete($uploadPath.$campaign->thumbnail);
                $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
            }
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $uploadPath = public_path('uploads/campaign/logo/');
                File::delete($uploadPath.$campaign->thumbnail);
                $data['logo'] = $this->fileUpload($file, $uploadPath);
            }
            try {
                $campaign->update($data);
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'something went wrong please try again!');
            }

            return redirect()->route('frontend.user.campaign')->with('success', 'Campaign Updated Successfully!');
        }
    }

    public function logoDelete($slug){
        $campaign = Campaign::where('slug', $slug)->where('user_id', Auth::user()->id)->first();
        File::delete(public_path('uploads/campaign/logo/').$campaign->logo);
        $data['logo'] = null;
        $campaign->update($data);
        return redirect()->back()->with('warning', 'Logo Removed!');
    }

    public function SearchMore(Request $request){
        $output = '';
        $key = $request->key;
        $campaigns = Campaign::where('search', 'like', '%'.$key.'%')->where('status', 1)->with('donations')->skip($request->searchCount)->take(12)->get();
        foreach ($campaigns as $campaign){
            $output .= '
            <div class="project-item" id="searchCount">
                <a href="'.route('frontend.campaign.detail', $campaign->slug).'">
                    <div class="img-container">
                        <img src="'.asset('uploads/campaign/thumbnail/'.$campaign->thumbnail).'" alt="">
                    </div>
                    <div class="text-content">
                        <div class="title">
                            <h5>'.$campaign->campaign_name.'</h5>
                        </div>
                        <div class="author">
                            <h5>For '.$campaign->created_for.'</h5>
                        </div>
                        <div class="progress-bar-wrapper common-progress-bar">
                            <div class="progress">
                                <div class="bar progress-bar-striped-custom" data-value="'.$campaign->donations->sum('amount').'" max-value="'.$campaign->target_amount.'">
                                    <div class="pct">
                                        Rs. '.$campaign->donations->sum('amount').'
                                    </div>
                                </div>
                            </div>
                            <p>Rs. '.$campaign->target_amount.'</p>
                        </div>
                    </div>
                </a>
            </div>
            ';
        }

        echo $output;
    }
}
