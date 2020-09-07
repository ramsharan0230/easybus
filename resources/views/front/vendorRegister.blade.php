@extends('layouts.front')
@section('title','Register')
@section('content')
<section class="first_section">
	<div class="container p_tb40">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 ">
				<div class="height_manage box_shadow">
					<form action="{{route('registerVendor')}}" method="post" class="form form-horizontal" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-4 col-sm-12 ">
								<div class="row">
									<div class="col-lg-12">
										{{--
										<ul class="why_register"> 
											<h2  class="text-uppercase font_20">why signing up with bus ?</h2>
											<li>
												<i class="fa fa-check-circle"></i>
											 To view  tickets history
											</li>
											<li>
												<i class="fa fa-check-circle"></i>
											 To view  personal profile
											</li>
											<li>
												<i class="fa fa-check-circle"></i>
											 Print your ticket anytime.
											</li>
											<li>
												<i class="fa fa-check-circle"></i>
											 Earn tickets while you travel
											</li>
										</ul>
										--}}

									</div>
								</div>
							</div>
							<div class="col-lg-5 col-sm-12 p_lr0 new_registration">
									<h2 class="p_b40">Register as Vendor</h2>
										
									@if(Session::has('message'))
									<div class="alert alert-success alert-dismissible message">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								      		<span aria-hidden="true">&times;</span>
								    	</button>
								    	{!! Session::get('message') !!}
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
									<div class="row">
									 	<div class="col-12 text-center m_b25">
											<nav class="register_account">
											  	<div class="nav nav-tabs" id="nav-tab" role="tablist">
												    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Step 1</a>

												    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Step 2</a>
												    <a class="nav-item nav-link" id="nav-personal-detail" data-toggle="tab" href="#personal-detail" role="tab">Step 3</a>
											  	</div>
											</nav>
									 	</div>
									</div>
									<div class="tab-content " id="nav-tabContent">
									  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									  		<div class="row form-group">
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Full Name* :</label>
												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="name" class="form-control  border_radius0" placeholder="Full Name" value="{{old('name')}}">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-user"></i></span>
													  	</div>
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Passport size image* (250*250) :</label>

												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="file" name="passport_image" class="form-control  border_radius0" placeholder="Company Reg. No" >
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-file"></i></span>
													  	</div>
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Email* :</label>
												<div class="col-lg-8 col-md-8 col-sm-8">
													 
													<div class="input-group mb-3">
														<input type="text" name="email" class="form-control  border_radius0" placeholder="Email Address" value="{{old('email')}}">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-at"></i></span>
													  	</div>
													  	
													</div>
													
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Password* :</label>
												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="password" name="password" class="form-control  border_radius0" placeholder="password">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-key"></i></span>
													  	</div>
													  	
													</div>
													
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Re-password* :</label>
												<div class="col-lg-8 col-md-8 col-sm-8">
													 
													<div class="input-group mb-3">
														<input type="password" name="password_confirmation" class="form-control  border_radius0" placeholder="">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-key"></i></span>
													  	</div>
													</div>
													<!-- <div class="error">{{ $errors->first('password') }}</div> -->
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 text-right">
									  				<button type="button" class="btn btn_nextone">NEXT</button>
													
												</div>
										  

									  		</div>
									  		 
									  	</div>
									  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
									  		<div class="row form-group">
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Name* :</label>
												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="company_name" class="form-control  border_radius0" placeholder="Company Name" value="{{old('company_name')}}">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-building"></i></span>
													  	</div>
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Address* :</label>
												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="address" class="form-control  border_radius0" placeholder="Company Addresss" value="{{old('address')}}">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
													  	</div>
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Phone* :</label>
												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="company_phone" class="form-control  border_radius0" placeholder="Company Phone" value="{{old('company_phone')}}">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-phone"></i></span>
													  	</div>
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Reg. no.* :</label>

												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="company_reg_no" class="form-control  border_radius0" placeholder="Company Reg. No" value="{{old('company_reg_no')}}">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-count"></i></span>
													  	</div>
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Upload Reg. Document* :</label>

												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="file" name="company_image" class="form-control  border_radius0" placeholder="Company Reg. No" >
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-file"></i></span>
													  	</div>
													</div>
												</div>

												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">  (PAN) Reg. no.*  :</label>

												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="pan" class="form-control  border_radius0" placeholder="PAN No." value="{{old('pan')}}">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-count"></i></span>
													  	</div>
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Upload(PAN)* :</label>

												<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="file" name="pan_image" class="form-control  border_radius0" placeholder="Company Reg. No">
														<div class="input-group-prepend">
													    	<span class=" input-group-text input_icon" id="basic-addon1"><i class="fa fa-file"></i></span>
													  	</div>
													</div>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 p_tb20 text-right">
													<button type="button" class="btn btn_prevone">PREV</button>
													<button type="button" class="btn btn_nexttwo">NEXT</button>
												</div>
									  		</div>
									  		 
									  	</div>
									  	<div class="tab-pane fade" id="personal-detail">
									  		<div class="row form-group">
									  			<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Father's Name :</label>
									  			<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="father_name" class="form-control  border_radius0" placeholder="Fathers Name" value="{{old('father_name')}}">
														 
													</div>
												</div>


												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Mother's Name :</label>
									  			<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="mother_name" class="form-control  border_radius0" placeholder="Mothers Name" value="{{old('mother_name')}}">
														 
													</div>
												</div>

												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Phone No* :</label>
									  			<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="phone" class="form-control  border_radius0" placeholder="Phone No" value="{{old('phone')}}">
														 
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Citizenship No* :</label>
									  			<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="text" name="citizen_no" class="form-control  border_radius0" placeholder="Citizenship No" value="{{old('citizen_no')}}">
														 
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Front copy of Citizenship* :</label>
									  			<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="file" name="citizen_front"  class="form-control  border_radius0" placeholder="Citizenship front copy" value="{{old('citizen_front')}}">
														 
													</div>
												</div>
												<label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Back copy of Citizenship* :</label>
									  			<div class="col-lg-8 col-md-8 col-sm-8">
													<div class="input-group mb-3">
														<input type="file" name="citizen_back"  class="form-control  border_radius0" placeholder="Citizenship front copy" value="{{old('citizen_back')}}">
														 
													</div>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 p_tb20 text-right">
													<button type="button" class="btn btn_prevtwo">PREV</button>
													<button type="submit" class="btn btn-success border_radius0 text-uppercase"><i class="fa fa-paper-plane"></i> register</button>
												</div>


									  		</div>
									  	</div>
									</div>
							 
							</div>
							<!-- <div class="col-lg-4 col-md-4 col-sm-12">
								<div class="create_account">
									<div class=" owl-carousel  register_slider">
										<div class="text_item">
											<h2>
												get your destination bus ticket from home
											</h2>
											<p>
												never miss your destination 
											</p>
											<p>
												get instant notice about bus
											</p>
										</div>
										<div class="text_item">
											<h2>
												get your destination bus ticket from home
											</h2>
											<p>
												never miss your destination 
											</p>
											<p>
												never miss your destination 
											</p>
										</div>
									</div>
								</div>
							</div> -->
							
							
						</div>
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