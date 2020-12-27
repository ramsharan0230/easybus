@extends('layouts.front')
@section('content')

<style>
	thead {
    color: #fff;
    background: #132634;
	}
</style>
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
													<th>Sn.</th>
													<th>Bus No</th>
													<th>sit no</th>
													<th> Destination</th>
													<th>booked on</th>
													<th>departure date</th>
													<th>rate</th>
													<!-- <th> total amount</th>
													<th> payment status</th> -->
												</tr>
											</thead>
											<tbody>
												@php($i=1)
												@foreach($details as $detail)
												<tr class='clickable-row' data-href='https://www.facebook.com/'>
													
													<td>{{$i}}</td>
													<td>{{$detail->bus->bus_number}}</td>
													<td> {{$detail->seat->seat_name}}</td>
													<td>
														<small>
															from: {{$detail->from}}
														</small>
														<br>
														@if($detail->sub_destination)
															<small>to: {{$detail->sub_destination}}</small>
														@else
															<small>to: {{$detail->to}}</small>
														@endif
														
													</td>
													<td>{{$detail->booked_on}}</td>
													<td>
														{{$detail->date}} <br>
														<small>{{date("g:i a", strtotime($detail->time))}}</small>
													</td>
													<td>
														<span>Rs.</span> {{$detail->price}} /-
													</td>
													
												</tr>	
												@php($i++)
												@endforeach
												
											</tbody>
										</table>
										<div class="col-lg-12 col-sm-12">
											<div class="row">
												<div class="col-lg-8 col-sm-12">
													<ul class="font_14">
														<li>
															- Your all ticketing history will be listed here.
														</li>
														<li>
															- All points you earned will be displayed here.
														</li>
														<!-- <li>
															- After tickets of Rs. 10,000/- you will earn 1 points.
														</li> -->
													</ul>
												</div>
												<div class="col-lg-4 col-sm-12 font_14">
													<ul>
														<li>
															<span class=" font_weight600">Total Money spent:</span> {{$details->sum('price')}} /-
														</li>
														<li>
															<span class=" font_weight600"> Tickets:</span> {{count($details)}}
														</li>
														<!-- <li>
															<span class=" font_weight600"> Earned Point:</span> 1234
														</li>
														<li>
															<span class=" font_weight600"> spent points:</span> 123
														</li>
														<li>
															<span class=" font_weight600"> remaining points:</span> 923
														</li> -->
													</ul>
												</div>
											</div>
										</div>
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