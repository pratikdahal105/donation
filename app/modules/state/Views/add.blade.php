@extends('admin.layout.main')
@section('content')

    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add States </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.states') }}">states</a></li>
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
                    <form role="form" action="{{ route('admin.states.store') }}"  method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    <select class="form-control" name="country_id" id="country_id"  style="width: 100%" required>
                                        <option value="" disabled selected>-- Select Country --</option>
                                    </select>
                                </div>
                                    <label for="name">Name</label><input type="text" name="name" id="name" class="form-control" required></div>
{{--                            <div class="form-group">--}}
{{--                                    <label for="country_id">Country_id</label><input type="text" name="country_id" id="country_id" class="form-control" ></div>--}}
{{--                            <div class="form-group">--}}
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.states') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("#country_id").select2({
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('admin.states.getcountriesjson')}}',
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
