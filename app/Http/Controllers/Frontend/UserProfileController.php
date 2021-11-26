<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\Category\Model\Category;
use App\Modules\Country\Model\Country;
use App\Modules\Donation\Model\Donation;
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
            if($campaign->status == 1){
                $output .= '
                <div class="project-item" id="searchCount">
                    <a href="'.route('frontend.campaign.detail', $campaign->slug).'">
                        <div class="img-container">
                            <img src="'.asset('uploads/campaign/thumbnail/'.$campaign->thumbnail).'" alt="">
                        </div>
                        <div class="text-content">
                            <div class="title">
                                <h5>'.$campaign->campaign_name.'</h5>
                                <div class="dot-nav">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class="nav-content">
                                        <p><a href="">Post Updates</a></p>
                                        <p><a href="">Edit</a></p>
                                    </div>
                                </div>
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
            else{
                $output .= '
                <div class="project-item" id="searchCount">
                    <a href="'.route('frontend.campaign.detail', $campaign->slug).'">
                        <div class="img-container">
                            <img src="'.asset('uploads/campaign/thumbnail/'.$campaign->thumbnail).'" alt="">
                        </div>
                        <div class="text-content">
                            <div class="title">
                                <h5>'.$campaign->campaign_name.'</h5>
                                <div class="dot-nav">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class="nav-content">
                                        <p><a href="">Edit</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="author">
                                <h5>For '.$campaign->created_for.'</h5>
                            </div>
                            <div class="progress-bar-wrapper common-progress-bar">
                                <h3 style="color:#de0d0d">Pending Approval</h3>
                                <p>Target: Rs. '.$campaign->target_amount.'</p>
                            </div>
                        </div>
                    </a>
                </div>
                ';
            }
        }

        echo $output;
    }

    public function userDonation(){
        $page['title'] = 'User | Donation';
        $donations = Donation::where('user_id', Auth::user()->id)->with('campaign')->limit(6)->get();
        return view('frontend.user.donation')->with(compact('page', 'donations'));
    }

    public function moreUserDonation(Request $request){
        $output = '';
        $donations = Donation::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->skip($request->countDonation)->take(6)->get();

        foreach ($donations as $donation){
            if($donation->anonymous != 1){
                $output .= '
                <div class="donation-item" id="countDonation">
                    <div class="img-container">
                        <img src="'.asset('client_assets').'/img/menu-icon/09-Doctor.png">
                    </div>
                    <div class="text">
                        <div class="amount">
                            <h3>'.$donation->user->name.'</h3>
                            <h4>Donated Rs.'.$donation->amount.' (For <a href="'.route('frontend.campaign.detail', $donation->campaign->slug).'" style="color: #c40000">'.$donation->campaign->campaign_name.'</a>)</h4>
                        </div>
                        <div class="comment">
                            <p>'.$donation->remarks.'</p>
                        </div>
                        <p>('.$donation->created_at->diffForHumans().')</p>
                        <a type="button" class="covid-btn btn-red" href="'.route('frontend.user.donation.edit', $donation->slug).'">Edit</a>
                        <span><b>Reference No: '.$donation->reference_no.'</b></span>
                    </div>
                </div>
            ';
            }else{
                $output .= '
                <div class="donation-item" id="countDonation">
                    <div class="img-container">
                        <img src="'.asset('client_assets').'/img/menu-icon/09-Doctor.png">
                    </div>
                    <div class="text">
                        <div class="amount">
                            <h3>Anonymous</h3>
                            <h4>Donated Rs. '.$donation->amount.'  (For <a href="'.route('frontend.campaign.detail', $donation->campaign->slug).'" style="color: #c40000">'.$donation->campaign->campaign_name.'</a>)</h4>
                        </div>
                        <div class="comment">
                            <p>'.$donation->remarks.'</p>
                        </div>
                        <p>('.$donation->created_at->diffForHumans().')</p>
                        <a type="button" class="covid-btn btn-red" href="'.route('frontend.user.donation.edit', $donation->slug).'">Edit</a>
                        <span><b>Reference No: '.$donation->reference_no.'</b></span>
                    </div>
                </div>
            ';
            }
        }

        echo $output;
    }
}
