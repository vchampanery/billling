@extends('admin_template')
 

@section('content')

    <div class="row" style="margin: 0px;max-width: 100%;overflow: scroll;">
        <div class="col-lg-12 margin-tb">
            <!--<h3>Client Dashboard Management</h3>-->
            <div class="col-xs-2 col-sm-2 col-md-2 center">
               
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 center">
              
                <!--<a class="btn btn-success" href="{{ route('module.create') }}"> Create New module</a>-->
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

<!--    {!! Form::open(array('route' => 'clientdashboard.generateentry','method'=>'POST')) !!}
        <div class="row" style="margin: 0px;max-width: 100%;"> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                    <h2>Generate entry</h2>
                </div>
                <div class="form-group margin-10">
                    <div class="row" style="padding-top: 10px;">

                        <div class="col-xs-2 col-sm-2 col-md-2 center">
                            <strong>Select Clients</strong>
                            <select name="client_master_ids[]" class="form-control dropdown-primary md-form" searchable="Select client" multiple>
                                <option value="">Select</option>
                                @foreach($clientList as $clientKey => $clientValue)
                                <option value="{{$clientValue['client_master_id']}}">{{$clientValue['client_master_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 center">
                             <strong>Select Month</strong>
                            <input type="text" name="date" id="date">
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <strong>Generate Entries</strong>
                            <a class="btn btn-primary" href="{{ route('clientdashboard.show') }}"> Back</a>
                            <button type="submit" class="btn btn-danger">Generate</button>
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1">

                        </div>

                    </div>
                </div>
                </form>
            </div>
        </div>
    {!! Form::close() !!}
    -->
    {!! Form::open(array('route' => 'clientdashboard.generateentry','method'=>'POST')) !!}
<!--        <div class="row" style="margin: 0px;max-width: 100%;"> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                    <h2>Search</h2>
                </div>
                <div class="form-group margin-10">
                    <div class="row" style="padding-top: 10px;">
                        <div class="col-xs-2 col-sm-2 col-md-2 center">
                            <input type="text" name="date" id="date">
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <a class="btn btn-primary" href="{{ route('clientdashboard.show') }}"> Back</a>
                            <button type="submit" class="btn btn-danger">Search</button>
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1">

                        </div>

                    </div>
                </div>
                </form>
            </div>
        </div>-->
    {!! Form::close() !!}
            <div class="col-xs-12 col-sm-12 col-md-12 center">
            
                {!! Form::open(array('route' => 'clientdashboard.show','method'=>'POST')) !!}
                    <input type="hidden" name="id" value="{{$client}}">
                    <input type="text" name="search_date" id="search_date" class="form-data search_date" placeholder="Select month" autocomplete="off">
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}   
                {!! Form::open(array('route' => 'clientdashboard.downloadexcel','method'=>'POST','style'=>'margin-top: -38px;')) !!}
                    <a style="float: right;" href="{{ route('userdashboard.show') }}" class="btn btn-primary">Back</a>
                     <input type="hidden" name="id" value="{{$client}}">
                    <input type="hidden" name="range" value="{{$range}}">
                    <input type='submit' style="float: right;margin-right: 10px;" class="btn btn-primary"value='Download'>
                {!! Form::close() !!}
                
            </div>
            
    
            <table class="table table-bordered data-table display nowrap " style="width:100%;">
         <thead style="font-size: 13px;"
            <tr>
                @foreach($fieldsArray['module'] as $keyM => $valM)
                    <th rowspan="{{$valM['rowspan']}}" colspan="{{$valM['colspan']}}" style="text-align: center;border: 1px solid black;
       overflow: hidden;
       min-width: 80px;
           padding-left: 1px;
    padding-right: 1px;
    padding-bottom: 1px;
    padding-top: 1px;" text="center">{{$valM['name']}}</th>
                @endforeach
            </tr>
            <tr>
                @foreach($fieldsArray['fields'] as $keyM => $valM)
                    <th  style="text-align: center;border: 1px solid black;
       overflow: hidden;
       min-width: 80px;
       padding-left: 1px;
    padding-right: 1px;
    padding-bottom: 1px;
    padding-top: 1px;" text="center">{{$valM}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
           
                @if(count($fieldsArray['value']) > 0)
                @foreach($fieldsArray['value'] as $keyM => $valM)
                <tr>
                    <td style="padding:0px;text-align: center;border: 1px solid black;overflow: hidden;min-width: 85px;">
                        @if($fieldsArray['diff'][$keyM])
                        <a href="{{ route('clientdashboard.edit',['id'=>$client,'date'=>$keyM]) }}">{{$keyM}}</a>
                        @else
                        {{$keyM}}
                        @endif
                        </td>
                    @foreach($valM as $keyMM => $valMM)
                        <td style="padding:0px;text-align: center;border: 1px solid black;">{{number_format($valMM,2)}}</td>
                    @endforeach
                     <td style="padding:0px;text-align: center;">Action</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td style="padding:0px;text-align: center;" colspan="20">No record found</td>
                </tr>
                @endif
            
        </tbody>
        <tfoot align="right">
            <tr>
                @foreach($fieldsArray['fields'] as $keyM => $valM)
                <th></th>
                @endforeach
        </tfoot>
<!--        <thead>
            <tr>
                <th rowspan="2"  style="padding:0px;" text="center">Date</th>
                <th colspan="1" style="padding:0px;text-align: center;">Visits/ Units</th>
                <th colspan="2" style="padding:0px;text-align: center;">Denied Charges</th>
                <th rowspan="2" style="padding:0px;" text="center">Action</th>
            </tr>
            <tr>
                
                <th style="padding:0px;">#Units/Visits Billed</th>
                <th style="padding:0px;">Denied Count</th>
                <th style="padding:0px;">Rejection Count</th> 
            </tr>
        </thead>
        <tbody>
            <tr> 
                <td style="padding:0px;">2020-08-09</td>
                <td style="padding:0px;">2</td>
                <td style="padding:0px;">3</td>
                <td style="padding:0px;">4</td> 
                <td style="padding:0px;" width="100px">Action</td>
            </tr>
        </tbody>-->
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
   

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript">  
    var date=new Date();
    var year=date.getFullYear(); //get year
var month=date.getMonth(); //get month
var count={{count($fieldsArray['fields'])}};
function example(count) {
          this["actualLng" + count] = 'something ' + count;
      }
      var vars = {};
    $('.data-table').DataTable({
        "bFilter": false,
        "bLengthChange": false,
//        "aLengthMenu": [[15, 30, 45, -1], [15, 30, 45, "All"]],
        "iDisplayLength": 30,
        dom: 'lBfrtip',
            buttons: [
                'excel'
//                 {
//            extend: 'colvis',
//            columns: ':not(:first-child)'
        ],
//            "footerCallback": function ( row, data, start, end, display ) {
//            var api = this.api(), data;
//            // converting to interger to find total
//            var intVal = function ( i ) {
//                return typeof i === 'string' ?
//                    i.replace(/[\$,]/g, '')*1 :
//                    typeof i === 'number' ?
//                        i : 0;
//            };
//              $.each(new Array(count),function(n){
//                  var nNew = n + 1;
//                   vars['actualLng' + nNew]  = api
//                    .column( nNew )
//                    .data()
//                    .reduce( function (a, b) {
//                        return intVal(a) + intVal(b);
//                    }, 0 );
//                }
//               );	
//            // Update footer by showing the total with the reference of the column index 
//	    $( api.column( 0 ).footer() ).html('Total');
//         $.each(new Array(count),function(n){
//              var nNew = n + 1;
//               $( api.column( nNew ).footer() ).html(vars['actualLng' + nNew] );
//            });
//        },
//        "processing": true,
//        "searchable": false,
//        "ajax": "server.php"
//            ],
    });
    $('#search_date').datepicker({ 
        autoclose: true,   
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months",
//        startDate: new Date(year, month, '01'), //set it here
    });
      
   </script>
@endsection