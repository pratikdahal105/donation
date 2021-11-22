<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
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
}
