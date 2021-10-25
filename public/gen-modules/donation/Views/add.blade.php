@extends('admin.layout.main')
@section('content')
    
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add Donations </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.donations') }}">donation</a></li>
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
                    <form role="form" action="{{ route('admin.donations.store') }}"  method="post">
                        <div class="box-body">                
                            <div class="form-group">
                                    <label for="slug">Slug</label><input type="text" name="slug" id="slug" class="form-control" ></div><div class="form-group">
                                    <label for="reference_no">Reference_no</label><input type="text" name="reference_no" id="reference_no" class="form-control" ></div><div class="form-group">
                                    <label for="user_id">User_id</label><input type="text" name="user_id" id="user_id" class="form-control" ></div><div class="form-group">
                                    <label for="campaign_id">Campaign_id</label><input type="text" name="campaign_id" id="campaign_id" class="form-control" ></div><div class="form-group">
                                    <label for="amount">Amount</label><input type="text" name="amount" id="amount" class="form-control" ></div><div class="form-group">
                                    <label for="remarks">Remarks</label><input type="text" name="remarks" id="remarks" class="form-control" ></div><div class="form-group">
                                    <label for="anonymous">Anonymous</label><input type="text" name="anonymous" id="anonymous" class="form-control" ></div><div class="form-group">
                                    <label for="status">Status</label><input type="text" name="status" id="status" class="form-control" ></div><div class="form-group">
                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">
                                    <label for="created_at">Created_at</label><input type="text" name="created_at" id="created_at" class="form-control" ></div><div class="form-group">
                                    <label for="updated_at">Updated_at</label><input type="text" name="updated_at" id="updated_at" class="form-control" ></div>
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.donations') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
