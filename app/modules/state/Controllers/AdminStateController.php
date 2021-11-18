<?php

namespace App\Modules\State\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Country\Model\Country;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\Modules\State\Model\State;

class AdminStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['title'] = 'State';
        return view("state::index",compact('page'));

        //
    }
    /**
     * Get datatable format json file.
     *
     *
     */

    public function getstatesJson(Request $request)
    {
        $state = new State;
        $where = $this->_get_search_param($request);

        // For pagination
        $filterTotal = $state->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        } )->get();

        // Display limited list
        $rows = $state->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        })->with('country')->limit($request->length)->offset($request->start)->get();

        //To count the total values present
        $total = $state->get();


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
        $page['title'] = 'State | Create';
        return view("state::add",compact('page'));
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
        $success = State::Create($data);
        return redirect()->route('admin.states');
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
        $state = State::where('id', $id)->with('country')->first();
//        dd($state);
        $page['title'] = 'State | Update';
        return view("state::edit",compact('page','state'));

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
        $data = $request->except('_token', '_method');
        $success = State::where('id', $id)->update($data);
        return redirect()->route('admin.states');

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
        $success = State::where('id', $id)->delete();
        return redirect()->route('admin.states');

        //
    }

    public function getcountriesJson(Request $request){
        if(!isset($request->searchTerm)){
            $fetchData = Country::select('*')->orderBy('name')->limit(5)->get();
        }
        else{
            $search = $request->searchTerm;
            $fetchData = Country::select('*')->where('name','like','%'. $search .'%')->limit(5)->get();
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
