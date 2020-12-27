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
					  		<div class="row">
					  			<div class="col-lg-12">
					  				<div class="row form-group">
					  					<label class="col-lg-12 col-sm-12 ">
					  						<!-- <div class="notice btn btn-info btn-sm">
					  							<i class="fa fa-check"></i> Your Profile has been updated Successfully.
					  						</div> -->
					  						<a href="{{route('editProfile')}}" class="btn btn-info btn-sm border_radius0 float-right"><i class="fa fa-edit"></i> edit profile</a>
					  					</label>
					  				</div>
					  			</div>
					  			<div class="col-lg-8 offset-lg-2 col-sm-12 ">
					  				
					  				<div class="row form-group">
					  					 
					  					<label class="col-lg-4 col-sm-6"></label>
					  					<label class="col-lg-8 col-sm-6">
					  						<div class="user_image">
					  							<img src="images/user1.jpg" alt="">
					  						</div>
					  					</label>
					  				</div>
					  				<div class="row form-group">
					  					<label class="col-lg-4 col-sm-6">Full Name :</label>
					  					<label class="col-lg-8 col-sm-6">{{Auth::guard('admin')->user()->name}}</label>
					  				</div>
					  				<div class="row form-group">
					  					<label class="col-lg-4 col-sm-6">Mobile No :</label>
					  					<label class="col-lg-8 col-sm-6">{{Auth::guard('admin')->user()->mobile_number}}</label>
					  				</div>
					  				<div class="row form-group">
					  					<label class="col-lg-4 col-sm-6">Email :</label>
					  					<label class="col-lg-8 col-sm-6">{{Auth::guard('admin')->user()->email}}</label>
					  				</div>
					  				<div class="row form-group">
					  					<label class="col-lg-4 col-sm-6">Address :</label>
					  					<label class="col-lg-8 col-sm-6">{{Auth::guard('admin')->user()->address}}</label>
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