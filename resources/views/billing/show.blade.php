@extends('admin_template')
 

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Billing Management</h2>
            </div>
            <div class="pull-right">
               
                <a class="btn btn-success" href="{{ route('billing.create') }}"> Create New billing</a>
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
        var editrout = '{{ url('billing/edit')}}';
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
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf',
                 {
            extend: 'colvis',
            columns: ':not(:first-child)'
        }
            ],
            ajax: {
                "data": {"_token": ee},
                "url": "{{ route('billing.show') }}",
                "type": "POST"
                
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'biiling_date', name: 'biiling_date'},
                {data: 'units_visits_billed', name: 'units_visits_billed'},
                {data: 'charges_billed', name: 'charges_billed'}, 
                {data: 'denied_count', name: 'denied_count' },                             
                {data: 'rejection_count', name: 'rejection_count' },
                {data: 'insurance_unbilled_amount_unbillied', name: 'insurance_unbilled_amount_unbillied' },      
                {data: 'insurance_unbilled_amount_unbillied_per', name: 'insurance_unbilled_amount_unbillied_per' },
                {data: 'insurance_unbilled_amount_thirty',name: 'insurance_unbilled_amount_thirty'   },
                {data: 'insurance_unbilled_amount_thirty_per',name: 'insurance_unbilled_amount_thirty_per'      },
                {data: 'insurance_unbilled_amount_sixty',name: 'insurance_unbilled_amount_sixty'          },
                {data: 'insurance_unbilled_amount_sixty_per',name: 'insurance_unbilled_amount_sixty_per'      },
                {data: 'insurance_unbilled_amount_ninety',name: 'insurance_unbilled_amount_ninety'         },
                
                {data: 'insurance_unbilled_amount_ninety_per'         ,name: 'insurance_unbilled_amount_ninety_per'     },
                {data: 'insurance_unbilled_amount_onetwenty'          ,name: 'insurance_unbilled_amount_onetwenty'      },
                {data: 'insurance_unbilled_amount_onetwenty_per'      ,name: 'insurance_unbilled_amount_onetwenty_per'  },
                {data: 'insurance_unbilled_amount_onetwentyone'       ,name: 'insurance_unbilled_amount_onetwentyone'   },
                {data: 'insurance_unbilled_amount_onetwentyone_per'    ,name: 'insurance_unbilled_amount_onetwentyone_per'},
                {data: 'insurance_unbilled_amount_total'              ,name: 'insurance_unbilled_amount_total'          },
                {data: 'insurance_unbilled_amount_total_per'          ,name: 'insurance_unbilled_amount_total_per'      },
                {data: 'patient_unbilled_amount_unbillied'            ,name: 'patient_unbilled_amount_unbillied'        },
                {data: 'patient_unbilled_amount_unbillied_per'        ,name: 'patient_unbilled_amount_unbillied_per'    },
                {data: 'patient_unbilled_amount_thirty'               ,name: 'patient_unbilled_amount_thirty'           },
                {data: 'patient_unbilled_amount_thirty_per'           ,name: 'patient_unbilled_amount_thirty_per'       },
                {data: 'patient_unbilled_amount_sixty'                ,name: 'patient_unbilled_amount_sixty'            },
                {data: 'patient_unbilled_amount_sixty_per'            ,name: 'patient_unbilled_amount_sixty_per'        },
                {data: 'patient_unbilled_amount_ninety'               ,name: 'patient_unbilled_amount_ninety'           },
                {data: 'patient_unbilled_amount_ninety_per'           ,name: 'patient_unbilled_amount_ninety_per'       },
                {data: 'patient_unbilled_amount_onetwenty'            ,name: 'patient_unbilled_amount_onetwenty'        },
                {data: 'patient_unbilled_amount_onetwenty_per'        ,name: 'patient_unbilled_amount_onetwenty_per'    },
                {data: 'patient_unbilled_amount_onetwentyone'         ,name: 'patient_unbilled_amount_onetwentyone'     },
                {data: 'patient_unbilled_amount_onetwentyone_per'     ,name: 'patient_unbilled_amount_onetwentyone_per' },
                {data: 'patient_unbilled_amount_total'                ,name: 'patient_unbilled_amount_total'            },
                {data: 'patient_unbilled_amount_total_per'            ,name: 'patient_unbilled_amount_total_per'        },
                {data: 'insurance_patient_unbilled_thirty'            ,name: 'insurance_patient_unbilled_thirty'        },
                {data: 'insurance_patient_unbilled_sixty'             ,name: 'insurance_patient_unbilled_sixty'         },
                {data: 'insurance_patient_unbilled_ninety'            ,name: 'insurance_patient_unbilled_ninety'        },
                {data: 'insurance_patient_unbilled_onetwenty'         ,name: 'insurance_patient_unbilled_onetwenty'     },
                {data: 'insurance_patient_unbilled_onetwentyone'      ,name: 'insurance_patient_unbilled_onetwentyone'  },
                {data: 'insurance_patient_unbilled_onetwentyone'  	    ,name: 'insurance_patient_unbilled_onetwentyone'  	},
                {data: 'insurance_patient_unbilled_onetwentyone'      ,name: 'insurance_patient_unbilled_onetwentyone'  },
                {data: 'insurance_patient_unbilled_onetwentyone'    ,name: 'insurance_patient_unbilled_onetwentyone'},
                {data: 'daily_insurance_collection'     ,name: 'daily_insurance_collection' },
                {data: 'daily_patient_collection'     ,name: 'daily_patient_collection' },
                {data: 'daily_total_collection'     ,name: 'daily_total_collection' },
                {data: 'master_day'                                   ,name: 'master_day'                               },
                {data: 'master_claims'                                ,name: 'master_claims'                            },
                {data: 'master_pending'                               ,name: 'master_pending'                           },
                {data: 'master_month_to_date'                         ,name: 'master_month_to_date'                     },
                {data: 'master_app_to_pay'                            ,name: 'master_app_to_pay'                        },
                {data: 'master_year_to_date'      ,name: 'master_year_to_date'  },
                {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [{
                'targets': 1,
                'searchable': false,
                'orderable': false,
                'render': function (data, type, full, meta){
                    console.dir("data");
                    console.dir(data);
                    console.dir("type");
                    console.dir(type);
                    console.dir("full");
                    console.dir(full);
                    console.dir("meta");
                    console.dir(meta);
                     return '<a href="'+editrout+'/'+full.billing_master_id+'">'+data+'</a>';
//                    return  '<input class="alarm-checkbox " name="project_complience_id[]" id="project_complience_id" value="'+ full.compliance_id +'" type="checkbox"  onclick="return insertValue(this);">';
                }
            }]});
    } );
   </script>
@endsection