@extends('app-nav')

@section('content')
			<div class="wrapper">
				<div class="form-group row">
					<div class="col-sm-4">
						{!! Form::label('Name:',null,['class' => 'pull-right label-custom']) !!}	
					</div>
					<div class="col-sm-4">
						{{$student['name']}}	
					</div>
				    
				</div>
				<div class="form-group row">
					<div class="col-sm-4">
						{!! Form::label('Email:', null, ['class' => 'pull-right label-custom']) !!}	
					</div>
					<div class="col-sm-4">
						{{$student['email']}}	
					</div>
				    
				</div>
				
				
			</div>		
@endsection