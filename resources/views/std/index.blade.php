@extends('app-nav')

@section('content')

					<div class="wrapper">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-condensed table-bordered" id="articles">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Operations</th>								
								</tr>
							</thead>
							<tbody>
								<?php $id=1;?>
								@foreach($student as $students)
									<tr>			
										<td>{{$id++}}</td>
										<td><a class="btn-link-custom-green" href="/std/{{ $students['id'] }}">{{$students['name']}}</a></td>
										<td>{{$students['email']}}</td>			
										<td><a class="btn btn-primary btn-custom btn-custom-margin" href="/std/{{ $students['id']}}/edit"><i class="icon-list-alt"></i>Edit</a>
											<a class="btn btn-primary btn-custom btn-custom-margin" href="/stdinfo/create/{{ $students['id']}}"><i class="icon-list-alt"></i>Update Info</a>
										{!! Form::open(array('url' => 'std/'.$students['id'], 'class' => 'block')) !!}
										    {!! Form::hidden('_method', 'DELETE') !!}
										    {!! Form::submit('Delete') !!}
										{!! Form::close() !!}
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>		
				
	
@endsection	
	