<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\City\Model\City;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function campaignDetail(Request $request, $slug){
        $page['title'] = 'Campaign | Details';
        $campaign = Campaign::where('slug', $slug)->with('user', 'donations.user')->first();
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

        return redirect()->back()->with('success', 'Campaign Created Successfully!');
    }

    public function fileUpload($file, $path){
        $ext = $file->getClientOriginalExtension();
        $imageName = md5(microtime()) . '.' . $ext;
        if (!$file->move($path, $imageName)) {
            return redirect()->back();
        }
        return $imageName;
    }
}
