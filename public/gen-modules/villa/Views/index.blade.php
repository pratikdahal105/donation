@extends('admin.layout.main')
@section('content')

<div class="page-content container-fluid">

	<div class="page-header">
        <h1 class="page-title">Villas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Villas</a></li>
        </ol>
        <div class="page-header-actions">
            
            <a href="{{ route('admin.villas.create') }}"  class="btn btn-sm btn-primary btn-outline btn-round"  title="create">
                <i class="icon wb-plus" aria-hidden="true"></i>
                <span class="hidden-sm-down">Create</span>
            </a>

        </div>
    </div>

    <div class="panel">
        <header class="panel-heading">
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table style="width: 100% !important" id="villa-datatable" class="table table-hover dataTable table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
							<th >Name</th>
<th >Cover_id</th>
<th >Description</th>
<th >Slug</th>
<th >No_of_guests</th>
<th >No_of_pools</th>
<th >Wifi</th>
<th >Bedrooms</th>
<th >Bathrooms</th>
<th >Latitude</th>
<th >Longitude</th>
<th >Location</th>
<th >Security</th>
<th >Tripadvisor_link</th>
<th >Tv_satellite</th>
<th >Cars</th>
<th >Status</th>
<th >Sequence</th>
<th >Del_flag</th>
<th >Created_at</th>
<th >Updated_at</th>
<th >Created_by</th>
<th >Updated_by</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>

                </table>
            </div>
                    <!-- /.box-body -->
        </div>
                <!-- /.box -->
    </div>
</div>


<script>
    var dataTable; 
    var site_url = window.location.href;

    $(function(){
        dataTable = $('#villa-datatable').DataTable({
        dom: 'Bfrtip',
        "serverSide": true,
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        'ajax' : { url: "{{ route('admin.villas.getdatajson') }}",type: 'POST', data: {'_token': '{{ csrf_token() }}' } },

            columns: [
                { data: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },name: "sn", searchable: false },
                { data: "id",name: "id"},
            { data: "name",name: "name"},
            { data: "cover_id",name: "cover_id"},
            { data: "description",name: "description"},
            { data: "slug",name: "slug"},
            { data: "no_of_guests",name: "no_of_guests"},
            { data: "no_of_pools",name: "no_of_pools"},
            { data: "wifi",name: "wifi"},
            { data: "bedrooms",name: "bedrooms"},
            { data: "bathrooms",name: "bathrooms"},
            { data: "latitude",name: "latitude"},
            { data: "longitude",name: "longitude"},
            { data: "location",name: "location"},
            { data: "security",name: "security"},
            { data: "tripadvisor_link",name: "tripadvisor_link"},
            { data: "tv_satellite",name: "tv_satellite"},
            { data: "cars",name: "cars"},
            { data: "status",name: "status"},
            { data: "sequence",name: "sequence"},
            { data: "del_flag",name: "del_flag"},
            { data: "created_at",name: "created_at"},
            { data: "updated_at",name: "updated_at"},
            { data: "created_by",name: "created_by"},
            { data: "updated_by",name: "updated_by"},
            
                
                { data: function(data,b,c,table) { 
                var buttons = '';

                buttons += "<a class='btn btn-sm btn-success btn-outline'  title='Edit' href='"+site_url+"/edit/"+data.id+"'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

                buttons += "<a class='btn btn-sm btn-danger btn-outline' href='"+site_url+"/delete/"+data.id+"' ><i class='icon wb-trash' aria-hidden='true'></i></a>&nbsp;&nbsp";

                return buttons;
                }, name:'action',searchable: false},  
            ],
        });
    });
</script>
@endsection
