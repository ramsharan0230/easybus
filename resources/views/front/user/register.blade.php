@extends('layouts.front')
@section('title','Register')
@section('content')
<section class="first_section">
	<div class="container p_tb40">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 ">
				<div class="height_manage box_shadow">
					<form action="{{route('client-register')}}" method="post" class="form form-horizontal">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-4 col-sm-12 ">
								<div class="row">
									<div class="col-lg-12">
										<ul class="why_register"> 
											<h2  class="text-uppercase font_20">why create account ?</h2>
											<li>
											 <i class="fa fa-asterisk" aria-hidden="true"></i>

											 To view  tickets history
											</li>
											<li>
											<i class="fa fa-asterisk" aria-hidden="true"></i>

											 To view  personal profile
											</li>
											<li>
											<i class="fa fa-asterisk" aria-hidden="true"></i>

											 Print your ticket anytime.
											</li>
											<li>
											<i class="fa fa-asterisk" aria-hidden="true"></i>

											 Earn tickets while you travel
											</li>
										</ul>

									</div>
								</div>
							</div>
							<div class="col-lg-8 col-sm-12 p_lr0 new_registration">
										@if(Session::has('message1'))
										<div class="alert alert-success alert-dismissible message">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									      		<span aria-hidden="true">&times;</span>
									    	</button>
									    	{!! Session::get('message1') !!}
										</div>
										@endif
									@if (count($errors) > 0)
									 <div class="alert alert-danger">
									 	<ul>                  
									 		@foreach($errors->all() as $error)
									 		<li>{{$error}}</li>
									 		@endforeach
									 	</ul>
									 </div>
									 @endif
								<div class="form-group user-register-form">

								<h3>Create Account</h3>
									 
									<!-- <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Full Name :</label> -->
										<div class="input-group mb-3">
											<input type="text" name="name" class="form-control  border_radius0" placeholder="Full Name">
											<!-- <div class="input-group-prepend">
										    	<span class=" input-group-text input_icon" id="basic-addon1"></span>
										  	</div> -->
										  	
										</div>
										
					
									<!-- <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Mobile No. :</label> -->

										<div class="input-group mb-3">
											<input type="text" name="mobile_number" class="form-control  border_radius0" placeholder="Mobile No" value="">
											<!-- <div class="input-group-prepend">
										    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-phone"></i></span>
										  	</div> -->
										  	
										</div>
										
				
									<!-- <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Email :</label> -->
										 
										<div class="input-group mb-3">
											<input type="text" name="email" class="form-control  border_radius0" placeholder="Email Address" value="">
											<!-- <div class="input-group-prepend">
										    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-user"></i></span>
										  	</div> -->
										  	
										</div>
										
					
									<!-- <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Password :</label> -->
										<div class="input-group mb-3">
											<input type="password" name="password" class="form-control  border_radius0" placeholder="password">
											<!-- <div class="input-group-prepend">
										    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-key"></i></span>
										  	</div> -->
										  	
										</div>
										
				
									<!-- <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Re-password :</label> -->
										 
										<div class="input-group mb-3">
											<input type="password" name="password_confirmation" class="form-control  border_radius0" placeholder="Re-type Password">
											<!-- <div class="input-group-prepend">
										    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-key"></i></span>
										  	</div> -->
										</div>
										<!-- <div class="error">{{ $errors->first('password') }}</div> -->
						
							  
							 
									 
										<button type="submit" class="btn btn-success border_radius0 text-uppercase"> Register Now</button>
			
									 
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			 
		</div>
	</div>
</section>
 

@endsection