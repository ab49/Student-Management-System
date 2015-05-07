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
				<div class="form-group row">
					<div class="col-sm-4">
						{!! Form::label('Sex:', null, ['class' => 'pull-right label-custom']) !!}	
					</div>
					<div class="col-sm-4">
						{{$student['sex']}}	
					</div>
				    
				</div>
				<div class="form-group row">
					<div class="col-sm-4">
						{!! Form::label('Date Of Birth:', null, ['class' => 'pull-right label-custom']) !!}	
					</div>
					<div class="col-sm-4">
						{{$student['date']}}	
					</div>
				    
				</div>
				<div class="form-group row">
					<div class="col-sm-4">
						{!! Form::label('Address:', null, ['class' => 'pull-right label-custom']) !!}	
					</div>
					<div class="col-sm-4">
						{{$student['address']}}	
					</div>
				    
				</div>
				<div class="form-group row">
					<div class="col-sm-4">
						{!! Form::label('Father Name:', null, ['class' => 'pull-right label-custom']) !!}	
					</div>
					<div class="col-sm-4">
						{{$student['fname']}}	
					</div>
				    
				</div>
				<div class="form-group row">
					<div class="col-sm-4">
						{!! Form::label('Description:', null, ['class' => 'pull-right label-custom']) !!}	
					</div>
					<div class="col-sm-4">
						{{$student['description']}}	
					</div>
				    
				</div>
				
			</div>		
@endsection