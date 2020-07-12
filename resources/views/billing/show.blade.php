@extends('admin_template')
 

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Billing Management</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success" href="{{ route('billing.create') }}"> Create New billing</a>
               
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered data-table display nowrap">
        <thead>
            <tr>
                <th>No</th>
                @foreach($fields as $key => $value)
                 <th>{{trans('billing.'.$value)}}</th>
                @endforeach
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('js')
<!--datatable start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
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
<!--datatable stop-->
   

    <script type="text/javascript">
    
    $(function () {
        var table = $('.data-table').DataTable(
        {
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            ajax: "{{ route('billing.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'biiling_date', name: 'biiling_date'},
                {data: 'units_visits_billed', name: 'units_visits_billed'},
                {data: 'charges_billed', name: 'charges_billed'},
                {data: 'denied_count'},    
                {data: 'denied_count', name: 'denied_count' },                             
                {data: 'rejection_count', name: 'rejection_count' },
                {data: 'insurance_unbilled_amount_unbillied', name: 'insurance_unbilled_amount_unbillied' },      
                {data: 'insurance_unbilled_amount_unbillied_per', name: 'insurance_unbilled_amount_unbillied_per' },  
                {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        });
    } );
   </script>
@endsection