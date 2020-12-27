@extends('layouts.front')
@section('content')
<section class="user-dashboard-wrapp">
	<div class="container user_dash">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 ">
				<div class="height_manage user-dash-page box_shadow">
					<div class="row">
						<?php /*
						<div class="col-lg-12">
			  				<div class="row form-group">
			  					<label class="col-lg-12 col-sm-12 ">
			  						<!-- <div class="notice btn btn-warning btn-sm">
			  							<i class="fa fa-exclamation-circle"></i> Your account has not been verified yet. Please verify your account or <a href="" class="text-capitalize btn-primary">click here</a> to resend verification email.
			  						</div> -->
			  						<!-- <a href="edit_profile.php" class="btn btn-info btn-sm border_radius0 float-right"><i class="fa fa-edit"></i> edit profile</a> -->
			  					</label>
			  				</div>
						  </div>
						  */?>

					  	<div class="col-lg-2 col-sm-12">
						    @include('front.include.sidemenu')
					  	</div>
					  	<div class="col-lg-9 col-sm-12">
					  		<div class="padding-manager">
							  	<div class="row">
									<div class="col-12">
										
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