<?php

namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use App\Modules\Category\Model\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page['title'] = 'Category';
        return view("category::index",compact('page'));

        //
    }
    /**
     * Get datatable format json file.
     *
     *
     */

    public function getcategoriesJson(Request $request)
    {
        $category = new Category;
        $where = $this->_get_search_param($request);

        // For pagination
        $filterTotal = $category->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        } )->get();

        // Display limited list
        $rows = $category->where( function($query) use ($where) {
            if($where !== null) {
                foreach($where as $val) {
                    $query->orWhere($val[0],$val[1],$val[2]);
                }
            }
        })->limit($request->length)->offset($request->start)->get();

        //To count the total values present
        $total = $category->get();


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
        $page['title'] = 'Category | Create';
        return view("category::add",compact('page'));
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
        $data['slug'] = SlugService::createSlug(Category::class, 'slug', $request->name);
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $uploadPath = public_path('uploads/category/thumbnail/');
            $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $uploadPath = public_path('uploads/category/logo/');
            $data['logo'] = $this->fileUpload($file, $uploadPath);
        }
        $success = Category::Create($data);
        return redirect()->route('admin.categories');
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
        $category = Category::findOrFail($id);
        $page['title'] = 'Category | Update';
        return view("category::edit",compact('page','category'));

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
        $category = Category::where('id', $id)->first();
        $data = $request->except('_token', '_method', 'thumbnail', 'logo');
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $uploadPath = public_path('uploads/category/thumbnail/');
            File::delete($uploadPath.$category->thumbnail);
            $data['thumbnail'] = $this->fileUpload($file, $uploadPath);
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $uploadPath = public_path('uploads/category/logo/');
            File::delete($uploadPath.$category->logo);
            $data['logo'] = $this->fileUpload($file, $uploadPath);
        }
        $success = $category->update($data);
        return redirect()->route('admin.categories');

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
        $category = Category::where('id', $id)->first();
        File::delete(public_path('uploads/category/logo/').$category->logo);
        File::delete(public_path('uploads/category/thumbnail/').$category->thumbnail);
        $success = $category->delete();
        return redirect()->route('admin.categories');

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
