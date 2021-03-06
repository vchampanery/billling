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
<!--    <div class="row" style="margin: 0px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                @if( $action == 'Edit' )
                    <h2>Edit Module</h2>
                @else
                    <h2>Re assign -user edit</h2>
                @endif

            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(array('route' => 'userassign.reassignstore','method'=>'POST')) !!}
                <input type='hidden' name='action' id='action' value='add'>
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                <a class="btn btn-primary" href="{{ route('userdashboard.show') }}"> Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <strong>Select User</strong>                      
                        <div class="input-group">
                            <select name="user_master_id[]" id="user_master_id[]" class="dropdown-primary md-form" multiple searchable="Search here.." onchange="loadclient(this)">
                                <option value="">Select</option>
                                @foreach($userList as $userKey => $userValue)
                                <option value="{{$userValue['id']}}">{{$userValue['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <strong>Select Client</strong>                      
                        <div class="input-group">
                            <select name="client_master_id[]" id="client_master_id" class="dropdown-primary md-form" multiple searchable="Search here..">   
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <strong>Choose date</strong>                      
                        <div class="input-group">
                            <input type="text" class='form-control ' name="date" id="date" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            {!! Form::close() !!}
        </div>
    </div>-->


    <div style="margin: auto;width: 35%;padding: 10px;">
                @if( $action == 'Edit' )
                    <h2 class="form-signin-heading" style="text-align: center;">Edit Form</h2>
                @else
                    <h2></h2>
                    <h2 class="form-signin-heading" style="text-align: center;">Re assign -user edit</h2>
                @endif
        

				<?php   
					if(isset($error))  
					{  
					  echo $error;  
					}  
				?> 
                {!! Form::open(array('route' => 'userassign.reassignstore','method'=>'POST')) !!}
                <input type='hidden' name='action' id='action' value='add'>
				<div class="row">
				    <div class="col-25">
				      <label for="lname">Select User:</label>
				    </div>
				    <div class="col-75">
                        <!--<input type="text" name="fname" id="form_fname" class="form-control" placeholder="First Name" value="" required />-->
                        <select name="user_master_id[]" id="user_master_id[]" style='height: 60%;' multiple searchable="Search here.." onchange="loadclient(this)">
                            <option value="">Select</option>
                            @foreach($userList as $userKey => $userValue)
                            <option value="{{$userValue['id']}}">{{$userValue['name']}}</option>
                            @endforeach
                        </select>
				      <input type="hidden" name="id" value="<?php ?>">
				    </div>
				</div>
				<div class="row">
				    <div class="col-25">
				      <label for="lname">Select Client:</label>
				    </div>
				    <div class="col-75">
				      <select name="client_master_id[]" id="client_master_id" class="dropdown-primary md-form" multiple searchable="Search here..">   
                            </select>
				    </div>
				</div>
				<div class="row">
				    <div class="col-25">
				      <label for="lname">Choose date:</label>
				    </div>
				    <div class="col-75">
				      <input type="text" class='form-control ' name="date" id="date" autocomplete="off" style='width: 222px;'>
				    </div>
				</div>
				
				<div class="row" style="text-align: center;  float: right;">
					<div>
				    	<input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit"/>
				    	<button class="btn btn-info" style="color: #fff"><a href="{{ route('userdashboard.show') }}" style="color: #fff;">Back</a></button>
				    </div>
			  	</div>
                {!! Form::close() !!}
    </div>
@endsection

@section('js')
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<!--<script src="{{ asset('js/bootstrap.min.js') }}" ></script>-->
<link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}">
<script src="{{ asset('js/bootstrap-multiselect.js') }}" ></script>

<script type="text/javascript">  
//  $('select').selectpicker();
 var date=new Date();
    var year=date.getFullYear(); //get year
var month=date.getMonth(); //get month
    $('#date').datepicker({ 
        autoclose: true,
        autocomplete: false,
        format: "mm-dd-yyyy",
//        viewMode: "months", 
//        minViewMode: "months",
    });
    $('select').selectpicker();
//    $('select').multiselect();
  function loadclient(tt){
    var s1 = $(tt).val();
    var url = '{{ route('userassign.getclient') }}';
    var ee = "{!! csrf_token() !!}";
     $.ajax({
           type:'POST',
           url:url,
           data:{userId:s1,"_token": ee},
           success:function(response){
               console.dir(response);
               console.dir(response.status);
               $('#client_master_id').html('');
               var html = "<option value=''>Select</option>";
                $.each(response.data,function(a,b){
                    $.each(b,function(i,j){
                        html += "<option value='"+j.client_master_id+"'>"+j.client_master_name+"</option>";
                    });
               })
               
               console.dir(html);
               $('#client_master_id').append(html).selectpicker('refresh'); 

           }
        });
  }
    function setDecimalValu(vlu){
        return parseFloat(vlu).toFixed(2);
    }
    function removeWoc(){
        console.dir(this);
        alert("Test");
    }
    function testthis(key){
        var id = key.name;
        if(id == 'biiling_date'){
            return true;
        }
        //insurance  start
        var vv = $('#'+id).val();
        vv1 = parseFloat(vv).toFixed(2);
        $('#'+id).val(vv1);

//        console.dir(id);
        if( ( id == "insurance_unbilled_amount_thirty") ||
            ( id == "insurance_unbilled_amount_sixty") ||
            ( id == "insurance_unbilled_amount_ninety") ||
            ( id == "insurance_unbilled_amount_onetwenty") ||
            ( id == "insurance_unbilled_amount_onetwentyone") ||
            ( id == "insurance_unbilled_amount_unbillied")
        ){
    
           var a1 = parseFloat(jQuery("#insurance_unbilled_amount_thirty").val());      
           var a2 = parseFloat(jQuery("#insurance_unbilled_amount_sixty").val());       
           var a3 = parseFloat(jQuery("#insurance_unbilled_amount_ninety").val());      
           var a4 = parseFloat(jQuery("#insurance_unbilled_amount_onetwenty").val());
           var a5 = parseFloat(jQuery("#insurance_unbilled_amount_onetwentyone").val());
           var a6 = parseFloat(jQuery("#insurance_unbilled_amount_unbillied").val());   
            
//            console.log(a1);
//            console.log(a2);
//            console.log(a3);
//            console.log(a4);
//            console.log(a5);
//            console.log(a6);
            var s = a1 + a2 + a3 + a4 + a5 + a6;
//            console.dir(s);
             var s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_total').val(s);
            id = 'insurance_unbilled_amount_total';
        }
        
//        if( id == "insurance_unbilled_amount_unbillied_per"){
        if(( id == "insurance_unbilled_amount_unbillied") ||  ( id == "insurance_unbilled_amount_onetwenty_per")){
            var a1 = jQuery('#insurance_unbilled_amount_unbillied').val();
            var a2 = jQuery('#insurance_unbilled_amount_onetwenty_per').val();
            var s = (a1*10000) / a2 ;
            s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_unbillied_per').val(s);
        }
        if(( id == "insurance_unbilled_amount_thirty") ||  ( id == "insurance_unbilled_amount_total")){
            var a1 = jQuery('#insurance_unbilled_amount_thirty').val();
            var a2 = jQuery('#insurance_unbilled_amount_total').val();
            var s = parseInt((a1*10000) / a2 )/100;
            s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_thirty_per').val(s);
        }
        if(( id == "insurance_unbilled_amount_sixty") ||  ( id == "insurance_unbilled_amount_total")){
            var a1 = jQuery('#insurance_unbilled_amount_sixty').val();
            var a2 = jQuery('#insurance_unbilled_amount_total').val();
            var s = parseInt((a1*10000) / a2 )/100;
            s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_sixty_per').val(s);
        }
        if(( id == "insurance_unbilled_amount_ninety") ||  ( id == "insurance_unbilled_amount_total")){
            var a1 = jQuery('#insurance_unbilled_amount_ninety').val();
            var a2 = jQuery('#insurance_unbilled_amount_total').val();
             var s = parseInt((a1*10000) / a2 )/100;
             s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_ninety_per').val(s);
        }
        if(( id == "insurance_unbilled_amount_onetwenty") ||  ( id == "insurance_unbilled_amount_total")){
            var a1 = jQuery('#insurance_unbilled_amount_onetwenty').val();
            var a2 = jQuery('#insurance_unbilled_amount_total').val();
             var s = parseInt((a1*10000) / a2 )/100;
             s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_onetwenty_per').val(s);
        }
         if(( id == "insurance_unbilled_amount_unbillied") ||  ( id == "insurance_unbilled_amount_onetwenty_per") ||  ( id == "insurance_unbilled_amount_total")){
            var a1 = parseFloat(jQuery('#insurance_unbilled_amount_unbillied').val());
            var a2 = parseFloat(jQuery('#insurance_unbilled_amount_onetwenty_per').val());
//             var s = parseInt((a1*10000) / a2 )/100;
             var s = parseInt((a1*10000) / a2 );
             s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_unbillied_per').val(s);
        }
        if(( id == "insurance_unbilled_amount_onetwentyone") ||  ( id == "insurance_unbilled_amount_total")){
            var a1 = jQuery('#insurance_unbilled_amount_onetwentyone').val();
            var a2 = jQuery('#insurance_unbilled_amount_total').val();
             var s = parseInt((a1*10000) / a2 )/100;
             s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_onetwentyone_per').val(s);
        }
        //total per
        if(( id == "insurance_unbilled_amount_onetwenty_per") ||  ( id == "insurance_unbilled_amount_total")){
            var a1 = parseFloat(jQuery("#insurance_unbilled_amount_thirty_per").val());      
            var a2 = parseFloat(jQuery("#insurance_unbilled_amount_sixty_per").val());       
            var a3 = parseFloat(jQuery("#insurance_unbilled_amount_ninety_per").val());      
            var a4 = parseFloat(jQuery("#insurance_unbilled_amount_onetwenty_per").val());
            var a5 = parseFloat(jQuery("#insurance_unbilled_amount_onetwentyone_per").val());
            var a6 = parseFloat(jQuery("#insurance_unbilled_amount_unbillied_per").val());   
             var s = a1 + a2 + a3 + a4 + a5 + a6;
             s = setDecimalValu(s);
            jQuery('#insurance_unbilled_amount_total_per').val(s);
        }
        //insurance  end
        //patient  start
        if( ( id == "patient_unbilled_amount_thirty") ||
            ( id == "patient_unbilled_amount_sixty") ||
            ( id == "patient_unbilled_amount_ninety") ||
            ( id == "patient_unbilled_amount_onetwenty") ||
            ( id == "patient_unbilled_amount_onetwentyone") ||
            ( id == "patient_unbilled_amount_unbillied")
        ) {
    
           var a1 = parseFloat(jQuery("#patient_unbilled_amount_thirty").val());      
           var a2 = parseFloat(jQuery("#patient_unbilled_amount_sixty").val());       
           var a3 = parseFloat(jQuery("#patient_unbilled_amount_ninety").val());      
           var a4 = parseFloat(jQuery("#patient_unbilled_amount_onetwenty").val());
           var a5 = parseFloat(jQuery("#patient_unbilled_amount_onetwentyone").val());
           var a6 = parseFloat(jQuery("#patient_unbilled_amount_unbillied").val());   

            var s = a1 + a2 + a3 + a4 + a5 + a6;
            s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_total').val(s);
            id = 'patient_unbilled_amount_total';
        }
        
//        if( id == "patient_unbilled_amount_unbillied_per"){
        if(( id == "patient_unbilled_amount_unbillied") ||  ( id == "patient_unbilled_amount_onetwenty_per")){
            var a1 = jQuery('#patient_unbilled_amount_unbillied').val();
            var a2 = jQuery('#patient_unbilled_amount_onetwenty_per').val();
            var s = (a1*10000) / a2 ;
            s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_unbillied_per').val(s);
        }
        if(( id == "patient_unbilled_amount_thirty") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = jQuery('#patient_unbilled_amount_thirty').val();
            var a2 = jQuery('#patient_unbilled_amount_total').val();
            var s = parseInt((a1*10000) / a2 )/100;
            s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_thirty_per').val(s);
        }
        if(( id == "patient_unbilled_amount_sixty") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = jQuery('#patient_unbilled_amount_sixty').val();
            var a2 = jQuery('#patient_unbilled_amount_total').val();
            var s = parseInt((a1*10000) / a2 )/100;
            s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_sixty_per').val(s);
        }
        if(( id == "patient_unbilled_amount_ninety") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = jQuery('#patient_unbilled_amount_ninety').val();
            var a2 = jQuery('#patient_unbilled_amount_total').val();
             var s = parseInt((a1*10000) / a2 )/100;
             s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_ninety_per').val(s);
        }
        if(( id == "patient_unbilled_amount_onetwenty") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = jQuery('#patient_unbilled_amount_onetwenty').val();
            var a2 = jQuery('#patient_unbilled_amount_total').val();
             var s = parseInt((a1*10000) / a2 )/100;
             s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_onetwenty_per').val(s);
        }
         if(( id == "patient_unbilled_amount_unbillied") ||  ( id == "patient_unbilled_amount_onetwenty_per") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = parseFloat(jQuery('#patient_unbilled_amount_unbillied').val());
            var a2 = parseFloat(jQuery('#patient_unbilled_amount_onetwenty_per').val());
//             var s = parseInt((a1*10000) / a2 )/100;
             var s = parseInt((a1*10000) / a2 );
             s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_unbillied_per').val(s);
        }
        if(( id == "patient_unbilled_amount_onetwentyone") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = jQuery('#patient_unbilled_amount_onetwentyone').val();
            var a2 = jQuery('#patient_unbilled_amount_total').val();
             var s = parseInt((a1*10000) / a2 )/100;
             s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_onetwentyone_per').val(s);
        }
        //total per
        if(( id == "patient_unbilled_amount_onetwenty_per") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = parseFloat(jQuery("#patient_unbilled_amount_thirty_per").val());      
            var a2 = parseFloat(jQuery("#patient_unbilled_amount_sixty_per").val());       
            var a3 = parseFloat(jQuery("#patient_unbilled_amount_ninety_per").val());      
            var a4 = parseFloat(jQuery("#patient_unbilled_amount_onetwenty_per").val());
            var a5 = parseFloat(jQuery("#patient_unbilled_amount_onetwentyone_per").val());
            var a6 = parseFloat(jQuery("#patient_unbilled_amount_unbillied_per").val());   
             var s = a1 + a2 + a3 + a4 + a5 + a6;
             s = setDecimalValu(s);
            jQuery('#patient_unbilled_amount_total_per').val(s+'%');
        }
        //patient  end

        //Insurance + Patient
//        console.dir(id);
        if(( id == "insurance_unbilled_amount_thirty") ||  ( id == "patient_unbilled_amount_thirty") ||  ( id == "insurance_unbilled_amount_total") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = parseInt(jQuery('#insurance_unbilled_amount_thirty').val());
            var a2 = parseInt(jQuery('#patient_unbilled_amount_thirty').val());
            var s = a1 + a2;
             s = setDecimalValu(s);
            jQuery('#insurance_patient_unbilled_thirty').val(s);
        }
        
        if(( id == "insurance_unbilled_amount_sixty") ||  ( id == "patient_unbilled_amount_sixty") ||  ( id == "insurance_unbilled_amount_total") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = parseInt(jQuery('#insurance_unbilled_amount_sixty').val());
            var a2 = parseInt(jQuery('#patient_unbilled_amount_sixty').val());
            var s = a1 + a2;
             s = setDecimalValu(s);
            jQuery('#insurance_patient_unbilled_sixty').val(s);
        }
        
        if(( id == "insurance_unbilled_amount_ninety") ||  ( id == "patient_unbilled_amount_ninety") ||  ( id == "insurance_unbilled_amount_total") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = parseInt(jQuery('#insurance_unbilled_amount_ninety').val());
            var a2 = parseInt(jQuery('#patient_unbilled_amount_ninety').val());
            var s = a1 + a2;
             s = setDecimalValu(s);
            jQuery('#insurance_patient_unbilled_ninety').val(s);
        }
        
        if(( id == "insurance_unbilled_amount_onetwenty") ||  ( id == "patient_unbilled_amount_onetwenty") ||  ( id == "insurance_unbilled_amount_total") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = parseInt(jQuery('#insurance_unbilled_amount_onetwenty').val());
            var a2 = parseInt(jQuery('#patient_unbilled_amount_onetwenty').val());
            var s = a1 + a2;
             s = setDecimalValu(s);
            jQuery('#insurance_patient_unbilled_onetwenty').val(s);
        }
        
        if(( id == "insurance_unbilled_amount_onetwentyone") ||  ( id == "patient_unbilled_amount_onetwentyone") ||  ( id == "insurance_unbilled_amount_total") ||  ( id == "patient_unbilled_amount_total")){
            var a1 = parseInt(jQuery('#insurance_unbilled_amount_onetwentyone').val());
            var a2 = parseInt(jQuery('#patient_unbilled_amount_onetwentyone').val());
            var s = a1 + a2;
             s = setDecimalValu(s);
            jQuery('#insurance_patient_unbilled_onetwenty').val(s);
        }
        if(( id == "daily_insurance_collection") ||  ( id == "daily_patient_collection")){
            var a1 = parseFloat(jQuery('#daily_insurance_collection').val());
            var a2 = parseFloat(jQuery('#daily_patient_collection').val());
            var s = a1 + a2;
             s = setDecimalValu(s);
            jQuery('#daily_total_collection').val(s);
        }
    }
    
</script>

@endsection