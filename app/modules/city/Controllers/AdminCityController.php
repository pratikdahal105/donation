<?php

namespace App\Modules\City\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\State\Model\State;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\Modules\City\Model\City;

class AdminCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['title'] = 'City';
        return view("city::index",compact('page'));

        //
    }
    /**
     * Get datatable format json file.
     *
     *
     */

    public function getcitiesJson(Request $request)
    {
        $city = new City;
        $where = $this->_get_search_param($request);

        // For pagination
        $filterTotal = $city->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        } )->get();

        // Display limited list
        $rows = $city->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        })->limit($request->length)->offset($request->start)->get();

        //To count the total values present
        $total = $city->get();


        echo json_encode(['draw'=>$request['draw'],'recordsTotal'=>count($total),'recordsFiltered'=>count($filterTotal),'data'=>$rows]);


    }

    /**
     *Search Params
     *
     * @return \Illuminate\Http\Response
     */


    public function _get_search_param($params)
    {
        $where = null;
        foreach ($params['columns'] as $value) {
            if($value['searchable'] == 'true'){

                if($params['search']['value'] != '')
                {
                    $where[] = [ $value['name'], 'like' , "%".$params['search']['value']."%" ];
                }

                if($value['search']['value'] != '')
                {
                }
            }
        }

        return $where;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page['title'] = 'City | Create';
        return view("city::add",compact('page'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $success = City::Create($data);
        return redirect()->route('admin.cities');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::where('id', $id)->with('state', 'state.country')->first();
        $page['title'] = 'City | Update';
        return view("city::edit",compact('page','city'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method', 'country_id');
//        $data->timestamps = false;
        $success = City::where('id', $id)->update($data);
        return redirect()->route('admin.cities');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = City::where('id', $id)->delete();
        return redirect()->route('admin.cities');

        //
    }

    public function getstatesJson(Request $request){
        if(!isset($request->searchTerm)){
            $fetchData = State::select('*')->where('country_id', $request->country)->orderBy('name')->limit(5)->get();
        }
        else{
            $search = $request->searchTerm;
            $fetchData = State::select('*')->where('name','like','%'. $search .'%')->where('country_id', $request->country)->limit(5)->get();
        }
        $data = array();
        foreach ($fetchData as  $row){
            $data[] = array(
                'id' => $row->id,
                'text' => $row->name
            );
        }
        echo json_encode($data);
    }
}
