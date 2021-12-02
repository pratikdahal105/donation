<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\CampaignContactMail;
use App\Modules\Campaign\Model\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function campaignContact(Request $request){
        $campaign = Campaign::where('slug', $request->campaign_slug)->with('user')->first();
        if(!$request->filter){
            $data = [
                'to' => 'pratikdahal105@gmail.com',
//                'to' => $campaign->user->email,
                'message' => $request->message,
                'subject' => 'Regarding '.$campaign->campaign_name.' Fundraiser',
                'email' => Auth::user()->email,
            ];
            if(Mail::to($data['to'])->send(new CampaignContactMail($data))){
                return redirect()->back()->with('success', 'Message Sent Successfully!');
            }else{
                return redirect()->back()->with('error', 'Message failed!');
            }
//            try {
//                Mail::to($data['to'])->send(new CampaignContactMail($data));
//            }catch (\Exception $e){
//                return redirect()->back()->with('error', $e->getMessage());
//            }
//
//            return redirect()->back()->with('success', "Sent!");
        }
    }
}
