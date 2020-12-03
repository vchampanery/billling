@extends('admin_template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            @if( $action == 'Edit' )
                <h2>Edit Web Portal</h2>
            @else
                <h2>Create Web Portal</h2>
            @endif
            
        </div>
    </div>
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


{!! Form::open(array('route' => 'webportal.store','method'=>'POST')) !!}
        
@php 

@endphp
<div class="row"> 
    
        <input type='hidden' name='action' id='action' value='{{$action}}'>
        <input type='hidden' name='token' id='token' value='{{@csrf_field}}'>
        <input type='hidden' name='web_portal_client_id' id='web_portal_client_id' value='{{$id}}'>
        <input type='hidden' name='user_reassign_master_id' id='user_reassign_master_id' value="{{isset($list->user_reassign_master_id)?$list->user_reassign_master_id:''}}">
  
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
            <a class="btn btn-primary" href="{{ route('webportal.index') }}"> Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <label for="">Insurance, PMS</label>
                
                  <input type="text" name="web_portal_insurance_pms" id="web_portal_insurance_pms" class="form-control" placeholder="Insurance, PMS" 
                         value="{{isset($list->web_portal_insurance_pms)?$list->web_portal_insurance_pms:''}}" required />
                  
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <label for="lname">Username</label>
                
                  <input type="text" name="web_portal_username" id="web_portal_username" class="form-control" placeholder="Username" 
                         value="{{isset($list->web_portal_username)?$list->web_portal_username:''}}" required />
                 
                </div>
            
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <label for="lname">Password</label>
                  <input type="text" name="web_portal_password" id="web_portal_password" class="form-control" placeholder="Password"
                         value="{{isset($list->web_portal_password)?$list->web_portal_password:''}}"  required />
                </div>
            
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <label for="lname">Weblink</label>
                  <input type="text" name="web_portal_weblink" id="web_portal_weblink" class="form-control" placeholder="Weblink" 
                         value="{{isset($list->web_portal_weblink)?$list->web_portal_weblink:''}}"  required />
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <label for="lname">Registered Email/Assigned to</label>
                  <input type="text" name="web_portal_register_email" id="web_portal_register_email" class="form-control" placeholder="Registered Email/Assigned to" 
                         value="{{isset($list->web_portal_register_email)?$list->web_portal_register_email:''}}" required />
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <label for="lname">Registered Phone#</label>
                  <input type="text" name="web_portal_registered_phone" id="web_portal_registered_phone" class="form-control" placeholder="Registered Phone#" 
                         value="{{isset($list->web_portal_registered_phone)?$list->web_portal_registered_phone:''}}" required />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="lname">Security Question</label>
                        <textarea name="web_portal_security_q" 
                                  data-validation="required"
                                  data-validation="custom" 
                                  data-validation-regexp="^[a-zA-Z ]{2,30}$" 
                                  class="form-control"
                                  row="10" 
                                  col="200">{{isset($list->web_portal_security_q)?$list->web_portal_security_q:''}}</textarea>
                    </div>
                </div>
                </div>
            </div>
                
            </div>
    </div>
   
   
    
</div>
{!! Form::close() !!}

@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">  
//     $('#user_master_id').selectpicker();
//      $('#user_master_id').multiselect({
//        nonSelectedText: 'Select Framework',
//        enableFiltering: true,
//        enableCaseInsensitiveFiltering: true,
//        buttonWidth:'400px',
//       });
       
//        $('#user_master_id').multiselect({
//        includeSelectAllOption: true,
//        enableFiltering: true,
//        enableCaseInsensitiveFiltering: true,
//        buttonWidth: '100%'
//    }); 
// $('select').multiselect({
//    templates: { // Use the Awesome Bootstrap Checkbox structure
//      li: '<li class="checkList"><a tabindex="0"><div class="aweCheckbox aweCheckbox-danger"><label for=""></label></div></a></li>'
//    }
//  });
  $(document).ready(function() {
        $('select').select2({
//            height: 45px,
        });
    });
    $('#biiling_date').datepicker({ 
        autoclose: true,   
        format: 'yyyy-M-dd'  
    });
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