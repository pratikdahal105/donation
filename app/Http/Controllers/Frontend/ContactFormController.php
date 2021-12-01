<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    public function campaignContact(Request $request){
        $campaign = Campaign::where('slug', $request->campaign_slug)->with('user')->first();
        $data = [
          'to' => $campaign->user->email,
          'message' => $request->message,
          'subject' => 'Regarding '.$campaign->campaign_name,
          'email' => Auth::user()->email,
        ];
        dd($data);
        return redirect()->back()->with('success', 'Message Sent Successfully!');
    }
}
