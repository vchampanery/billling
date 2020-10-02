@extends('admin_template')
 

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Client Management</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success" href="{{ route('client.create') }}"> Create New client</a>
                @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered data-table display nowrap" style="width: 100%;" >
        <thead>
            <tr>
                <th>No</th>
                <!--@foreach($fields as $key => $value)-->
                 <th>Client name</th>
                <!--@endforeach-->
                <!--<th width="100px">Action</th>-->
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            </div>
        </div>
    </div>


   
@endsection

@section('js')
<!--datatable start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<!--datatable stop-->
   

    <script type="text/javascript">
        var vArray = [];
        @foreach($fields as $key => $vl)
        var vl = '{{$vl}}';
        var editrout = '{{ url('clientmaster/edit')}}';
        vArray.push(vl);
//            console.dir(vl);
        @endforeach
        console.dir(vArray);
        var ee = "{!! csrf_token() !!}";
        console.dir(ee);
    $(function () {
        var table = $('.data-table').DataTable(
        {
            scrollX: true,
            processing: true,
            serverSide: true,
//            dom: 'Bfrtip',
           
            ajax: {
                "data": {"_token": ee},
                "url": "{{ route('client.show') }}",
                "type": "POST"
                
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'client_master_name', name: 'client_master_name'},
//                {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [{
                'targets': 1,
                'searchable': false,
                'orderable': false,
                'render': function (data, type, full, meta){
                    console.dir("data");
                    console.dir(data);
//                    console.dir("type");
//                    console.dir(type);
//                    console.dir("full");
//                    console.dir(full);
//                    console.dir("meta");
//                    console.dir(meta);
                     return '<a href="'+editrout+'/'+full.client_master_id+'">'+data+'</a>';
//                    return  '<input class="alarm-checkbox " name="project_complience_id[]" id="project_complience_id" value="'+ full.compliance_id +'" type="checkbox"  onclick="return insertValue(this);">';
                }
            }]});
    } );
   </script>
@endsection