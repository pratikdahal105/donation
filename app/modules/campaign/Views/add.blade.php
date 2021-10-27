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
                    <form role="form" action="{{ route('admin.campaigns.store') }}"  method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
{{--                                    <label for="slug">Slug</label><input type="text" name="slug" id="slug" class="form-control" ></div>--}}
                            </div>
                                    <div class="form-group">
                                        <label for="category_id">Category_id</label>
{{--                                        <input type="number"  class="form-control" >--}}
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option disabled selected>-- Select Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="user_id">User_id</label><input type="text" name="user_id" id="user_id" class="form-control" ></div><div class="form-group">
                                    <label for="campaign_name">Campaign_name</label><input type="text" name="campaign_name" id="campaign_name" class="form-control" ></div>
                                    <div class="form-group">
                                        <label for="category_id">City</label>
                                        <select class="form-control" name="location_id" id="location_id"  style="width: 100%" required>
                                            <option value="" disabled selected>-- Select City --</option>
                                        </select>
                                    </div>
                            <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label><input type="file" accept=".jpeg, .png, .jpg" name="thumbnail" id="thumbnail" class="form-control" ></div><div class="form-group">
                                    <label for="video_url">Video_url</label><input type="text" name="video_url" id="video_url" class="form-control" ></div><div class="form-group">
                                <label for="body">Body</label><textarea rows="10" type="text" name="body" id="body" class="form-control" ></textarea></div><div class="form-group">
                                    <label for="target_amount">Target_amount</label><input type="number" name="target_amount" id="target_amount" class="form-control" ></div><div class="form-group">
                                    <label for="created_for">Created_for</label><input type="text" name="created_for" id="created_for" class="form-control" ></div><div class="form-group">
                                    <label for="logo">Logo</label><input type="file" accept=".jpeg, .png, .jpg" name="logo" id="logo" class="form-control" ></div><div class="form-group">
                                    <label for="stop_limit">Stop_limit</label>
                                    <select name="stop_limit" id="stop_limit" class="form-control">
                                        <option value="0" selected>When Target Amount Is Reached</option>
                                        <option value="1">Unlimited</option>
                                    </select>
                                    </div><div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0" selected>Pending Approval</option>
                                        <option value="1">Approved</option>
                                    </select>
                                    </div><div class="form-group">
                                    <label for="minimum_tip">Minimum_tip(%)</label><input min="0" max="30" type="number" name="minimum_tip" id="minimum_tip" class="form-control" >
{{--                                </div><div class="form-group">--}}
{{--                                    <label for="search">Search</label><input type="text" name="search" id="search" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" name="updated_at" id="updated_at" class="form-control" ></div>--}}
                                    </div>
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
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#location_id').select2();
        // });
        $(document).ready(function() {
            $('#body').summernote();
        });

        $(document).ready(function(){
            $("#location_id").select2({
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('admin.campaigns.getcitiesjson')}}',
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
