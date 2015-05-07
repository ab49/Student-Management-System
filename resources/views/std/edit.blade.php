@extends('app-nav')

@section('content')
			<div class="wrapper">
				{!! Form::model($student, array('route' => array('std.update',$student->id), 'method' => 'PUT')) !!}

					<div class="form-group">
					    {!! Form::label('Name') !!}
					    {!! Form::text('name', null, 
					        array('required', 
					              'class'=>'form-control', 
					              'placeholder'=>'Student Name')) !!}
					</div>
					<div class="form-group">
					    {!! Form::label('E-mail Address') !!}
					    {!! Form::text('email', null, 
					        array('required', 
					              'class'=>'form-control', 
					              'placeholder'=>'Student e-mail address')) !!}
					</div>

					<div class="form-group">
					    {!! Form::submit('Update', 
					      array('class'=>'btn btn-custom')) !!}
					</div>

				{!! Form::close();!!}
			</div>		
@endsection