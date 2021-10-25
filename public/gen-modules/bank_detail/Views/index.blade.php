@extends('admin.layout.main')
@section('content')

<div class="page-content container-fluid">

	<div class="page-header">
        <h1 class="page-title">Bank_details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Bank_details</a></li>
        </ol>
        <div class="page-header-actions">
            
            <a href="{{ route('admin.bank_details.create') }}"  class="btn btn-sm btn-primary btn-outline btn-round"  title="create">
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
                <table style="width: 100% !important" id="bank_detail-datatable" class="table table-hover dataTable table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
							<th >Campaign_id</th>
<th >Bank_name</th>
<th >Bank_branch</th>
<th >Acc_type</th>
<th >Routing_number</th>
<th >Acc_number</th>
<th >Bic_swift</th>
<th >Acc_holder_name</th>
<th >Recipient_address</th>
<th >Transfer_reason</th>
<th >Deleted_at</th>
<th >Created_at</th>
<th >Updated_at</th>

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
        dataTable = $('#bank_detail-datatable').DataTable({
        dom: 'Bfrtip',
        "serverSide": true,
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        'ajax' : { url: "{{ route('admin.bank_details.getdatajson') }}",type: 'POST', data: {'_token': '{{ csrf_token() }}' } },

            columns: [
                { data: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },name: "sn", searchable: false },
                { data: "campaign_id",name: "campaign_id"},{ data: "bank_name",name: "bank_name"},{ data: "bank_branch",name: "bank_branch"},{ data: "acc_type",name: "acc_type"},{ data: "routing_number",name: "routing_number"},{ data: "acc_number",name: "acc_number"},{ data: "bic_swift",name: "bic_swift"},{ data: "acc_holder_name",name: "acc_holder_name"},{ data: "recipient_address",name: "recipient_address"},{ data: "transfer_reason",name: "transfer_reason"},{ data: "deleted_at",name: "deleted_at"},{ data: "created_at",name: "created_at"},{ data: "updated_at",name: "updated_at"},
                
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
