@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Bank_details </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.bank_details') }}">bank_detail</a></li>
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
                    <form role="form" action="{{ route('admin.bank_details.update') }}"  method="post">
                        <div class="box-body">                
                            {{method_field('PATCH')}}            
                            <div class="form-group">
                                    <label for="campaign_id">Campaign_id</label><input type="text" value = "{{$bank_detail->campaign_id}}"  name="campaign_id" id="campaign_id" class="form-control" ></div><div class="form-group">
                                    <label for="bank_name">Bank_name</label><input type="text" value = "{{$bank_detail->bank_name}}"  name="bank_name" id="bank_name" class="form-control" ></div><div class="form-group">
                                    <label for="bank_branch">Bank_branch</label><input type="text" value = "{{$bank_detail->bank_branch}}"  name="bank_branch" id="bank_branch" class="form-control" ></div><div class="form-group">
                                    <label for="acc_type">Acc_type</label><input type="text" value = "{{$bank_detail->acc_type}}"  name="acc_type" id="acc_type" class="form-control" ></div><div class="form-group">
                                    <label for="routing_number">Routing_number</label><input type="text" value = "{{$bank_detail->routing_number}}"  name="routing_number" id="routing_number" class="form-control" ></div><div class="form-group">
                                    <label for="acc_number">Acc_number</label><input type="text" value = "{{$bank_detail->acc_number}}"  name="acc_number" id="acc_number" class="form-control" ></div><div class="form-group">
                                    <label for="bic_swift">Bic_swift</label><input type="text" value = "{{$bank_detail->bic_swift}}"  name="bic_swift" id="bic_swift" class="form-control" ></div><div class="form-group">
                                    <label for="acc_holder_name">Acc_holder_name</label><input type="text" value = "{{$bank_detail->acc_holder_name}}"  name="acc_holder_name" id="acc_holder_name" class="form-control" ></div><div class="form-group">
                                    <label for="recipient_address">Recipient_address</label><input type="text" value = "{{$bank_detail->recipient_address}}"  name="recipient_address" id="recipient_address" class="form-control" ></div><div class="form-group">
                                    <label for="transfer_reason">Transfer_reason</label><input type="text" value = "{{$bank_detail->transfer_reason}}"  name="transfer_reason" id="transfer_reason" class="form-control" ></div><div class="form-group">
                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$bank_detail->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">
                                    <label for="created_at">Created_at</label><input type="text" value = "{{$bank_detail->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">
                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$bank_detail->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>
<input type="hidden" name="id" id="id" value = "{{$bank_detail->id}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.bank_details') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
