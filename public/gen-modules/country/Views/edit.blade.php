@extends('admin.layout.main')
@section('content')
    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Countries </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.countries') }}">countries</a></li>
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
                    <form role="form" action="{{ route('admin.countries.update') }}"  method="post">
                        <div class="box-body">                
                            {{method_field('PATCH')}}            
                            <div class="form-group">
                                    <label for="code">Code</label><input type="text" value = "{{$country->code}}"  name="code" id="code" class="form-control" ></div><div class="form-group">
                                    <label for="name">Name</label><input type="text" value = "{{$country->name}}"  name="name" id="name" class="form-control" ></div><div class="form-group">
                                    <label for="phonecode">Phonecode</label><input type="text" value = "{{$country->phonecode}}"  name="phonecode" id="phonecode" class="form-control" ></div>
<input type="hidden" name="id" id="id" value = "{{$country->id}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.countries') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
