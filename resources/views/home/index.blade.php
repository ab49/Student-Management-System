@extends('app-nav-home')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4">
				<div class="dashboard-icon">
					<a href="/home"><span class="flaticon-dataanalytics1"></span></a>
					<a href="/home">Dashboard</a>
				</div>
					
			</div>
			<div class="col-sm-4">
				<div class="dashboard-icon">
					<a href="/std"><span class="flaticon-rocket60"></span> </a>
					<a href="/home">Add Student</a>
				</div>
					
			</div>
			<div class="col-sm-4">
				<div class="dashboard-icon">
					<a href="/stdinfo"><span class="flaticon-draft1"></span> </a>
					<a href="/home">Add Student Info</a>
				</div>
					
			</div>
		</div>
	</div>
			
@endsection