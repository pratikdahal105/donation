@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Success_stories </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.success_stories') }}">success_story</a></li>
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
                    <form role="form" action="{{ route('admin.success_stories.update', $success_story->id) }}"  method="post">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <label for="name">Campaign_id</label>
                                <select class="form-control" name="campaign_id" id="campaign_id"  style="width: 100%" required>
                                    <option value="{{$success_story->campaign->id}}" selected>{{$success_story->campaign->slug}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="title">Title</label><input type="text" value = "{{$success_story->title}}"  name="title" id="title" class="form-control" ></div><div class="form-group">
                                <label for="body">Body</label><textarea type="text" name="body" id="body" class="form-control" >{{$success_story->body}}</textarea></div><div class="form-group">
                                    <label for="by">By</label><input type="text" value = "{{$success_story->by}}"  name="by" id="by" class="form-control" ></div><div class="form-group">
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$success_story->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" value = "{{$success_story->created_at}}"  name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" value = "{{$success_story->updated_at}}"  name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id" value = "{{$success_story->id}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.success_stories') }}" class="btn btn-danger">Cancel</a>
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
    </script>
@endsection
