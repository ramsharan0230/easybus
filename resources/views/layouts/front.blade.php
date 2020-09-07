<!DOCTYPE html>
<html>
<head>
	<title>Easybus Home</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('front/css/nepaliDatePicker.css')}}">
	<link rel="stylesheet" href="{{asset('js/nepali.datepicker.v2.2.min.css')}}">
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	  
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
</head>
<body>
	<div class=" top_header text-capitalize">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-6  header_back">
					<header id="header" class="">
						<nav class="navbar navbar-expand-md">
					  		<a class="navbar-brand header_logo" href="{{route('home')}}">
					  			<img src="{{asset('front/images/easybus-logo.png')}}" alt="">
					  		</a>
					  		
				  			<div class="collapse navbar-collapse" id="navbarNav">
							    <ul class="navbar-nav">
							    	<li class="serviceName"> 
										<h1>easybus</h1>
							    	</li>
									<!-- <li class="nav-item active">
										<a class="nav-link" href="./">Home <span class="sr-only"></span></a>
									</li> -->
									<!-- <li class="nav-item dropdown">
								        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          Bus Tickets
								        </a>
								        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
								          	<a class="dropdown-item" href="#">print ticket</a>
								          	<a class="dropdown-item" href="#">cancel ticket</a>
								          	 
								        </div>
								      </li> -->
									 
									<!-- <li class="nav-item">
										<a class="nav-link" href="#">How to buy ticket ?</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Features</a>
									</li> -->
							    </ul>
					  		</div>
						</nav>
					</header> 
				</div>
				<div class="col-lg-4 col-md-4 col-6  account_option text-right">
					<ul>
						 @if(Auth::guard('admin')->user())
						<li><a href="{{route('clientLogout')}}" ><i class="fa fa-lock" ></i> logout</a></li>
						<li><a href="{{route('account')}}"><i class="fas fa-sign-in-alt"></i> Dashboard</a></li>
						
						@else
						<li><a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-lock" ></i> login</a></li>
						
						<li><a href="{{route('userRegister')}}"><i class="fas fa-sign-in-alt"></i> register</a></li>
						@endif

						<!-- <li><a href=""><i class="fas fa-question-circle"></i> enquiry</a></li>
						<li><a href=""><i class="fas fa-phone-volume"></i> contact</a></li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="header-push"></div>
 
	<div class=" header_back">

		<div class="container">
			
			
		</div>
		
	</div>

@yield('content')
	<div class="container p_tb20 footer">
		<div class="all_footer">
			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-12 text-capitalize">
					<!-- <ul class="font_14 footer_menu">
						<h2 class="font_18">legal</h2>
						<li><a href="privacy_page.php">terms & conditions</a></li>
						<li><a href="">FAQs</a></li>
					</ul> --> 
				</div>
				<div class="col-lg-4 col-md-3 col-sm-12 text-capitalize">
					<!-- <ul class="font_14 footer_menu">
						<h2 class="font_18">about us</h2>
						<li><a href="privacy_page.php">why easybus ?</a></li>
						<li><a href="">FAQs</a></li>
					</ul> -->
				</div>
				<div class="col-lg-4 col-md-3 col-sm-12 text-center p_t20 footer_border_top">
					<h3 class="logo_back">easy<i class="fa fa-bus"></i><span class="">us</span></h3>
				</div>
				
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<p>
						<span class="copyrights-text font_13">© <?php  echo date('Y'); ?> Copyrights Reserved at EASYBUS</span>
					</p>
					<a href="{{route('counterRegister')}}" class="btn btn-info">Counter Register</a>
					<a href="{{route('vendorRegister')}}" class="btn btn-info">Vendor Register</a>
					<a href="{{route('login')}}">Login</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 webhouse_nepal">
					<p>
						<span class="copyrights-text font_13">
							Designed & Developed by: <a href="https://webhousenepal.com" title="https://webhousenepal.com" target="_blank">webhousenepal.com</a>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Button trigger modal -->
 

 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Login your Account</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<form action="{{route('clientLogin')}}" class="form form-horizontal" method="post">
      			{{csrf_field()}}
	      		<div class="modal-body">
	    			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="input-group mb-3">
								<input type="text" name="email" class="form-control  border_radius0" placeholder="username or Email Address" value="">
								<div class="input-group-prepend">
							    	<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
							  	</div>
							</div>
						</div>
	    			</div>
	    			<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="input-group mb-3">
								<input type="password" name="password" class="form-control  border_radius0" placeholder="Password" value="">
								<div class="input-group-prepend">
							    	<span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
							  	</div>
							</div>
						</div>
	    			</div>
	      		</div>
	      		<div class="modal-footer login_account">

	        		<div class="row p_l0">
	        			<div class="col-lg-12 p_lr0">
	        				<button type="submit" class="btn btn-primary">Login</button> 
	        			</div>
	        			<div class="col-lg-12 p_t20 font_13 p_lr0">
	        				<a href="register.php" > Don't have an account  Register</a> <br>
	        				  <a href="recover_mail.php"> Forgot Password ?</a>
	        			</div>
	        		</div>
	      		</div>
      		</form>
    	</div>
  	</div>
</div>


	<script src="{{asset('front/js/jquery.min.js')}}"></script>
	<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
	<script src="{{asset('front/js/main.js')}}" type="text/javascript"></script>
	 
</body>
</html>
<script>

	// var currentDate = new Date();
	// var currentNepaliDate = calendarFunctions.getBsDateByAdDate(currentDate.getFullYear(), currentDate.getMonth() + 1, currentDate.getDate());
	// var formatedNepaliDate = calendarFunctions.bsDateFormat("%y-%m-%d", currentNepaliDate.bsYear, currentNepaliDate.bsMonth, currentNepaliDate.bsDate);
	 

$(".bod-picker").val();
$(".bod-picker").nepaliDatePicker({
    dateFormat: "%y-%m-%d",
    closeOnDateSelect: true,
    // minDate: formatedNepaliDate
});

$(".bod-picker1").val();
$(".bod-picker1").nepaliDatePicker({
    dateFormat: "%y-%m-%d",
    closeOnDateSelect: true,
    // minDate: formatedNepaliDate
});

 
</script>
@stack('scripts')
