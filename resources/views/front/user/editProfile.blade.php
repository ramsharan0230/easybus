@extends('layouts.front')
@section('content')
<section class="">
	<div class="container user_dash">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 ">
				<div class="height_manage user-dash-page box_shadow">
					<div class="row">
					  	<div class="col-lg-2 col-sm-12">
						    @include('front.include.sidemenu')
					  	</div>
					  	<div class="col-lg-9 col-sm-12 text-capitalize">
							<div class="padding-manager">
								<div class="row">
									<div class="col-lg-12">
										<div class="row form-group">
											<label class="col-lg-12 col-sm-12 ">
												<a href="{{route('profile')}}" class="btn btn-info btn-sm border_radius0 float-right"><i class="fa fa-user"></i> profile</a>
											</label>
										</div>
									</div>
									<div class="col-lg-8 offset-lg-2 col-sm-12 ">
										@if(Session::has('editmessage'))
										<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											{!! Session::get('editmessage') !!}
										</div>
										@endif
										<form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data"  class="form form-horizontal form-responsive ">
											{{csrf_field()}}
											<!-- <input type="hidden" name="_mehtod" value="PUT"> -->
											<div class="row form-group">
												<div class="col-lg-8 col-sm-12">
													<div class="input-group mb-3">
														<input type="text" name="name" class="form-control  border_radius0" placeholder="Full name" value="{{Auth::guard('admin')->user()->name}}">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
														</div>
													</div>
												</div>
											</div>

											<!-- <div class="row form-group">
												<div class="col-lg-8 col-sm-12">
													<div class="input-group mb-3">
														<input type="text" name="email" class="form-control  border_radius0" placeholder="username or Email Address" value="{{Auth::guard('admin')->user()->email}}">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
														</div>
													</div>
												</div>
											</div> -->
											<div class="row form-group">
												<div class="col-lg-8 col-sm-12">
													<div class="input-group mb-3">
														<input type="text" name="mobile_number" class="form-control  border_radius0" placeholder="Mobile No:" value="{{Auth::guard('admin')->user()->mobile_number}}">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<div class="col-lg-8 col-sm-12">
													<div class="input-group mb-3">
														<input type="text" name="opt_mobile_number" class="form-control  border_radius0" placeholder="Mobile No: (Optional)" value="{{Auth::guard('admin')->user()->opt_mobile_number}}">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<div class="col-lg-8 col-sm-12">
													<div class="input-group mb-3">
														<textarea name="address" class="form-control">{{Auth::guard('admin')->user()->address}}</textarea>
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<div class="col-lg-8 col-sm-12">
													<label class="font_weight600">profile picture</label>
													<label><input type="file" name="" value=""></label>
												</div>
											</div>
											<div class="row form-group">
												<div class="col-lg-8 col-sm-12">
													<!-- <div class="input-group mb-3">
														<input type="password" name="username" class="form-control  border_radius0" placeholder="password" value="">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
														</div>
													</div> -->
													<!-- <div>
														<p class="font_14"><a href="">Change Password ?</a> </p>
													</div> -->
												</div>
											</div>
											<div class="row form-group">
												<div class="col-lg-8 col-sm-12">
												<button type="submit" class="btn btn-success btn-sm border_radius0">Update</button>
												</div>
											</div>
										</form>
										
										
										
										
									</div>
								</div>
							</div>
					  	</div>
					</div>
				</div>
			</div>
			 
		</div>
	</div>
</section>
@endsection