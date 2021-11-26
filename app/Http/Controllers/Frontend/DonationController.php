<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\Donation\Model\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class DonationController extends Controller
{
    public function donate($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();
        $page['title'] = 'Campaign | Donation Paypal';
        Session::put('slug', $slug);
        return view('frontend.donation.make_donation', compact('page', 'campaign'));
    }

    public function donationRequest(Request $request){
        $request->validate([
            'actual_amount' => 'required',
        ]);
        $request['user_id'] = Auth::user()->id;
        if($request->anonymous){
            $request['anonymous'] = 1;
        } else{
            $request['anonymous'] = 0;
        }
        if($request->notification){
            $request['notification'] = 1;
        } else{
            $request['notification'] = 0;
        }
//        Session::forget('donation');
        Session::put('donation', $request->all());

        return redirect()->route('paypalPost');
    }

    public function loadMore(Request $request){
        $output = '';
        $donations = Donation::where('campaign_id', $request->campaign_id)->orderBy('created_at', 'DESC')->skip($request->countDonation)->take(6)->get();

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
                            <h4>Donated Rs.'.$donation->amount.'</h4>
                        </div>
                        <div class="comment">
                            <p>'.$donation->remarks.'</p>
                        </div>
                        <p>('.$donation->created_at->diffForHumans().')</p>
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
                            <h4>Donated Rs. '.$donation->amount.'}}</h4>
                        </div>
                        <div class="comment">
                            <p>'.$donation->remarks.'</p>
                        </div>
                        <p>('.$donation->created_at->diffForHumans().')</p>
                    </div>
                </div>
            ';
            }
        }

        echo $output;
    }

    public function userDonation(Request $request, $slug){
        if($request->isMethod('get')){
            $page['title'] = 'Donation | Edit';
            $donation = Donation::where('slug', $slug)->where('user_id', Auth::user()->id)->first();
            return view('frontend.donation.edit', compact('page', 'donation'));
        }
        if($request->isMethod('post')){
            $donation = Donation::where('slug', $slug)->where('user_id', Auth::user()->id)->first();
            $data['remarks'] = $request->remarks;
            $data['anonymous'] = $request->anonymous;
            $donation->update($data);
            return redirect()->route('frontend.user.donation')->with('success', 'record successfully updated!');
        }
    }
}
