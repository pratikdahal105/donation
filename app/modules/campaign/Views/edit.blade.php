@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Campaigns </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.campaigns') }}">campaign</a></li>
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
                    <form role="form" action="{{ route('admin.campaigns.update', $campaign->id) }}"  method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
{{--                                    <label for="slug">Slug</label><input type="text" value = "{{$campaign->slug}}"  name="slug" id="slug" class="form-control" ></div><div class="form-group">--}}
                                <div class="form-group">
                                    <label for="category_id">Category_id</label>
                                    {{--                                        <input type="number"  class="form-control" >--}}
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option disabled>-- Select Category --</option>
                                        @foreach($categories as $category)
                                            @if($category->id == $campaign->category_id)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>                                    <label for="user_id">User_id</label><input type="number" value = "{{$campaign->user_id}}"  name="user_id" id="user_id" class="form-control" ></div><div class="form-group">
                                    <label for="campaign_name">Campaign_name</label><input type="text" value = "{{$campaign->campaign_name}}"  name="campaign_name" id="campaign_name" class="form-control" ></div><div class="form-group">
                                <label for="category_id">City</label>
                                <select class="form-control" name="location_id" id="location_id"  style="width: 100%" required>
                                    <option value="{{$campaign->location->id}}" selected>{{$campaign->location->name}}</option>
                                </select>
                            </div><div class="form-group">
                                    <label for="thumbnail">Thumbnail (upload to replace current file)</label><input type="file" accept=".jpeg, .png, .jpg" value = "{{$campaign->thumbnail}}"  name="thumbnail" id="thumbnail" class="form-control" >
                                <img src="{{asset('uploads/campaign/thumbnail/'.$campaign->thumbnail)}}" width="200" height="200" alt="NO Image" class="img-thumbnail">
                            </div><div class="form-group">
                                    <label for="video_url">Video_url</label><input type="text" value = "{{$campaign->video_url}}"  name="video_url" id="video_url" class="form-control" ></div><div class="form-group">
                                <label for="body">Body</label><textarea rows="10" type="text"  name="body" id="body" class="form-control" >{{$campaign->body}}</textarea></div><div class="form-group">
                                    <label for="target_amount">Target_amount</label><input type="number" value = "{{$campaign->target_amount}}"  name="target_amount" id="target_amount" class="form-control" ></div><div class="form-group">
                                    <label for="created_for">Created_for</label><input type="text" value = "{{$campaign->created_for}}"  name="created_for" id="created_for" class="form-control" ></div><div class="form-group">
                                    <label for="logo">Logo (upload to replace current file)</label><input type="file" accept=".jpeg, .png, .jpg" value = "{{$campaign->logo}}"  name="logo" id="logo" class="form-control" >
                                <img src="{{asset('uploads/campaign/logo/'.$campaign->logo)}}" width="200" height="200" alt="NO Image" class="img-thumbnail">
                            </div><div class="form-group">
                                    <label for="stop_limit">Stop_limit</label>
                                        <select name="stop_limit" id="stop_limit" class="form-control">
                                            @if($campaign->stop_limit == 0)
                                                <option value="0" selected>When Target Amount Is Reached</option>
                                                <option value="1">Unlimited</option>
                                            @else
                                                <option value="0">When Target Amount Is Reached</option>
                                                <option value="1" selected>Unlimited</option>
                                            @endif
                                        </select>
                                    </div><div class="form-group">                                    <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            @if($campaign->status == 0)
                                                <option value="0" selected>Pending Approval</option>
                                                <option value="1">Approved</option>
                                            @else
                                                <option value="0">Pending Approval</option>
                                                <option value="1" selected>Approved</option>
                                            @endif
                                        </select>                                    </div><div class="form-group">
                                    <label for="minimum_tip">Minimum_tip(%)</label><input type="number" min="0" max="30" value = "{{$campaign->minimum_tip}}"  name="minimum_tip" id="minimum_tip" class="form-control" ></div><div class="form-group">
{{--                                    <label for="search">Search</label><input type="text" value = "{{$campaign->search}}"  name="search" id="search" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$campaign->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" value = "{{$campaign->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$campaign->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id" value = "{{$campaign->id}}" />
                            {{ csrf_field() }}
                        </div>
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
