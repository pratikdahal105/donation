@extends('admin.layout.main')
@section('content')

    <div class="page-content container-fluid">
        <div class="page-header">
            <h1 class="page-title">Add Categories </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">category</a></li>
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
                    <form role="form" action="{{ route('admin.categories.store') }}"  method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
{{--                                    <label for="slug">Slug</label><input type="text" name="slug" id="slug" class="form-control" </div>--}}
                                    <div class="form-group">
                                    <label for="name">Name</label><input type="text" name="name" id="name" class="form-control" ></div><div class="form-group">
                                    <label for="logo">Logo</label><input type="file" name="logo" id="logo" class="form-control" ></div><div class="form-group">
                                    <label for="thumbnail">Thumbnail</label><input type="file" accept=".jpeg, .png, .jpg" name="thumbnail" id="thumbnail" class="form-control" ></div><div class="form-group">
{{--                                    <label for="status">Status</label><select name="status" id="status" class="form-control">--}}
{{--                                        <option value="0" selected>Pending Approval</option>--}}
{{--                                        <option value="1">Approved</option>--}}
{{--                                    </select></div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="deleted_at">Deleted_at</label><input type="text" name="deleted_at" id="deleted_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="created_at">Created_at</label><input type="text" name="created_at" id="created_at" class="form-control" ></div><div class="form-group">--}}
{{--                                    <label for="updated_at">Updated_at</label><input type="text" name="updated_at" id="updated_at" class="form-control" ></div>--}}
<input type="hidden" name="id" id="id"/>
                        </div>
                        {{ csrf_field() }}
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.categories') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
