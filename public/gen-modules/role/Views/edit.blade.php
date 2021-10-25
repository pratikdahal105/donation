@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Roles </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.roles') }}">roles</a></li>
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
                    <form role="form" action="{{ route('admin.roles.update') }}"  method="post">
                        <div class="box-body">                
                            {{method_field('PATCH')}}            
                            <div class="form-group">
                                    <label for="name">Name</label><input type="text" value = "{{$role->name}}"  name="name" id="name" class="form-control" ></div><div class="form-group">
                                    <label for="display_name">Display_name</label><input type="text" value = "{{$role->display_name}}"  name="display_name" id="display_name" class="form-control" ></div><div class="form-group">
                                    <label for="description">Description</label><input type="text" value = "{{$role->description}}"  name="description" id="description" class="form-control" ></div><div class="form-group">
                                    <label for="created_at">Created_at</label><input type="text" value = "{{$role->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">
                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$role->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>
<input type="hidden" name="id" id="id" value = "{{$role->id}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.roles') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
