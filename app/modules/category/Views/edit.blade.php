@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Categories </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">category</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            <div class="page-header-actions">
            </div>
        </div>
        <div class="panel">
            <header class="panel-heading">
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <form role="form" action="{{ route('admin.categories.update', $category->id) }}"  method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
{{--                                    <label for="slug">Slug</label><input type="text" value = "{{$category->slug}}"  name="slug" id="slug" class="form-control" ></div><div class="form-group">--}}
                                    <label for="name">Name</label><input type="text" value = "{{$category->name}}"  name="name" id="name" class="form-control" ></div><div class="form-group">
                                    <label for="logo">Logo (upload to replace current file)</label><input type="file" accept=".jpeg, .png, .jpg" value = "{{$category->logo}}"  name="logo" id="logo" class="form-control" >
                                <img src="{{asset('uploads/category/logo/'.$category->logo)}}" width="200" height="200" alt="NO Image" class="img-thumbnail">
                            </div><div class="form-group">
                                    <label for="thumbnail">Thumbnail (upload to replace current file)</label><input type="file" accept=".jpeg, .png, .jpg" value = "{{$category->thumbnail}}"  name="thumbnail" id="thumbnail" class="form-control" >
                                <img src="{{asset('uploads/category/thumbnail/'.$category->thumbnail)}}" width="200" height="200" alt="NO Image" class="img-thumbnail">
                            </div><div class="form-group">
                                    <label for="status">Status</label><select name="status" id="status" class="form-control">
                                    @if($category->status == 0)
                                        <option value="0" selected>Inactive</option>
                                        <option value="1">Active</option>
                                    @else
                                        <option value="0">Inactive</option>
                                        <option value="1" selected>Active</option>
                                    @endif
                                </select>  </div><div class="form-group">
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$category->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" value = "{{$category->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$category->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id" value = "{{$category->id}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.categories') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
