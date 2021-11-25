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
}
