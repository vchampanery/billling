@extends('admin_template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Patient</h2>
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
   
    @foreach($fields as $key => $value)
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="row">
            <strong>{{trans('billing.'.$value)}}</strong>
            {!! Form::text($value, null, array('placeholder' => 'Name','class' => 'form-control','onchange'=>"testthis($value);")) !!}
            </div>
        </div>
    </div>
    @endforeach
   
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection

<script type="text/javascript">  
    jQuery('#startdate').datepicker({ 
        autoclose: true,   
        format: 'yyyy-mm-dd'  
    });
    function testthis(key){
        console.dir(key.name);
    }
</script>