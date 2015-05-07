@extends('app-nav')

@section('content')
			<div class="wrapper">
				<ul>
				  @foreach($errors->all() as $error)
				    <li>{{ $error}}</li>
				  @endforeach
				</ul>
				{!! Form::open(array('url' => 'stdinfo/','class' => 'form')) !!}

					<div class="form-group">
					    {!! Form::label('Student Name') !!}
					    {!! Form::select('student_id', 
					    		$student,
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
					    				'placeholder' => 'YYYY-MM-DD',
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
					    {!! Form::submit('Add', 
					      array('class'=>'btn btn-custom')) !!}
					</div>

				{!! Form::close();!!}
			</div>		
@endsection