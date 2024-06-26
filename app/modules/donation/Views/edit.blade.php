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
                    <form role="form" action="{{ route('admin.donations.update', $donation->id) }}"  method="post">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <label for="name">User_id</label>
                                <select class="form-control" name="user_id" id="user_id"  style="width: 100%" required>
                                    <option value="{{$donation->user->id}}" selected>{{$donation->user->email}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Campaign_id</label>
                                <select class="form-control" name="campaign_id" id="campaign_id"  style="width: 100%" required>
                                    <option value="{{$donation->campaign->id}}" selected>{{$donation->campaign->slug}}</option>
                                </select>
                            </div></div><div class="form-group">
                                    <label for="amount">Amount</label><input type="number" value = "{{$donation->amount}}"  name="amount" id="amount" class="form-control" ></div><div class="form-group">
                            <label for="tip">Tip</label><input type="number" value = "{{$donation->tip}}"  name="tip" id="tip" class="form-control" ></div>
                        <label for="remarks">Remarks</label><input type="text" value = "{{$donation->remarks}}"  name="remarks" id="remarks" class="form-control" ></div>
                            <div class="form-group">
                                <label for="anonymous">Anonymous</label>
                                <select name="anonymous" id="anonymous" class="form-control">
                                    @if($donation->anonymous == 0)
                                        <option value="0" selected>Not Anonymous</option>
                                        <option value="1">Anonymous</option>
                                    @else
                                        <option value="0">Not Anonymous</option>
                                        <option value="1" selected>Anonymous</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    @if($donation->status == 1)
                                        <option value="1" selected>Complete</option>
                                        <option value="0">Canceled/Refunded</option>
                                    @else
                                        <option value="1">Complete</option>
                                        <option value="0" selected>Canceled/Refunded</option>
                                    @endif
                                </select>
                            </div>
                        <div class="form-group">
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$donation->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" value = "{{$donation->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$donation->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>--}}
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

    <script>
        $(document).ready(function(){
            $("#campaign_id").select2({
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('admin.success_stories.getcampaignjson')}}',
                    dataType: 'json',
                    type: "GET",
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        $(document).ready(function(){
            $("#user_id").select2({
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('admin.donations.getuserjson')}}',
                    dataType: 'json',
                    type: "GET",
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endsection
