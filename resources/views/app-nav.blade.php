<!DOCTYPE html>
<html>
<head>
	<title>Student Record Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css">
	{!! Html::style("css/flaticons/flaticon.css")!!}

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/home">{!! Html::image('img/logo.png', 'logo', array('class' => 'logo','width'=>200)) !!}</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome, <span class='btn-link-custom'>{{ Auth::user()->name }}</span><span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-menu-custom" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								<li><a href="{{ url('/auth/register') }}">Register</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="dashboard-icon-panel">
						<a href="/home"><span class="flaticon-dataanalytics1"></span></a>
						<a href="/home">Dashboard</a>
				</div>
				<div class="dashboard-icon-panel">
					<a href="/std"><span class="flaticon-rocket60"></span> </a>
					<a href="/home">Add Student</a>
				</div>
				<div class="dashboard-icon-panel">
					<a href="/stdinfo"><span class="flaticon-draft1"></span> </a>
					<a href="/home">Add Student Info</a>
				</div>
			</div>
			<div class="col-md-10">
				<div class="panel panel-default panel-default-custom">
					<div class="panel-heading panel-heading-cust">
						<div class="row">
							<div class="col-sm-6">
								<h2 class="title">{{{ isset($student['header']) ? $student['header'] : 'Student Management System' }}}</h2>
								
							</div>
							<div class="col-sm-6">
								<a class=" pull-right btn-custom btn-custom-title header-create" href="/std/create"><i class="flaticon-write12"></i>Create</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						
						@if (Session::has('message'))
						    <div class="alert alert-info alert-info-custom">{{ Session::get('message') }}</div>
						@endif
						@yield('content')
						</div>
				</div>
			</div>
		</div>
	</div>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript">
				$(document).ready(function(){
				    $(".alert-info-custom").slideUp(2000);
				    
				});
		</script>
</body>
</html>