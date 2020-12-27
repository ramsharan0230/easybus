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
					  	<div class="col-lg-10 col-sm-12 text-capitalize">
							<div class="padding-manager">
								<div class="row">
									
									<div class="col-lg-12   col-sm-12 ">
										<table class="table table-bordered  text-uppercase font_13" width="100%">
											<thead>
												<tr>
													<th>ticket No.</th>
													<!-- <th>sit no</th>
													<th> Destination</th>
													<th>booked on</th>
													<th>departure date</th>
													<th>rate</th> -->
													
												</tr>
											</thead>
											<tbody>
												@foreach($booking_data as $data)
												<tr class='clickable-row' data-href='https://www.facebook.com/'>
													
													<td>{{$data->book_no}}</td>
													<td> {{$data->seat->seat_name}}</td>
													<td>
														<small>
															from: {{$data->from}}
														</small>
														<br>
														@if($data->sub_destination)
															<small>to: {{$data->sub_destination}}</small>
														@else
															<small>to: {{$data->to}}</small>
														@endif
														
													</td>
													<td>{{$data->booked_on}}</td>
													<td>
														{{$data->date}} <br>
														
													</td>
													<td>
														<span>Rs.</span> {{$data->price}} /-
													</td>
															
												</tr>
												@endforeach
											</tbody>
										</table>
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