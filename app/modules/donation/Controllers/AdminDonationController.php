<?php

namespace App\Modules\Donation\Controllers;

use App\Core_modules\User\Model\User;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\Modules\Donation\Model\Donation;

class AdminDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['title'] = 'Donation';
        return view("donation::index",compact('page'));

        //
    }
    /**
     * Get datatable format json file.
     *
     *
     */

    public function getdonationsJson(Request $request)
    {
        $donation = new Donation;
        $where = $this->_get_search_param($request);

        // For pagination
        $filterTotal = $donation->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        } )->get();

        // Display limited list
        $rows = $donation->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        })->limit($request->length)->offset($request->start)->get();

        //To count the total values present
        $total = $donation->get();


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
        $page['title'] = 'Donation | Create';
        return view("donation::add",compact('page'));
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
        $data['reference_no'] = $this->referenceNumber();
        $data['slug'] = base64_encode($data['reference_no']);
        $success = Donation::Create($data);
        return redirect()->route('admin.donations');
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
        $donation = Donation::where('id',$id)->with('campaign', 'user')->first();
        $page['title'] = 'Donation | Update';
        return view("donation::edit",compact('page','donation'));

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
        $success = Donation::where('id', $id)->update($data);
        return redirect()->route('admin.donations');

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
        $success = Donation::where('id', $id)->delete();
        return redirect()->route('admin.donations');

        //
    }

    public function getuserJson(Request $request){
        if(!isset($request->searchTerm)){
            $fetchData = User::select('*')->orderBy('name')->limit(5)->get();
        }
        else{
            $search = $request->searchTerm;
            $fetchData = User::select('*')->where('email','like','%'. $search .'%')->limit(5)->get();
        }
        $data = array();
        foreach ($fetchData as  $row){
            $data[] = array(
                'id' => $row->id,
                'text' => $row->email
            );
        }
        echo json_encode($data);
    }

    public function referenceNumber(){
        $reference = date("Y").uniqid();
        if(Donation::where('reference_no', $reference)->exists()){
            return $this->referenceNumber();
        }
        else{
            return $reference;
        }
    }
}
