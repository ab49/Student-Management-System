<!DOCTYPE html>
<html>
<head>
	<title>Student Record Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
	{!! Html::style("css/style-chart.css")!!}
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
			
			<div class="col-md-10 col-md-offset-1">
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
		<?php $color=array(
					"0"=>"#FC4349",
					"1"=>"#6DBCDB",
					"2"=>"#2C3E50",
					"3"=>"#F7E248",
					"4"=>"#D7DADB",
					"5"=>"#fff"
					);
				$i=0;$k=0; ?>
		<script type="text/javascript">
			$(function(){
			            $("#doughnutChart").drawDoughnutChart([
			                    @if(isset($student))
			                    @foreach($student as $key=>$value)
			                      { title: "{{$k}}-{{$key}}", value : {{$value}},  color: "<?php echo $color[$i]?>" },
			                    	<?php $i++;$k=$key;?>	
			                    @endforeach
			                    @endif
			                    
			                  ]);
			                });
			            /*!
			             * jquery.drawDoughnutChart.js
			             * Version: 0.2(Beta)
			             * Inspired by Chart.js(http://www.chartjs.org/)
			             *
			             * Copyright 2013 hiro
			             * https://github.com/githiro/drawDoughnutChart
			             * Released under the MIT license.
			             * 
			             */
			            ;(function($, undefined) {
			              $.fn.drawDoughnutChart = function(data, options) {
			                var $this = this,
			                  W = $this.width(),
			                  H = $this.height(),
			                  centerX = W/2,
			                  centerY = H/2,
			                  cos = Math.cos,
			                  sin = Math.sin,
			                  PI = Math.PI,
			                  settings = $.extend({
			                    segmentShowStroke : true,
			                    segmentStrokeColor : "#0C1013",
			                    segmentStrokeWidth : 1,
			                    baseColor: "rgba(0,0,0,0.5)",
			                    baseOffset: 4,
			                    edgeOffset : 10,//offset from edge of $this
			                    percentageInnerCutout : 75,
			                    animation : true,
			                    animationSteps : 90,
			                    animationEasing : "easeInOutExpo",
			                    animateRotate : true,
			                    tipOffsetX: -8,
			                    tipOffsetY: -45,
			                    tipClass: "doughnutTip",
			                    summaryClass: "doughnutSummary",
			                    summaryTitle: "TOTAL:",
			                    summaryTitleClass: "doughnutSummaryTitle",
			                    summaryNumberClass: "doughnutSummaryNumber",
			                    beforeDraw: function(){  },
			                    afterDrawed : function(){  },
			                    onPathEnter : function(e,data){  },
			                    onPathLeave : function(e,data){  }
			                  }, options),
			                  animationOptions = {
			                    linear : function (t){
			                      return t;
			                    },
			                    easeInOutExpo: function (t) {
			                      var v = t<.5 ? 8*t*t*t*t : 1-8*(--t)*t*t*t;
			                      return (v>1) ? 1 : v;
			                    }
			                  };
			                var requestAnimFrame = function(){
			                  return window.requestAnimationFrame ||
			                    window.webkitRequestAnimationFrame ||
			                    window.mozRequestAnimationFrame ||
			                    window.oRequestAnimationFrame ||
			                    window.msRequestAnimationFrame ||
			                    function(callback) {
			                      window.setTimeout(callback, 1000 / 60);
			                    };
			                }();

			                settings.beforeDraw.call($this);

			                var $svg = $('<svg width="' + W + '" height="' + H + '" viewBox="0 0 ' + W + ' ' + H + '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>').appendTo($this),
			                  $paths = [],
			                  easingFunction = animationOptions[settings.animationEasing],
			                  doughnutRadius = Min([H/2,W/2]) - settings.edgeOffset,
			                  cutoutRadius = doughnutRadius * (settings.percentageInnerCutout/100),
			                  segmentTotal = 0;

			                //Draw base doughnut
			                var baseDoughnutRadius = doughnutRadius + settings.baseOffset,
			                  baseCutoutRadius = cutoutRadius - settings.baseOffset;
			                var drawBaseDoughnut = function(){
			                  var svgBase = document.createElementNS('http://www.w3.org/2000/svg', 'path'),
			                    $svgBase = $(svgBase).appendTo($svg);
			                  //Calculate values for the path.
			                  //We needn't calculate startRadius, segmentAngle and endRadius, because base doughnut doesn't animate.
			                  var startRadius = -1.570,// -Math.PI/2
			                    segmentAngle = 6.2831,// 1 * ((99.9999/100) * (PI*2)),
			                    endRadius = 4.7131,// startRadius + segmentAngle
			                    startX = centerX + cos(startRadius) * baseDoughnutRadius,
			                    startY = centerY + sin(startRadius) * baseDoughnutRadius,
			                    endX2 = centerX + cos(startRadius) * baseCutoutRadius,
			                    endY2 = centerY + sin(startRadius) * baseCutoutRadius,
			                    endX = centerX + cos(endRadius) * baseDoughnutRadius,
			                    endY = centerY + sin(endRadius) * baseDoughnutRadius,
			                    startX2 = centerX + cos(endRadius) * baseCutoutRadius,
			                    startY2 = centerY + sin(endRadius) * baseCutoutRadius;
			                  var cmd = [
			                    'M', startX, startY,
			                    'A', baseDoughnutRadius, baseDoughnutRadius, 0, 1, 1, endX, endY,
			                    'L', startX2, startY2,
			                    'A', baseCutoutRadius, baseCutoutRadius, 0, 1, 0, endX2, endY2,//reverse
			                    'Z'
			                  ];
			                  $svgBase[0].setAttribute("d", cmd.join(' '));
			                  $svgBase[0].setAttribute("fill", settings.baseColor);
			                }();

			                //Set up pie segments wrapper
			                var pathGroup = document.createElementNS('http://www.w3.org/2000/svg', 'g');
			                var $pathGroup = $(pathGroup).appendTo($svg);
			                $pathGroup[0].setAttribute("opacity",0);

			                //Set up tooltip
			                var $tip = $('<div class="' + settings.tipClass + '" />').appendTo('body').hide(),
			                  tipW = $tip.width(),
			                  tipH = $tip.height();

			                //Set up center text area
			                var summarySize = (cutoutRadius - (doughnutRadius - cutoutRadius)) * 2,
			                  $summary = $('<div class="' + settings.summaryClass + '" />').appendTo($this)
			                              .css({ 
			                                width: summarySize + "px",
			                                height: summarySize + "px",
			                                "margin-left": -(summarySize / 2) + "px",
			                                "margin-top": -(summarySize / 2) + "px"
			                              });
			                var $summaryTitle = $('<p class="' + settings.summaryTitleClass + '">' + settings.summaryTitle + '</p>').appendTo($summary);
			                var $summaryNumber = $('<p class="' + settings.summaryNumberClass + '"></p>').appendTo($summary).css({opacity: 0});

			                for (var i = 0, len = data.length; i < len; i++){
			                  segmentTotal += data[i].value;
			                  var p = document.createElementNS('http://www.w3.org/2000/svg', 'path');
			                  p.setAttribute("stroke-width", settings.segmentStrokeWidth);
			                  p.setAttribute("stroke", settings.segmentStrokeColor);
			                  p.setAttribute("fill", data[i].color);
			                  p.setAttribute("data-order", i);
			                  $paths[i] = $(p).appendTo($pathGroup);
			                  $paths[i]
			                    .on("mouseenter", pathMouseEnter)
			                    .on("mouseleave", pathMouseLeave)
			                    .on("mousemove", pathMouseMove);
			                }


			                //Animation start
			                animationLoop(drawPieSegments);

			                function pathMouseEnter(e){
			                  var order = $(this).data().order;
			                  $tip.text(data[order].title + ": " + data[order].value)
			                    .fadeIn(200);
			                  settings.onPathEnter.apply($(this),[e,data]);
			                }
			                function pathMouseLeave(e){
			                  $tip.hide();
			                  settings.onPathLeave.apply($(this),[e,data]);
			                }
			                function pathMouseMove(e){
			                  $tip.css({
			                    top: e.pageY + settings.tipOffsetY,
			                    left: e.pageX - $tip.width() / 2 + settings.tipOffsetX
			                  });
			                }
			                function drawPieSegments (animationDecimal){
			                  var startRadius = -Math.PI/2,//-90 degree
			                    rotateAnimation = 1;
			                  if (settings.animation && settings.animateRotate) {
			                    rotateAnimation = animationDecimal;//count up between0~1
			                  }

			                  drawDoughnutText(animationDecimal,segmentTotal);

			                  $pathGroup[0].setAttribute("opacity",animationDecimal);

			                  //draw each path
			                  for (var i = 0, len = data.length; i < len; i++){
			                    var segmentAngle = rotateAnimation * ((data[i].value/segmentTotal) * (PI*2)),
			                      endRadius = startRadius + segmentAngle,
			                      largeArc = ((endRadius - startRadius) % (PI * 2)) > PI ? 1 : 0,
			                      startX = centerX + cos(startRadius) * doughnutRadius,
			                      startY = centerY + sin(startRadius) * doughnutRadius,
			                      endX2 = centerX + cos(startRadius) * cutoutRadius,
			                      endY2 = centerY + sin(startRadius) * cutoutRadius,
			                      endX = centerX + cos(endRadius) * doughnutRadius,
			                      endY = centerY + sin(endRadius) * doughnutRadius,
			                      startX2 = centerX + cos(endRadius) * cutoutRadius,
			                      startY2 = centerY + sin(endRadius) * cutoutRadius;
			                    var cmd = [
			                      'M', startX, startY,//Move pointer
			                      'A', doughnutRadius, doughnutRadius, 0, largeArc, 1, endX, endY,//Draw outer arc path
			                      'L', startX2, startY2,//Draw line path(this line connects outer and innner arc paths)
			                      'A', cutoutRadius, cutoutRadius, 0, largeArc, 0, endX2, endY2,//Draw inner arc path
			                      'Z'//Cloth path
			                    ];
			                    $paths[i][0].setAttribute("d",cmd.join(' '));
			                    startRadius += segmentAngle;
			                  }
			                }

			                function drawDoughnutText(animationDecimal, segmentTotal){
			                  $summaryNumber
			                    .css({opacity: animationDecimal})
			                    .text((segmentTotal * animationDecimal).toFixed(1));
			                }
			                function animateFrame(cnt, drawData){
			                  var easeAdjustedAnimationPercent =(settings.animation)? CapValue(easingFunction(cnt),null,0) : 1;
			                  drawData(easeAdjustedAnimationPercent);
			                }
			                function animationLoop(drawData){
			                  var animFrameAmount = (settings.animation)? 1/CapValue(settings.animationSteps,Number.MAX_VALUE,1) : 1,
			                    cnt =(settings.animation)? 0 : 1;
			                  requestAnimFrame(function(){
			                      cnt += animFrameAmount;
			                      animateFrame(cnt, drawData);
			                      if (cnt <= 1){
			                        requestAnimFrame(arguments.callee);
			                      } else {
			                        settings.afterDrawed.call($this);
			                      }
			                  });
			                }
			                function Max(arr){
			                  return Math.max.apply(null, arr);
			                }
			                function Min(arr){
			                  return Math.min.apply(null, arr);
			                }
			                function isNumber(n) {
			                  return !isNaN(parseFloat(n)) && isFinite(n);
			                }
			                function CapValue(valueToCap, maxValue, minValue){
			                  if(isNumber(maxValue)) {
			                    if( valueToCap > maxValue ) {
			                      return maxValue;
			                    }
			                  }
			                  if(isNumber(minValue)){
			                    if ( valueToCap < minValue ){
			                      return minValue;
			                    }
			                  }
			                  return valueToCap;
			                }
			                return $this;
			              };
			            })(jQuery);
	
			            </script>
	

</body>
</html>