@extends('admin.layout.main')
@section('content')

    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add Cities </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.cities') }}">cities</a></li>
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
                    <form role="form" action="{{ route('admin.cities.store') }}"  method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Country</label>
                                <select class="form-control" name="country_id" id="country_id"  style="width: 100%" required>
                                    <option value="" disabled selected>-- Select Country --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">State</label>
                                <select class="form-control" name="state_id" id="state_id"  style="width: 100%" required>
                                    <option value="" disabled selected>-- Select State --</option>
                                </select>
                            </div>
                            <label for="name">Name</label><input type="text" name="name" id="name" class="form-control" required></div><div class="form-group">
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.cities') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#state_id").prop('disabled', true);
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

        $('#country_id').on('change',function(){
            $("#state_id").prop('disabled', false);
            $("#state_id").select2({
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('admin.cities.getstatesjson')}}',
                    dataType: 'json',
                    type: "GET",
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term, country: $("#country_id").val(),
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
