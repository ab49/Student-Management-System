@extends('app-nav')

@section('content')
			<div class="wrapper">
				<ul>
				  @foreach($errors->all() as $error)
				    <li>{{ $error}}</li>
				  @endforeach
				</ul>
				{!! Form::open(array('url' => 'std/','class' => 'form')) !!}

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
					    {!! Form::submit('Add', 
					      array('class'=>'btn btn-custom')) !!}
					</div>

				{!! Form::close();!!}
			</div>		
@endsection