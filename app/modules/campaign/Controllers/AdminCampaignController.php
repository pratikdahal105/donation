<?php

namespace App\Modules\Campaign\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Model\Category;
use Auth;
use File;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\Modules\Campaign\Model\Campaign;

class AdminCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['title'] = 'Campaign';
        return view("campaign::index",compact('page'));

        //
    }
    /**
     * Get datatable format json file.
     *
     *
     */

    public function getcampaignsJson(Request $request)
    {
        $campaign = new Campaign;
        $where = $this->_get_search_param($request);

        // For pagination
        $filterTotal = $campaign->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        } )->get();

        // Display limited list
        $rows = $campaign->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        })->limit($request->length)->offset($request->start)->get();

        //To count the total values present
        $total = $campaign->get();


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
        $page['title'] = 'Campaign | Create';
        $categories = Category::select('name','id')->get();
        return view("campaign::add",compact('page', 'categories'));
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
        $data['slug'] = SlugService::createSlug(Campaign::class, 'slug', $request->campaign_name);
        $data['user_id'] = Auth::id();
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $uploadPath = public_path('uploads/campaign/thumbnail/');
            $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $uploadPath = public_path('uploads/campaign/logo/');
            $data['logo'] = $this->fileUpload($file, $uploadPath);
        }
//        dd($data);
        $success = Campaign::Create($data);
        return redirect()->route('admin.campaigns');
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
        $campaign = Campaign::findOrFail($id);
        $categories = Category::select('name','id')->get();
        $page['title'] = 'Campaign | Update';
        return view("campaign::edit",compact('page','campaign', 'categories'));

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
        $campaign = Campaign::where('id', $id)->first();
        $data = $request->except('_token', '_method', 'thumbnail', 'logo');
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $uploadPath = public_path('uploads/campaign/thumbnail/');
            File::delete($uploadPath.$campaign->thumbnail);
            $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $uploadPath = public_path('uploads/campaign/logo/');
            File::delete($uploadPath.$campaign->logo);
            $data['logo'] = $this->fileUpload($file, $uploadPath);
        }
        $success = $campaign->update($data);
        return redirect()->route('admin.campaigns');

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
        $campaign = Campaign::where('id', $id)->first();
        File::delete(public_path('uploads/campaign/logo/').$campaign->logo);
        File::delete(public_path('uploads/campaign/thumbnail/').$campaign->thumbnail);
        $success = $campaign->delete();
        return redirect()->route('admin.campaigns');

        //
    }

    public function fileUpload($file, $path){
        $ext = $file->getClientOriginalExtension();
        $imageName = md5(microtime()) . '.' . $ext;
        if (!$file->move($path, $imageName)) {
            return redirect()->back();
        }
        return $imageName;
    }
}