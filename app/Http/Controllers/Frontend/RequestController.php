<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Category\Model\Category;
use App\Modules\City\Model\City;
use App\Modules\Country\Model\Country;
use App\Modules\State\Model\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function requestDonation(Request $request){
        $page['title'] = 'Campaign | Request';
        $countries = Country::all();
        $categories = Category::all();
        return view('frontend.campaign.request')->with(compact('page', 'countries', 'categories'));

    }

    public function getLocation(Request $request){
        if(!isset($request->searchTerm)){
            $country_id = $request->country;
            $fetchData = city::select('*')->with('state')->whereHas('state', function($q) use($country_id){
                $q->where('country_id', $country_id);
            })->orderBy('name')->limit(5)->get();
            $data = array();
            foreach ($fetchData as  $row){
                $data[] = array(
                    'id' => $row->id,
                    'text' => $row->state->name.', '.$row->name
                );
            }
        }
        else{
            $country_id = $request->country;
            $search = $request->searchTerm;
//            $fetchData = City::with('state')->where('name', 'like', '%'. $search .'%')->whereHas('state', function($q) use($search, $country_id){
//                $q->where('country_id', $country_id)->orWhere('name', 'like', '%'. $search .'%');
//            })
//            ->limit(5)
//            ->get();
            $fetchData = DB::select('SELECT cities.name AS city, cities.id, states.name AS state FROM cities JOIN states ON states.id = cities.state_id WHERE (cities.name LIKE "%'.$search.'%" OR states.name LIKE "%'.$search.'%") AND states.country_id = '.$country_id.' LIMIT 5');
            $data = array();
            foreach ($fetchData as  $row){
                $data[] = array(
                    'id' => $row->id,
                    'text' => $row->state.', '.$row->city
                );
            }
        }
        echo json_encode($data);
    }
}
