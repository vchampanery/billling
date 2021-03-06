@extends('admin_template')
 <style type="text/css">
		* {
		  box-sizing: border-box;
		}

		input[type=text],input[type=email],input[type=tel],input[type=textarea], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  resize: vertical;
		}

		label {
		  padding: 12px 12px 12px 0;
		  display: inline-block;
		}

		/*input[type=submit] {
		background-color: #0b84da;
		color: #fff;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}*/

		/*input[type=submit]:hover {
		  background-color: #45a049;
		}*/

		.container {
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}

		.col-25 {
		  float: left;
		  width: 25%;
		  margin-top: 6px;
		}

		.col-75 {
		  float: left;
		  width: 75%;
		  margin-top: 6px;
		}

		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		@media screen and (max-width: 600px) {
		  .col-25, .col-75, input[type=submit] {
		    width: 50%;
		    margin-top: 0;
		  }
		}
		/*.center {
		  margin: auto;
		  width: 50%;
		  padding: 10px;
		}*/
		table, td, th {  
		  border: 1px solid #ddd;
		  text-align: left;
		}

		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  padding: 15px;
		}
	</style>

@section('content')
    <div class="row" style="margin: 0px;max-width: 100%;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <!--<h2>Client Generate entry </h2>-->
            </div>
            <div class="pull-right">
                <!--<a class="btn btn-success" href="{{ route('module.create') }}"> Create New module</a>-->
                @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    {!! Form::open(array('route' => 'clientdashboard.generateentry','method'=>'POST')) !!}
        <div class="row" > 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                    
                </div>
                <div class="form-group margin-10">
                    <div class="row" style="padding-top: 10px;">

                        <div class="col-xs-2 col-sm-2 col-md-2 center">
<!--                            <select name="client_master_ids[]" class="form-control dropdown-primary md-form" searchable="Select client" multiple>
                                <option value="">Select</option>
                                @foreach($clientList as $clientKey => $clientValue)
                                <option value="{{$clientValue['client_master_id']}}">{{$clientValue['client_master_name']}}</option>
                                @endforeach
                            </select>-->
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 center">
<!--                            <input type="text" name="date" id="date" placeholder="select date" autocomplete="off">-->

                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <!--<a class="btn btn-primary" href="{{ route('clientdashboard.show') }}"> Back</a>-->
                            <!--<button type="submit" class="btn btn-danger">Submit</button>-->
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1">

                        </div>

                    </div>
                </div>
                </form>
            </div>
        </div>
    {!! Form::close() !!}
            </div>
        </div>
    </div>
<div style="width: 50%;margin: auto;width: 35%;padding: 10px;">
			 {!! Form::open(array('route' => 'clientdashboard.generateentry','method'=>'POST')) !!}
				<h2 class="form-signin-heading" style="text-align: center;">Client Generate entry</h2>

				<?php   
					if(isset($error))  
					{  
					  echo $error;  
					}  
				?> 
				<div class="row">
				    <div class="col-25">
				      <label for="lname">Select Client:</label>
				    </div>
				    <div class="col-75">
				       <select name="client_master_ids[]" class="md-form" searchable="Select client" multiple>
                                <option value="">Select</option>
                                @foreach($clientList as $clientKey => $clientValue)
                                <option value="{{$clientValue['client_master_id']}}">{{$clientValue['client_master_name']}}</option>
                                @endforeach
                            </select>
				    </div>
				</div>
				<div class="row">
				    <div class="col-25">
				      <label for="lname">Date:</label>
				    </div>
				    <div class="col-75">
				      <input type="text" name="date" id="date" placeholder="select date" autocomplete="off" style='width: 222px;'>
				    </div>
				</div>
				<div class="row" style="text-align: center;  float: right;">
					<div>
				    	<input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit" />
				    	<button class="btn btn-info" style="color: #fff"><a href="index.php" style="color: #fff;">Back</a></button>
				    </div>
			  	</div>

			{!! Form::close() !!}
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script type="text/javascript">  
    var date=new Date();
    var year=date.getFullYear(); //get year
var month=date.getMonth(); //get month
$('select').selectpicker();
    $('#date').datepicker({ 
        autoclose: true,   
        format: "mm-yyyy",
        viewMode: "months", 
        minViewMode: "months",
//        startDate: new Date(year, month, '01'), //set it here
    });
      
   </script>
@endsection