@extends('admin.layout.main')
@section('content')
    
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add Campaigns </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.campaigns') }}">campaign</a></li>
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
                    <form role="form" action="{{ route('admin.campaigns.store') }}"  method="post">
                        <div class="box-body">                
                            <div class="form-group">
                                    <label for="slug">Slug</label><input type="text" name="slug" id="slug" class="form-control" ></div><div class="form-group">
                                    <label for="category_id">Category_id</label><input type="text" name="category_id" id="category_id" class="form-control" ></div><div class="form-group">
                                    <label for="user_id">User_id</label><input type="text" name="user_id" id="user_id" class="form-control" ></div><div class="form-group">
                                    <label for="campaign_name">Campaign_name</label><input type="text" name="campaign_name" id="campaign_name" class="form-control" ></div><div class="form-group">
                                    <label for="location_id">Location_id</label><input type="text" name="location_id" id="location_id" class="form-control" ></div><div class="form-group">
                                    <label for="thumbnail">Thumbnail</label><input type="text" name="thumbnail" id="thumbnail" class="form-control" ></div><div class="form-group">
                                    <label for="video_url">Video_url</label><input type="text" name="video_url" id="video_url" class="form-control" ></div><div class="form-group">
                                    <label for="body">Body</label><input type="text" name="body" id="body" class="form-control" ></div><div class="form-group">
                                    <label for="target_amount">Target_amount</label><input type="text" name="target_amount" id="target_amount" class="form-control" ></div><div class="form-group">
                                    <label for="created_for">Created_for</label><input type="text" name="created_for" id="created_for" class="form-control" ></div><div class="form-group">
                                    <label for="logo">Logo</label><input type="text" name="logo" id="logo" class="form-control" ></div><div class="form-group">
                                    <label for="publish_date">Publish_date</label><input type="text" name="publish_date" id="publish_date" class="form-control" ></div><div class="form-group">
                                    <label for="stop_limit">Stop_limit</label><input type="text" name="stop_limit" id="stop_limit" class="form-control" ></div><div class="form-group">
                                    <label for="status">Status</label><input type="text" name="status" id="status" class="form-control" ></div><div class="form-group">
                                    <label for="minimum_tip">Minimum_tip</label><input type="text" name="minimum_tip" id="minimum_tip" class="form-control" ></div><div class="form-group">
                                    <label for="search">Search</label><input type="text" name="search" id="search" class="form-control" ></div><div class="form-group">
                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">
                                    <label for="created_at">Created_at</label><input type="text" name="created_at" id="created_at" class="form-control" ></div><div class="form-group">
                                    <label for="updated_at">Updated_at</label><input type="text" name="updated_at" id="updated_at" class="form-control" ></div>
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.campaigns') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
