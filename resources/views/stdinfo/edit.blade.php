@extends('app-nav')

@section('content')
			<div class="wrapper">
				{!! Form::model($student, array('route' => array('stdinfo.update',$student->id), 'method' => 'PUT')) !!}

					
					<div class="form-group">
					    {!! Form::label('Student Name') !!}
					    {!! Form::text('name', 
					    		null,
					    		array(
					              'class'=>'form-control') 
					    				) !!}
					</div>

					<div class="form-group">
					    {!! Form::label('Sex') !!}
					    {!! Form::select('sex', 
					    		array(
					              'Male'=>'Male',
					              'Female'=>'Female' 
					    				),
					    		null,
					    		array(
					              'class'=>'form-control') 
					    				) !!}
					</div>

					<div class="form-group">
					    {!! Form::label('Date Of Birth') !!}
					    {!! Form::text('date', 
					    				null, 
					    				array(
					    					'type' => 'text', 
					    					'class' => 'form-control datepicker',
					    				'placeholder' => 'Enter Student Date Of Birth',
					    				'id' => 'calendar')) !!}
					</div>

					<div class="form-group">
					    {!! Form::label('Address') !!}
					    {!! Form::text('address', null, 
					        array('required', 
					              'class'=>'form-control', 
					              'placeholder'=>'Student Address')) !!}
					</div>

					<div class="form-group">
					    {!! Form::label('Father Name') !!}
					    {!! Form::text('fname', null, 
					        array('required', 
					              'class'=>'form-control', 
					              'placeholder'=>'Father Name')) !!}
					</div>

					

					<div class="form-group">
					    {!! Form::label('Description') !!}
					    {!! Form::textarea('description', null, 
					        array('required', 
					              'class'=>'form-control', 
					              'placeholder'=>'Student Description')) !!}
					</div>

					<div class="form-group">
					    {!! Form::submit('Update', 
					      array('class'=>'btn btn-custom')) !!}
					</div>

				{!! Form::close();!!}
			</div>		
@endsection