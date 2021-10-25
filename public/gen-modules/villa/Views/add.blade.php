@extends('admin.layout.main')
@section('content')
    
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add Villas </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.villas') }}">tbl_villas</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
            <div class="page-header-actions">
            </div>
        </div>
        <div class="panel">
            <header class="panel-heading">
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <form role="form" action="{{ route('admin.villas.store') }}"  method="post">
                        <div class="box-body">                
                            <div class="form-group">
                                    <label for="name">Name</label><input type="text" name="name" id="name" class="form-control" ></div><div class="form-group">
                                    <label for="cover_id">Cover_id</label><input type="text" name="cover_id" id="cover_id" class="form-control" ></div><div class="form-group">
                                    <label for="description">Description</label><input type="text" name="description" id="description" class="form-control" ></div><div class="form-group">
                                    <label for="slug">Slug</label><input type="text" name="slug" id="slug" class="form-control" ></div><div class="form-group">
                                    <label for="no_of_guests">No_of_guests</label><input type="text" name="no_of_guests" id="no_of_guests" class="form-control" ></div><div class="form-group">
                                    <label for="no_of_pools">No_of_pools</label><input type="text" name="no_of_pools" id="no_of_pools" class="form-control" ></div><div class="form-group">
                                    <label for="wifi">Wifi</label><input type="text" name="wifi" id="wifi" class="form-control" ></div><div class="form-group">
                                    <label for="bedrooms">Bedrooms</label><input type="text" name="bedrooms" id="bedrooms" class="form-control" ></div><div class="form-group">
                                    <label for="bathrooms">Bathrooms</label><input type="text" name="bathrooms" id="bathrooms" class="form-control" ></div><div class="form-group">
                                    <label for="latitude">Latitude</label><input type="text" name="latitude" id="latitude" class="form-control" ></div><div class="form-group">
                                    <label for="longitude">Longitude</label><input type="text" name="longitude" id="longitude" class="form-control" ></div><div class="form-group">
                                    <label for="location">Location</label><input type="text" name="location" id="location" class="form-control" ></div><div class="form-group">
                                    <label for="security">Security</label><input type="text" name="security" id="security" class="form-control" ></div><div class="form-group">
                                    <label for="tripadvisor_link">Tripadvisor_link</label><input type="text" name="tripadvisor_link" id="tripadvisor_link" class="form-control" ></div><div class="form-group">
                                    <label for="tv_satellite">Tv_satellite</label><input type="text" name="tv_satellite" id="tv_satellite" class="form-control" ></div><div class="form-group">
                                    <label for="cars">Cars</label><input type="text" name="cars" id="cars" class="form-control" ></div><div class="form-group">
                                    <label for="status">Status</label><input type="text" name="status" id="status" class="form-control" ></div><div class="form-group">
                                    <label for="sequence">Sequence</label><input type="text" name="sequence" id="sequence" class="form-control" ></div><div class="form-group">
                                    <label for="del_flag">Del_flag</label><input type="text" name="del_flag" id="del_flag" class="form-control" ></div><div class="form-group">
                                    <label for="created_at">Created_at</label><input type="text" name="created_at" id="created_at" class="form-control" ></div><div class="form-group">
                                    <label for="updated_at">Updated_at</label><input type="text" name="updated_at" id="updated_at" class="form-control" ></div><div class="form-group">
                                    <label for="created_by">Created_by</label><input type="text" name="created_by" id="created_by" class="form-control" ></div><div class="form-group">
                                    <label for="updated_by">Updated_by</label><input type="text" name="updated_by" id="updated_by" class="form-control" ></div>
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.villas') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
