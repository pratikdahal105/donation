@extends('admin.layout.main')
@section('content')

<div class="page-content container-fluid">

	<div class="page-header">
        <h1 class="page-title">Donations</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Donations</a></li>
        </ol>
        <div class="page-header-actions">
            
            <a href="{{ route('admin.donations.create') }}"  class="btn btn-sm btn-primary btn-outline btn-round"  title="create">
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
                <table style="width: 100% !important" id="donation-datatable" class="table table-hover dataTable table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
							<th >Slug</th>
<th >Reference_no</th>
<th >User_id</th>
<th >Campaign_id</th>
<th >Amount</th>
<th >Remarks</th>
<th >Anonymous</th>
<th >Status</th>
<th >Deleted_at</th>
<th >Created_at</th>
<th >Updated_at</th>
<th >Tip</th>

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
        dataTable = $('#donation-datatable').DataTable({
        dom: 'Bfrtip',
        "serverSide": true,
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        'ajax' : { url: "{{ route('admin.donations.getdatajson') }}",type: 'POST', data: {'_token': '{{ csrf_token() }}' } },

            columns: [
                { data: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },name: "sn", searchable: false },
                { data: "slug",name: "slug"},{ data: "reference_no",name: "reference_no"},{ data: "user_id",name: "user_id"},{ data: "campaign_id",name: "campaign_id"},{ data: "amount",name: "amount"},{ data: "remarks",name: "remarks"},{ data: "anonymous",name: "anonymous"},{ data: "status",name: "status"},{ data: "deleted_at",name: "deleted_at"},{ data: "created_at",name: "created_at"},{ data: "updated_at",name: "updated_at"},{ data: "tip",name: "tip"},
                
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
