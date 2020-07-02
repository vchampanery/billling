@extends('admin_template')


@section('content')
@include('layouts.test',['title'=>' User Management','breadcrumb'=>['User','listing'],'activePage'=>'listing'])

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<div id="app">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <router-view name="userIndex"></router-view>
    </div>
  </nav>
</div>
<h2>Vue js page</h2>
<table class="table table-bordered">
<tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>

<div class="flex-center position-ref full-height" id="app">
	<div class="container">
		<data-table
			fetch-url="{{ route('users.table') }}"
			:columns="['name', 'email', 'address' , 'created_at']"
		></data-table>
	</div>
</div>
{!! $data->render() !!}

<script src="{{ asset('js/app.js') }}"></script>
@endsection
