@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Cities </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.cities') }}">cities</a></li>
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
                    <form role="form" action="{{ route('admin.cities.update', $city->id) }}"  method="post">
                        <div class="box-body">
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <label for="name">Country</label>
                                <select class="form-control" name="country_id" id="country_id"  style="width: 100%" required>
                                    <option value="{{$city->state->country->id}}" selected>{{$city->state->country->name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">State</label>
                                <select class="form-control" name="state_id" id="state_id"  style="width: 100%" required>
                                    <option value="{{$city->state->id}}" selected>{{$city->state->name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="name">Name</label><input type="text" value = "{{$city->name}}"  name="name" id="name" class="form-control" required></div><div class="form-group">
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" value = "{{$city->deleted_at}}"  name="deleted_at" id="deleted_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id" value = "{{$city->id}}" />
                            {{ csrf_field() }}
                        </div>
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

        $(document).ready(function(){
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
