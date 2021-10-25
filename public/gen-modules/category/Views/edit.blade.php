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
                    <form role="form" action="{{ route('admin.categories.update') }}"  method="post">
                        <div class="box-body">                
                            {{method_field('PATCH')}}            
                            <div class="form-group">
                                    <label for="slug">Slug</label><input type="text" value = "{{$category->slug}}"  name="slug" id="slug" class="form-control" ></div><div class="form-group">
                                    <label for="name">Name</label><input type="text" value = "{{$category->name}}"  name="name" id="name" class="form-control" ></div><div class="form-group">
                                    <label for="logo">Logo</label><input type="text" value = "{{$category->logo}}"  name="logo" id="logo" class="form-control" ></div><div class="form-group">
                                    <label for="thumbnail">Thumbnail</label><input type="text" value = "{{$category->thumbnail}}"  name="thumbnail" id="thumbnail" class="form-control" ></div><div class="form-group">
                                    <label for="status">Status</label><input type="text" value = "{{$category->status}}"  name="status" id="status" class="form-control" ></div><div class="form-group">
                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$category->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">
                                    <label for="created_at">Created_at</label><input type="text" value = "{{$category->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">
                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$category->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>
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
