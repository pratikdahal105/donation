@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Donations </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.donations') }}">donation</a></li>
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
                    <form role="form" action="{{ route('admin.donations.update') }}"  method="post">
                        <div class="box-body">                
                            {{method_field('PATCH')}}            
                            <div class="form-group">
                                    <label for="slug">Slug</label><input type="text" value = "{{$donation->slug}}"  name="slug" id="slug" class="form-control" ></div><div class="form-group">
                                    <label for="reference_no">Reference_no</label><input type="text" value = "{{$donation->reference_no}}"  name="reference_no" id="reference_no" class="form-control" ></div><div class="form-group">
                                    <label for="user_id">User_id</label><input type="text" value = "{{$donation->user_id}}"  name="user_id" id="user_id" class="form-control" ></div><div class="form-group">
                                    <label for="campaign_id">Campaign_id</label><input type="text" value = "{{$donation->campaign_id}}"  name="campaign_id" id="campaign_id" class="form-control" ></div><div class="form-group">
                                    <label for="amount">Amount</label><input type="text" value = "{{$donation->amount}}"  name="amount" id="amount" class="form-control" ></div><div class="form-group">
                                    <label for="remarks">Remarks</label><input type="text" value = "{{$donation->remarks}}"  name="remarks" id="remarks" class="form-control" ></div><div class="form-group">
                                    <label for="anonymous">Anonymous</label><input type="text" value = "{{$donation->anonymous}}"  name="anonymous" id="anonymous" class="form-control" ></div><div class="form-group">
                                    <label for="status">Status</label><input type="text" value = "{{$donation->status}}"  name="status" id="status" class="form-control" ></div><div class="form-group">
                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$donation->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">
                                    <label for="created_at">Created_at</label><input type="text" value = "{{$donation->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">
                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$donation->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div><div class="form-group">
                                    <label for="tip">Tip</label><input type="text" value = "{{$donation->tip}}"  name="tip" id="tip" class="form-control" ></div>
<input type="hidden" name="id" id="id" value = "{{$donation->id}}" />
                            {{ csrf_field() }}
                        </div>
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
