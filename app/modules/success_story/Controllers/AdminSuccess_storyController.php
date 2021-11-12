<?php

namespace App\Modules\Success_story\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Campaign\Model\Campaign;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\Modules\Success_story\Model\Success_story;

class AdminSuccess_storyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['title'] = 'Success_story';
        return view("success_story::index",compact('page'));

        //
    }
    /**
     * Get datatable format json file.
     *
     *
     */

    public function getsuccess_storiesJson(Request $request)
    {
        $success_story = new Success_story;
        $where = $this->_get_search_param($request);

        // For pagination
        $filterTotal = $success_story->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        } )->get();

        // Display limited list
        $rows = $success_story->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        })->limit($request->length)->offset($request->start)->orderBy('id', 'Desc')->get();

        //To count the total values present
        $total = $success_story->get();


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
        $page['title'] = 'Success_story | Create';
        return view("success_story::add",compact('page'));
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
        $data['slug'] = SlugService::createSlug(Success_story::class, 'slug', $request->title);
        $success = Success_story::Create($data);
        return redirect()->route('admin.success_stories');
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
        $success_story = Success_story::where('id',$id)->with('campaign')->first();
        $page['title'] = 'Success_story | Update';
        return view("success_story::edit",compact('page','success_story'));

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
        $data = $request->except('_token', '_method', 'files');
        $success = Success_story::where('id', $id)->update($data);
        return redirect()->route('admin.success_stories');

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
        $success = Success_story::where('id', $id)->delete();
        return redirect()->route('admin.success_stories');

        //
    }

    public function getcampaignJson(Request $request){
        if(!isset($request->searchTerm)){
            $fetchData = Campaign::select('*')->orderBy('name')->limit(5)->get();
        }
        else{
            $search = $request->searchTerm;
            $fetchData = Campaign::select('*')->where('slug','like','%'. $search .'%')->limit(5)->get();
        }
        $data = array();
        foreach ($fetchData as  $row){
            $data[] = array(
                'id' => $row->id,
                'text' => $row->slug
            );
        }
        echo json_encode($data);
    }
}
