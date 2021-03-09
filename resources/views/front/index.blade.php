@extends('layouts.front')
@section('content')
<section class="first_section">
	<div class="container p_tb10">
		<div class="row">
			<!-- <div class="col-lg-12 col-md-12 col-12">
				<div class="text-right">
					
				</div>
			</div> -->
			<div class="col-lg-10  offset-lg-1 col-md-12  m_t70">
					@if(Session::has('loginmessage'))
					<div class="alert alert-success alert-dismissible message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	{!! Session::get('loginmessage') !!}
					</div>
					@endif
					@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	{!! Session::get('message') !!}
					</div>
					@endif
				<div class=" box_shadow home_back">
							
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
					<form action="{{route('busSearch')}}" method="get" class="form form-horizontal">
						{{csrf_field()}}
						<div class="row form-group first-form-group">
							<div class="col-lg-2 col-md-6">
								<label class="font_13 m_b0">From</label>
								<select name="from" class="form-control">
									<option value="">From</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}">{{$destination->name}}</option>
									@endforeach
								</select>
								<!-- <input type="text" name="bus_from" class="form-control  border_radius0" placeholder="Enter City(Exg:Kathmandu)"> -->
							</div>
					 
							<div class="col-lg-2 col-md-6">
								<label class="font_13 m_b0" >To</label>
								<select name="to" class="form-control">
									<option value="">To</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}">{{$destination->name}}</option>
									@endforeach
								</select>
								<!-- <input type="text" name="bus_from" class="form-control  border_radius0" placeholder="Enter City(Exg:Kathmandu)"> -->
							</div>
						
					 
							<div class="col-lg-3 col-md-6">
								<label class="font_13 m_b0">Travel Date</label>
								<input type="text" id="nepaliDate1" class="bod-picker form-control" name="date" autocomplete="off">
							</div>

							<div class="col-lg-3 col-md-12 text-center p_t30">
								<!-- <label>Shift</label> -->
								<ul class="take_shift">
									<li>
										<div class="input-group input-group-sm mb-3">
										  	<input type="radio" name="shift" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Day" checked="checked">
									  		<div class="input-group-append">
									    		<span class="input-group-text index-shift-text" id="inputGroup-sizing-sm" >Day</span>
									  		</div>
										</div>
										 
									</li>
									<li>
										<div class="input-group input-group-sm ">
										  	<input type="radio"  name="shift" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Night">
									  		<div class="input-group-append">
									    		<span class="input-group-text index-shift-text" id="inputGroup-sizing-sm">Night</span>
									  		</div>
										</div>
									</li>

									<li>
										<div class="input-group input-group-sm ">
										  	<input type="radio"  name="shift" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Both">
									  		<div class="input-group-append">
									    		<span class="input-group-text index-shift-text" id="inputGroup-sizing-sm">Both</span>
									  		</div>
										</div>
									</li>
									 
								</ul>
								  
							</div>
							
							<div class="col-lg-2 col-md-6">
								<button type="submit" class="btn search_button border_radius0">  search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- <div class="col-lg-6 col-md-6 ">
				<div class="box_shadow height_manage">
					
				</div>
			</div> -->

			<div class="total-section">
				<div class="total-col-wrapper">
					<div class="total-image"><img src="{{asset('front/images/buss.png')}}" alt=""></div>
					<div class="total-content">
						<p>Total Registered Bus</p>
						<span class="count">5000+</span>
					</div>

				</div>
				<div class="total-col-wrapper">
					<div class="total-image"><img src="{{asset('front/images/seat.png')}}" alt=""></div>
					<div class="total-content">
						<p>Total Booked Seat</p>
						<span class="count">5000+</span>
					</div>
				</div>
				<div class="total-col-wrapper">
					<div class="total-image"><img src="{{asset('front/images/user.png')}}" alt=""></div>
					<div class="total-content">
						<p>Total Registered Passenger</p>
						<span class="count">5000+</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection