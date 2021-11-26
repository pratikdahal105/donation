<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function userProfile(Request $request){
        if ($request->isMethod('get')) {
            $page['title'] = 'User | Profile';
            $user = User::where('id', auth()->user()->id)->first();
            return view('frontend.user.profile')->with(compact('page', 'user'));
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,'.Auth::user()->id,
                'contact' => 'required',
            ]);
            $user = new User();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['contact'] = $request->contact;
            if($user->where('id', Auth::user()->id)->update($data)){
                return redirect()->back()->with('success', 'profile update successful!');
            }
        }
    }

    public function userPassword(Request $request){
        if($request->isMethod('get')) {
            $page['title'] = 'User | Password';
            return view('frontend.user.password')->with(compact('page'));
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);
            $user = new User();
            if(Hash::check($request->old_password, Auth::user()->password)){
                $data['password'] = Hash::make($request->password);
                if($user->where('id', Auth::user()->id)->update($data)){
                    return redirect()->back()->with('success', 'password update successful!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Password verification failed!');
            }
        }
    }

    public function campaignUser(Request $request){
        if($request->isMethod('get')) {
            $page['title'] = 'User | Campaign';
            $campaigns = Campaign::where('user_id', Auth::user()->id)->with('donations')->limit(12)->get();
            return view('frontend.user.campaign')->with(compact('page', 'campaigns'));
        }
    }

    public function loadMore(Request $request){
        $output = '';
        $campaigns = Campaign::where('user_id', Auth::user()->id)->with('donations')->skip($request->searchCount)->take(12)->get();
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
