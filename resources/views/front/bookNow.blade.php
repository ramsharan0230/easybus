@extends('layouts.front')
@section('content')
<section class="">
	<div class="container p_tb40 user_dash">
		<div class="row">
			<div class="col-lg-4 offset-lg-4 col-md-12 col-12 ">
				<div class="height_manage box_shadow search_back">
						@if (count($errors) > 0)
						<div class="alert alert-danger message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					      		<span aria-hidden="true">&times;</span>
					    	</button>
							<ul>
								@foreach($errors->all() as $error)
								<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
						@endif
					<form action="{{route('seatBooking')}}" method="post" class="form form-horizontal">
						{{csrf_field()}}
						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12 font_14">Full name :</label>
							<div class="col-lg-8 col-md-6 col-12">
								<input type="text" name="name" id="full_name" class="form-control form-control-sm rounded-0">
							</div>
						</div>

						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12 font_14">Contact No.:</label>
							<div class="col-lg-8 col-md-6 col-12">
								<input type="text" name="phone" id="phone" class="form-control form-control-sm rounded-0">
							</div>
						</div>
						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12 font_14">Pickup station </label>
							<div class="col-lg-8 col-md-6 col-12">
								<input type="text" name="pickup_station" id="pickup" class="form-control form-control-sm rounded-0">
							</div>
						</div>
						@if(session()->get('sub_destination'))
						<?php
							$sub_destination=session()->get('sub_destination');
							
							$sub=[];
							foreach($sub_destination as $sub_dest){
								array_push($sub,$sub_dest);
							}
							
							?>
						
						
						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12 font_14">Drop station :</label>
							<div class="col-lg-8 col-md-6 col-12">
								<input type="text" name="drop_station" id="drop_station" class="form-control form-control-sm rounded-0" value="{{$sub_dest->sub_destination}}" readonly="">
							</div>
						</div>
						@else

						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12 font_14">Drop station :</label>
							<div class="col-lg-8 col-md-6 col-12">
								<input type="text" name="drop_station" id="drop_station" class="form-control form-control-sm rounded-0">
							</div>
						</div>
						@endif
						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12 font_14">Booking seats :</label>
							<div class="col-lg-8 col-md-6 col-12">
								<input type="text" name="seat_name" id="seats" readonly="" class="form-control form-control-sm rounded-0" value="{{$seatName}}">
							</div>
						</div>
						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12 font_14">Total Amount :</label>
							<div class="col-lg-8 col-md-6 col-12">
								<input type="text" name="price" id="price" class="form-control form-control-sm rounded-0" value="{{$total_price}}" readonly="">
							</div>
						</div>


						<div class="row form-group ">
							<label class="col-lg-4 col-md-6 col-12"></label>
							<div class="col-lg-8 col-md-6 col-12 text-center">
								<button type="submit"  class="btn btn-info">Make Payment</button>
							</div>
						</div>

						
					</form>
				</div>
			</div>
			 
		</div>
	</div>
</section>

@endsection