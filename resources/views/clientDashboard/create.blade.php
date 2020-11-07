@extends('admin_template')

@section('content')
<div class="row" style="
    margin: 0px;
    max-width: 100%;
    /*overflow: scroll;*/
">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            @if( $action == 'Edit' )
                <!--<h2>Edit Module</h2>-->
            @else
                <h2>Create New Module</h2>
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


{!! Form::open(array('route' => 'clientdashboard.store','method'=>'POST','autocomplete'=>'off')) !!}

@php 

@endphp
<div class="row" style="
    margin: 0px;
    max-width: 100%;
    /*overflow: scroll;*/
"> 
    
        <input type='hidden' name='action' id='action' value='{{$action}}'>
        <input type='hidden' name='swMstrId' id='swMstrId' value='{{$swMstrId}}'>
        <input type='hidden' name='client_master_id' id='client_master_id' value='{{isset($software_field_master_id['client_id'])?$software_field_master_id['client_id']:1}}'>
  
    @if($swMstrId == '1') 
    <!--Kareo-->
    <div class="col-xs-12 col-sm-12 col-md-12">
        
        <!--row 1 start-->
        <div class="form-group margin-10">
            <div class="row" style="padding-top: 10px;">
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr style="height: 50px;width: 50px;">
                                <td style="text-align:center;background-color: grey;width: 100px;">Date</td>
                                <td style="text-align:center;width: 100px;">
                                    {{$software_field_master_id['date']}}
                                    <input type='hidden' name='date' value="{{$software_field_master_id['date']}}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                   
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9">
                    <table border="2">
                        <tbody>
                            <tr style="height: 50px;">
                                <td style="text-align:center;background-color: yellow;width: 100px;">Color Code</td>
                                <td style="text-align:center;background-color: grey;width: 100px;">Header</td>
                                <td style="text-align:center;background-color: Coral;width: 100px;">Sub-Header</td>
                                <!--<td style="text-align:center;background-color: blue;width: 100px;">Auto generated</td>-->
                                <td style="text-align:center;background-color: while;width: 100px;">Updated data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--row 1 end-->
        <!--row 2 start-->
        <div class="form-group margin-10">
            <div class="row" style="padding-top: 10px;">
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr><td style="text-align:center;background-color: grey;">Visits/ Units</td></tr>
                            <tr><td style="text-align:center;background-color: coral;">#Units/Visits Billed</td></tr>
                            <tr><td><input  type="number"  step="0.01"  name="software_field_master_id[1]"  value="{{isset($software_field_master_id[1])?$software_field_master_id[1]:0}}"></td></tr>
                        </tbody>
                    </table>
                  
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr><td style="text-align:center;background-color: grey;">Billed Charges</td></tr>
                            <tr><td style="text-align:center;background-color: coral;">#Charges Billed</td></tr>
                            <tr><td><input  type="number"  step="0.01"  name="software_field_master_id[2]"  value="{{isset($software_field_master_id[2])?$software_field_master_id[2]:0}}"></td></tr>
                        </tbody>
                    </table>
                  
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                     <table border="2">
                        <tbody>
                            <tr >
                                <td style="text-align:center;background-color: grey;"
                                    colspan="2" rowspan="1"> Denied Charges</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;background-color: coral;">Denied Count</td>
                                <td style="text-align:center;background-color: coral;">Rejection Count</td>
                            </tr>
                            <tr>
                                <td><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                <td><input  type="number"  step="0.01"  name="software_field_master_id[4]" value="{{isset($software_field_master_id[4])?$software_field_master_id[4]:0}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!--row 2 end-->
            <!--row 3 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="7" > Insurence Ar Information</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">Bucket</td>
                                    <td style="text-align:center;background-color: coral;">Unbilled Amount</td>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                    <td style="text-align:center;background-color: coral;">> 121</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 130px;">Amount</td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[5]" value="{{isset($software_field_master_id[5])?$software_field_master_id[5]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[7]" value="{{isset($software_field_master_id[7])?$software_field_master_id[7]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[9]" value="{{isset($software_field_master_id[9])?$software_field_master_id[9]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[11]" value="{{isset($software_field_master_id[11])?$software_field_master_id[11]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[13]" value="{{isset($software_field_master_id[13])?$software_field_master_id[13]:0}}"></td>
                                    <td style="max-width: 130px;"><input style="max-width: 130px;"   type="number"  step="0.01"  name="software_field_master_id[15]" value="{{isset($software_field_master_id[15])?$software_field_master_id[15]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <!--row 3 end-->
            <!--row 4 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="7" > Patient Ar Information</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">Bucket</td>
                                    <td style="text-align:center;background-color: coral;">Unbilled Amount</td>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                     <td style="text-align:center;background-color: coral;">> 121</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 130px;">Amount</td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[19]" value="{{isset($software_field_master_id[19])?$software_field_master_id[19]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[21]" value="{{isset($software_field_master_id[21])?$software_field_master_id[21]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[23]" value="{{isset($software_field_master_id[23])?$software_field_master_id[23]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[25]" value="{{isset($software_field_master_id[25])?$software_field_master_id[25]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[27]" value="{{isset($software_field_master_id[27])?$software_field_master_id[27]:0}}"></td>
                                    <td style="max-width: 130px;"><input style="max-width: 130px;"   type="number"  step="0.01"  name="software_field_master_id[29]" value="{{isset($software_field_master_id[29])?$software_field_master_id[29]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 4 end-->
             <!--row 4 start-->
<!--            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="6" > Insurance + Patient AR Total</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">Bucket</td>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                     <td style="text-align:center;background-color: coral;">> 121</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 130px;">Amount</td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[2]" value="{{isset($software_field_master_id[2])?$software_field_master_id[2]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                    <td style="max-width: 130px;"><input style="max-width: 130px;"   type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>-->
            <!--row 4 end-->
            <!--row 5 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <table border="2" >
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="6" >Daily Collection Details</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">$Insurance Collection</td>
                                    <td style="text-align:center;"><input   type="number"  step="0.01"  name="software_field_master_id[38]" value="{{isset($software_field_master_id[38])?$software_field_master_id[38]:0}}"></td>
                                    <td style="text-align:center;background-color: coral;">$Patient Collection</td>
                                    <td style="text-align:center;"><input  type="number"  step="0.01"  name="software_field_master_id[39]" value="{{isset($software_field_master_id[39])?$software_field_master_id[39]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 5 end-->
            <!--row 6 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="8" > Medicare Financials</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Pending</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Month of Date</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >App to Pay</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Year to Date</td>
                                </tr>
                                <tr>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[123]" value="{{isset($software_field_master_id[123])?$software_field_master_id[123]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[124]" value="{{isset($software_field_master_id[124])?$software_field_master_id[124]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[129]" value="{{isset($software_field_master_id[129])?$software_field_master_id[129]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[130]" value="{{isset($software_field_master_id[130])?$software_field_master_id[130]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[135]" value="{{isset($software_field_master_id[135])?$software_field_master_id[135]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[136]" value="{{isset($software_field_master_id[136])?$software_field_master_id[136]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[141]" value="{{isset($software_field_master_id[141])?$software_field_master_id[141]:0}}"></td>
                                    <td style="max-width: 115px;"><input style="max-width: 115px;"   type="number"  step="0.01"  name="software_field_master_id[142]" value="{{isset($software_field_master_id[142])?$software_field_master_id[142]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 6 end-->
            <!--row 7 start-->
            <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                <h2>Kareo</h2>
                
                <a class="btn btn-primary" href="{{ route('clientdashboard.show',['id'=>$clientId]) }}"> Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!--row 7 end-->
    </div>
   @elseif($swMstrId == '2') 
   
<!--   eCW-->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <!--row 1 start-->
        <div class="form-group margin-10">
            <div class="row" style="padding-top: 10px;">
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr style="height: 50px;width: 50px;">
                                <td style="text-align:center;background-color: grey;width: 100px;">Date</td>
                                <td style="text-align:center;width: 100px;">
                                    {{$software_field_master_id['date']}}
                                    <input type='hidden' name='date' value="{{$software_field_master_id['date']}}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                   
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9">
                    <table border="2">
                        <tbody>
                            <tr style="height: 50px;">
                                <td style="text-align:center;background-color: yellow;width: 140px;">Color Code</td>
                                <td style="text-align:center;background-color: grey;width: 155  px;">Header</td>
                                <td style="text-align:center;background-color: Coral;width: 155px;">Sub-Header</td>
<!--                                <td style="text-align:center;background-color: blue;width: 100px;">Auto generated</td>-->
                                <td style="text-align:center;background-color: while;width: 155px;">Updated data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--row 1 end-->
        <!--row 2 start-->
        <div class="form-group margin-10">
            <div class="row" style="padding-top: 10px;">
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr><td style="text-align:center;background-color: grey;">Visits/ Units</td></tr>
                            <tr><td style="text-align:center;background-color: coral;">#Units/Visits Billed</td></tr>
                            <tr><td><input  style="width: 160px;"   type="number"  step="0.01"  name="software_field_master_id[41]" value="{{isset($software_field_master_id[41])?$software_field_master_id[41]:0}}"></td></tr>
                        </tbody>
                    </table>
                  
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr><td style="text-align:center;background-color: grey;">Billed Charges</td></tr>
                            <tr><td style="text-align:center;background-color: coral;">#Charges Billed</td></tr>
                            <tr><td><input  style="width: 160px;"   type="number"  step="0.01"  name="software_field_master_id[42]"  value="{{isset($software_field_master_id[42])?$software_field_master_id[42]:0}}"></td></tr>
                        </tbody>
                    </table>
                  
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                     <table border="2">
                        <tbody>
                            <tr >
                                <td style="text-align:center;background-color: grey;"
                                    colspan="3" rowspan="1"> Denied Charges</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;background-color: coral;">Clearing House Rej</td>
                                <td style="text-align:center;background-color: coral;">Insurance Rejection</td>
                                <td style="text-align:center;background-color: coral;">ERA Payer Denied</td>
                            </tr>
                            <tr>
                                <td><input  style="width: 160px;"   type="number"  step="0.01"  name="software_field_master_id[43]" value="{{isset($software_field_master_id[43])?$software_field_master_id[43]:0}}"></td>
                                <td><input  style="width: 160px;"   type="number"  step="0.01"  name="software_field_master_id[44]" value="{{isset($software_field_master_id[44])?$software_field_master_id[44]:0}}"></td>
                                <td><input   style="width: 160px;"  type="number"  step="0.01"  name="software_field_master_id[45]" value="{{isset($software_field_master_id[45])?$software_field_master_id[45]:0}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!--row 2 end-->
            <!--row 3 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="8" > Insurence Ar Information</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">Bucket</td>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                    <td style="text-align:center;background-color: coral;">121-150</td>
                                    <td style="text-align:center;background-color: coral;">151-180</td>
                                    <td style="text-align:center;background-color: coral;"> >180</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 122px;">Amount</td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  pattern="[0-9]" name="software_field_master_id[46]" value="{{isset($software_field_master_id[46])?$software_field_master_id[46]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[48]" value="{{isset($software_field_master_id[48])?$software_field_master_id[48]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[50]" value="{{isset($software_field_master_id[50])?$software_field_master_id[50]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[52]" value="{{isset($software_field_master_id[52])?$software_field_master_id[52]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[54]" value="{{isset($software_field_master_id[54])?$software_field_master_id[54]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[56]" value="{{isset($software_field_master_id[56])?$software_field_master_id[56]:0}}"></td>
         <td style="max-width: 130px;"><input style="max-width: 125px;"   type="number"  step="0.01"  name="software_field_master_id[58]" value="{{isset($software_field_master_id[58])?$software_field_master_id[58]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 3 end-->
            <!--row 4 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="8" > Patient Ar Information</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">Bucket</td>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                    <td style="text-align:center;background-color: coral;">121-150</td>
                                    <td style="text-align:center;background-color: coral;">151-180</td>
                                    <td style="text-align:center;background-color: coral;"> >180</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 122px;">Amount</td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[62]" value="{{isset($software_field_master_id[62])?$software_field_master_id[62]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[64]" value="{{isset($software_field_master_id[64])?$software_field_master_id[64]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[66]" value="{{isset($software_field_master_id[66])?$software_field_master_id[66]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[68]" value="{{isset($software_field_master_id[68])?$software_field_master_id[68]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[70]" value="{{isset($software_field_master_id[70])?$software_field_master_id[70]:0}}"></td>
                                    <td style="max-width: 122px;"><input  type="number"  step="0.01"  name="software_field_master_id[72]" value="{{isset($software_field_master_id[72])?$software_field_master_id[72]:0}}"></td>
          <td style="max-width: 130px;"><input style="max-width: 125px;"  type="number"  step="0.01"  name="software_field_master_id[74]" value="{{isset($software_field_master_id[74])?$software_field_master_id[74]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 4 end-->
             <!--row 4 start-->
<!--            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="7" > Insurance + Patient AR</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                    <td style="text-align:center;background-color: coral;">121-150</td>
                                    <td style="text-align:center;background-color: coral;">151-180</td>
                                    <td style="text-align:center;background-color: coral;"> >180</td>
                                </tr>
                                <tr>
                                  
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[2]" value="{{isset($software_field_master_id[2])?$software_field_master_id[2]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                    <td style="max-width: 130px;"><input  type="number"  step="0.01"  name="software_field_master_id[2]" value="{{isset($software_field_master_id[2])?$software_field_master_id[2]:0}}"></td>
                                    <td style="max-width: 130px;"><input style="max-width: 130px;"   type="number"  step="0.01"  name="software_field_master_id[3]" value="{{isset($software_field_master_id[3])?$software_field_master_id[3]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>-->
            <!--row 4 end-->
            <!--row 5 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="4" >Daily Collection Details</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">$Insurance Collection</td>
                                    <td style="text-align:center;"><input style="height: 47px;width: 115px;"  type="number"  step="0.01"  name="software_field_master_id[85]" value="{{isset($software_field_master_id[85])?$software_field_master_id[85]:0}}"></td>
                                    <td style="text-align:center;background-color: coral;">$Patient Collection</td>
                                    <td style="text-align:center;"><input style="height: 47px;width: 115px;"  type="number"  step="0.01"  name="software_field_master_id[86]" value="{{isset($software_field_master_id[86])?$software_field_master_id[86]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="2" >Daily Obtained Reffaral</td>
                                </tr>
                                <tr style="height: 47px;">
                                    <td style="text-align:center;background-color: coral;width: 50%;">count</td>
                                    <td style="text-align:center;">
                                        <input style="height: 47px;width: 115px;"  type="number"  step="0.01"  name="software_field_master_id[88]" value="{{isset($software_field_master_id[88])?$software_field_master_id[88]:0}}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 5 end-->
            <!--row 6 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="8" > Medicare Financials</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Pending</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Month of Date</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >App to Pay</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Year to Date</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 110px;"><input  type="number"  step="0.01"  name="software_field_master_id[125]" value="{{isset($software_field_master_id[125])?$software_field_master_id[125]:0}}"></td>
                                    <td style="max-width: 110px;"><input  type="number"  step="0.01"  name="software_field_master_id[126]" value="{{isset($software_field_master_id[126])?$software_field_master_id[126]:0}}"></td>
                                    <td style="max-width: 110px;"><input  type="number"  step="0.01"  name="software_field_master_id[131]" value="{{isset($software_field_master_id[131])?$software_field_master_id[131]:0}}"></td>
                                    <td style="max-width: 110px;"><input  type="number"  step="0.01"  name="software_field_master_id[132]" value="{{isset($software_field_master_id[132])?$software_field_master_id[132]:0}}"></td>
                                    <td style="max-width: 110px;"><input  type="number"  step="0.01"  name="software_field_master_id[137]" value="{{isset($software_field_master_id[137])?$software_field_master_id[137]:0}}"></td>
                                    <td style="max-width: 110px;"><input  type="number"  step="0.01"  name="software_field_master_id[138]" value="{{isset($software_field_master_id[138])?$software_field_master_id[138]:0}}"></td>
                                    <td style="max-width: 110px;"><input  type="number"  step="0.01"  name="software_field_master_id[143]" value="{{isset($software_field_master_id[143])?$software_field_master_id[143]:0}}"></td>
         <td style="max-width: 130px;"><input style="max-width: 120px;"   type="number"  step="0.01"  name="software_field_master_id[144]" value="{{isset($software_field_master_id[144])?$software_field_master_id[144]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 6 end-->
            <!--row 7 start-->
            <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                <h2>ECW</h2>
                <a class="btn btn-primary" href="{{ route('clientdashboard.show',['id'=>$clientId]) }}"> Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!--row 7 end-->
    </div>
   @elseif($swMstrId == '3')
<!--   Athina-->
    <div class="col-xs-12 col-sm-12 col-md-12">
       
        <!--row 1 start-->
        <div class="form-group margin-10">
            <div class="row" style="padding-top: 10px;">
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr style="height: 50px;width: 50px;">
                                <td style="text-align:center;background-color: grey;width: 100px;">Date</td>
                                <td style="text-align:center;width: 100px;">
                                    {{$software_field_master_id['date']}}
                                     <input type='hidden' name='date' value="{{$software_field_master_id['date']}}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                   
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9">
                    <table border="2">
                        <tbody>
                            <tr style="height: 50px;">
                                <td style="text-align:center;background-color: yellow;width: 145px;">Color Code</td>
                                <td style="text-align:center;background-color: grey;width: 130px;">Header</td>
                                <td style="text-align:center;background-color: Coral;width: 130px;">Sub-Header</td>
                                <!--<td style="text-align:center;background-color: blue;width: 100px;">Auto generated</td>-->
                                <td style="text-align:center;background-color: while;width: 130px;">Updated data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--row 1 end-->
        <!--row 2 start-->
        <div class="form-group margin-10">
            <div class="row" style="padding-top: 10px;">
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr><td style="text-align:center;background-color: grey;">Visits/ Units</td></tr>
                            <tr><td style="text-align:center;background-color: coral;">#Units/Visits Billed</td></tr>
                            <tr><td><input  type="number"  step="0.01"  name="software_field_master_id[89]"  value="{{isset($software_field_master_id[89])?$software_field_master_id[89]:0}}"></td></tr>
                        </tbody>
                    </table>
                  
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 center">
                    <table border="2">
                        <tbody>
                            <tr><td style="text-align:center;background-color: grey;">Billed Charges</td></tr>
                            <tr><td style="text-align:center;background-color: coral;">#Charges Billed</td></tr>
                            <tr><td><input  type="number"  step="0.01"  name="software_field_master_id[90]"  value="{{isset($software_field_master_id[90])?$software_field_master_id[90]:0}}"></td></tr>
                        </tbody>
                    </table>
                  
                </div>
               
            </div>
            </div>
            <!--row 2 end-->
            <!--row 3 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="8" > Insurence Ar Information</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">Bucket</td>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                    <td style="text-align:center;background-color: coral;"> >121</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;">Amount</td>
                                    <td style="max-width: 180px;"><input type="number"  step="0.01"  name="software_field_master_id[91]" value="{{isset($software_field_master_id[91])?$software_field_master_id[91]:0}}"></td>
                                    <td style="max-width: 180px;"><input type="number"  step="0.01" name="software_field_master_id[93]" value="{{isset($software_field_master_id[93])?$software_field_master_id[93]:0}}"></td>
                                    <td style="max-width: 180px;"><input type="number"  step="0.01" name="software_field_master_id[95]" value="{{isset($software_field_master_id[95])?$software_field_master_id[95]:0}}"></td>
                                    <td style="max-width: 180px;"><input type="number"  step="0.01" name="software_field_master_id[97]" value="{{isset($software_field_master_id[97])?$software_field_master_id[97]:0}}"></td>
                                    <td style="max-width: 180px;"><input style="max-width: 130px;" type="number"  step="0.01" name="software_field_master_id[99]" value="{{isset($software_field_master_id[99])?$software_field_master_id[99]:0}}"></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 3 end-->
            <!--row 4 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="8" > Patient Ar Information</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">Bucket</td>
                                    <td style="text-align:center;background-color: coral;">0-30</td>
                                    <td style="text-align:center;background-color: coral;">31-60</td>
                                    <td style="text-align:center;background-color: coral;">61-90</td>
                                    <td style="text-align:center;background-color: coral;">91-120</td>
                                    <td style="text-align:center;background-color: coral;"> >121</td>
                                </tr>
                                <tr>
                                    <td style="min-width: 70px;">Amount</td>
                                    <td style="max-width: 180px;"><input  type="number"  step="0.01"  name="software_field_master_id[103]" value="{{isset($software_field_master_id[103])?$software_field_master_id[103]:0}}"></td>
                                    <td style="max-width: 180px;"><input  type="number"  step="0.01"  name="software_field_master_id[105]" value="{{isset($software_field_master_id[105])?$software_field_master_id[105]:0}}"></td>
                                    <td style="max-width: 180px;"><input  type="number"  step="0.01"  name="software_field_master_id[107]" value="{{isset($software_field_master_id[107])?$software_field_master_id[107]:0}}"></td>
                                    <td style="max-width: 180px;"><input  type="number"  step="0.01"  name="software_field_master_id[109]" value="{{isset($software_field_master_id[109])?$software_field_master_id[109]:0}}"></td>
                                    <td style="max-width: 180px;"><input style="max-width: 130px;"  type="number"  step="0.01"  name="software_field_master_id[111]" value="{{isset($software_field_master_id[111])?$software_field_master_id[111]:0}}"></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 4 end-->
            <!--row 5 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="4" >Daily Collection Details</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;">$Insurance Collection</td>
                                    <td style="text-align:center;"><input style="height: 47px;"  type="number"  step="0.01"  name="software_field_master_id[120]" value="{{isset($software_field_master_id[120])?$software_field_master_id[120]:0}}"></td>
                                    <td style="text-align:center;background-color: coral;">$Patient Collection</td>
                                    <td style="text-align:center;"><input style="height: 47px;"  type="number"  step="0.01"  name="software_field_master_id[121]" value="{{isset($software_field_master_id[121])?$software_field_master_id[121]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
            </div>
            <!--row 5 end-->
            <!--row 6 start-->
            <div class="form-group margin-10">
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table border="2">
                            <tbody>
                                <tr>
                                    <td style="text-align:center;background-color: grey;"
                                        colspan="8" > Medicare Financials</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Pending</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Month of Date</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >App to Pay</td>
                                    <td style="text-align:center;background-color: coral;"colspan="2" >Year to Date</td>
                                </tr>
                                <tr>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[127]" value="{{isset($software_field_master_id[127])?$software_field_master_id[127]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[128]" value="{{isset($software_field_master_id[128])?$software_field_master_id[128]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[133]" value="{{isset($software_field_master_id[133])?$software_field_master_id[133]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[134]" value="{{isset($software_field_master_id[134])?$software_field_master_id[134]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[139]" value="{{isset($software_field_master_id[139])?$software_field_master_id[139]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[140]" value="{{isset($software_field_master_id[140])?$software_field_master_id[140]:0}}"></td>
                                    <td style="max-width: 115px;"><input  type="number"  step="0.01"  name="software_field_master_id[145]" value="{{isset($software_field_master_id[145])?$software_field_master_id[145]:0}}"></td>
                                    <td style="max-width: 115px;"><input style="max-width: 115px;"  type="number"  step="0.01"  name="software_field_master_id[146]" value="{{isset($software_field_master_id[146])?$software_field_master_id[146]:0}}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--row 6 end-->
            
             <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
             <h2>Athina</h2>
            <a class="btn btn-primary" href="{{ route('clientdashboard.show',['id'=>$clientId]) }}"> Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   @endif
    
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