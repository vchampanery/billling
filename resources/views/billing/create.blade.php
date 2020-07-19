@extends('admin_template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            @if( $action == 'Edit' )
                <h2>Edit Patient</h2>
            @else
                <h2>Create New Patient</h2>
            @endif
            
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('billing.show') }}"> Back</a>
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


{!! Form::open(array('route' => 'billing.store','method'=>'POST')) !!}

@php 

@endphp
<div class="row"> 
            @if( $action == 'Edit' )
                <input type='hidden' name='action' id='action' value='edit'>
                <input type='hidden' name='billing_master_id' id='billing_master_id' value='{{$billingmaster['billing_master_id']}}'>
            @else
                <input type='hidden' name='action' id='action' value='add'>
            @endif
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="row">
                @foreach($fields as $key => $value)
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <strong>{{trans('billing.'.$value)}}</strong>
                        @if(
                        ($value == 'insurance_unbilled_amount_unbillied_per') ||
                        ($value == 'insurance_unbilled_amount_thirty_per') ||
                        ($value == 'insurance_unbilled_amount_sixty_per') ||
                        ($value == 'insurance_unbilled_amount_ninety_per') ||
                        ($value == 'insurance_unbilled_amount_onetwenty_per') ||
                        ($value == 'insurance_unbilled_amount_onetwentyone_per') ||
                        ($value == 'insurance_unbilled_amount_total') ||
                        ($value == 'insurance_unbilled_amount_total_per') ||
                        ($value == 'patient_unbilled_amount_unbillied_per') ||
                        ($value == 'patient_unbilled_amount_thirty_per') ||
                        ($value == 'patient_unbilled_amount_sixty_per') ||
                        ($value == 'patient_unbilled_amount_ninety_per') ||
                        ($value == 'patient_unbilled_amount_onetwenty_per') ||
                        ($value == 'patient_unbilled_amount_onetwentyone_per') ||
                        ($value == 'patient_unbilled_amount_total') ||
                        ($value == 'patient_unbilled_amount_total_per') ||
                        ($value == 'insurance_patient_unbilled_thirty') ||
                        ($value == 'insurance_patient_unbilled_sixty') ||
                        ($value == 'insurance_patient_unbilled_ninety') ||
                        ($value == 'insurance_patient_unbilled_onetwenty') ||
                        ($value == 'daily_total_collection') || 
                        ($value == 'billing_master_id') 
                        )
                        @php 
                            $symbol = '';
                            if(strpos($value,'_per')){
                                $symbol = '%';
                            } else {
                                $symbol = '$';
                            }
                        @endphp
                        <div class="input-group">
                            @if($symbol == '$')
                                <div class="input-group-prepend">
                                    <div class="input-group-text">{{$symbol}}</div>
                                </div>
                            @endif
                            @php
                                $val = isset($billingmaster[$value])?$billingmaster[$value]:0;
                            @endphp
                            <input type='text' class='form-control' disabled id='{{$value}}' name='{{$value}}' onchange="testthis({{$value}});" value="{{$val}}" >
                            @if($symbol == '%')
                                <div class="input-group-prepend">
                                    <div class="input-group-text">{{$symbol}}</div>
                                </div>
                            @endif
                        </div>
                        @else
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                @php
                                    $val = isset($billingmaster[$value])?$billingmaster[$value]:0;
                                @endphp
                                <input type='text' class='form-control' id='{{$value}}' name='{{$value}}' onchange="testthis({{$value}});" value="{{$val}}">
                            </div>
                        @endif
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
   
   
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript">  
    $('#biiling_date').datepicker({ 
        autoclose: true,   
        format: 'yyyy-M-dd'  
    });
//    jQuery( ".form-control" ).blur(function() {
//        this.value = 
//        console.dir(this.value);
//    });
    function setDecimalValu(vlu){
        return parseFloat(vlu).toFixed(2);
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