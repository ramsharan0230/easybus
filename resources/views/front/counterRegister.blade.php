@extends('layouts.front')
@section('title','Register')
@section('content')
<section class="first_section">
	<div class="container p_tb40">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="counter-rgister-form">
					<h3>Company Information</h3>

					<form action="" class="company-info-form">
						<label for="">Company Name</label>
						<input type="text" placeholder="">
						<label for="">Address</label>
						<input type="text" placeholder="">
						<label for="">Contact Number</label>
						<input type="text" placeholder="">
						<label for="">Company Register Number</label>
						<input type="text" placeholder="">
						<label for="">Company Pan Number</label>
						<input type="text" placeholder="">
						<label for="">Company Register Document</label>
						<input type="file" placeholder="">
						<label for="">Company Pan Document</label>
						<input type="file" placeholder="">
						<button>Next</button> 
					</form>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="counter-rgister-form">
					<h3>Owner Information</h3>

					<form action="" class="company-info-form">
						<label for="">Owner Full Name</label>
						<input type="text" placeholder="">
						<label for="">Permanent Address</label>
						<input type="text" placeholder="">
						<label for="">Phone Number</label>
						<input type="text" placeholder="">
						<label for="">Father Name</label>
						<input type="text" placeholder="">
						<label for="">Mother Name</label>
						<input type="text" placeholder="">
						<label for="">Citizenship Number</label>
						<input type="text" placeholder="">
						<label for="">Citizenship Card Document One Side</label>
						<input type="file" placeholder="">
						<label for="">Citizenship Card Document Other Side</label>
						<input type="file" placeholder="">
						<label for="">Owner Passport Size Photo</label>
						<input type="file" placeholder="">
						<button>Next</button> 
					</form>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="counter-rgister-form">
					<h3>Account Information</h3>

					<form action="" class="company-info-form" autocomplete="off">
						<label for="">Email Address</label>
						<input type="email" placeholder="" autocomplete="off">
						<label for="">Username</label>
						<input type="text" placeholder="" autocomplete="off">
						<label for="">Password</label>
						<input type="password" placeholder="" autocomplete="off">
						<label for="">Re-inter Password</label>
						<input type="password" placeholder="" autocomplete="off">
						<button class="register-btn">Register</button> 
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
 

@endsection
@push('scripts')
<script>
	$(document).ready(function(){
		$('.btn_nextone').click(function(e){
			e.preventDefault();
			$('#nav-home').removeClass('active').removeClass('show');
			$('#nav-profile').addClass('active').addClass('show');
			$('#nav-home-tab').removeClass('active');
			$('#nav-profile-tab').addClass('active');
		})
		$('.btn_prevone').click(function(e){
			e.preventDefault();
			$('#nav-home').addClass('active').addClass('show');
			$('#nav-profile').removeClass('active').removeClass('show');
			$('#nav-home-tab').addClass('active');
			$('#nav-profile-tab').removeClass('active');
		})
		$('.btn_nexttwo').click(function(e){
			e.preventDefault();
			$('#personal-detail').addClass('active').addClass('show');
			$('#nav-profile').removeClass('active').removeClass('show');
			$('#nav-personal-detail').addClass('active');
			$('#nav-profile-tab').removeClass('active');
			 
		})
		$('.btn_prevtwo').click(function(){
			$('#personal-detail').removeClass('active').removeClass('show');
			$('#nav-profile').addClass('active').addClass('show');
			$('#nav-personal-detail').removeClass('active');
			$('#nav-profile-tab').addClass('active');
		})
	})
</script>
@endpush