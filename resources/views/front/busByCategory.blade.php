@if($buses!=null)
<div class="accordion" id="accordionExample">
	@foreach($buses as $key=>$bus)
		<?php
			$routine=$bus->busRoutine()->where('from',$from)->where('to',$to)->where('date',$date)->where('shift',$shift)->first();
			$facilities=explode(',',$bus->facilities);
		?>
	<div class="card">
	    <div class="card-header" id="heading{{$bus->id}}">
	      	<h2 class="mb-0">
	        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$bus->id}}" aria-expanded="true" aria-controls="collapseOne">
	        		<div class="row">
	        			<div class="col-lg-3 col-md-4 col-12 text-left">
							<div class="real-bus-wrapp">
								<a href="{{asset('front/images/bus3.jpg')}}" class="real-bus">
									<img src="{{asset('images/main/'.$bus->image_1)}}">
								</a>
								<span class="bus_name"> 
								{{$bus->bus_name}}
								<p>{{$bus->bus_number}}</p>
								</span>
							</div>
	        			</div>
	        			<div class="col-lg-9 col-md-8 col-12">
			        		<ul class="main_info">
			          		 
			          			<li>
			          				<p>{{$bus->bus_number}}  </p>
			          				<!-- <p>	4480</p> -->
			          			</li>
			          			<li>
			          				<p>time </p>
			          				<p>	{{$routine->time}}</p>
			          			</li>
			          			<li>
			          				<p>price </p>
			          				<p>	Rs. {{$routine->price}}</p>
			          			</li>
			          			<li>
			          				<p>bording point </p>
			          				<p> {{$routine->boarding_point}}</p>
			          			</li>
			          			<li>
			          				<?php
										$date=Session::get('check_date');
											
										$booked=count($bus->busBooking()->where('date',$date)->where('routine_id',$routine->id)->get());
										$available=count($bus->busseat)-$booked;
										?>
			          				<p>available seat</p>
			          				<p> total : {{$available}}</p>
			          			</li>
			          		</ul>
			          		<ul class="main_info feature-color m_t15 featuresList">
			          			@foreach($facilities as $facility)
			          			<li>
			          				<p>	{!!$facility!!}</p>
			          			</li>
			          			@endforeach
			          			
			          		</ul>
	        			</div>
	        		</div>
	        	</button>

	      	</h2>
	    </div>
	    <div id="collapse{{$bus->id}}" class="collapse {{$key==0?'show':''}}" aria-labelledby="heading{{$bus->id}}" data-parent="#accordionExample">
	      	<div class="card-body">
	        	<div class="row ">
	        		<div class="col-lg-3 col-md-3 col-12 text-capitalize insideback">
	        			<p>{{$bus->bus_number}}</p>
	        		</div>
	        		<div class="col-lg-3 col-md-3 col-12 text-capitalize insideback">
	        			<p>{{$routine->from}} to {{$routine->to}}</p>
	        		</div>
	        		<div class="col-lg-3 col-md-3 col-12 text-capitalize insideback">
	        			<p>{{Session::get('check_date')}}</p>
	        		</div>
	        		<div class="col-lg-3 col-md-3 col-12 text-capitalize insideback">
	        			
	        			<p>{{$routine->shift}} shift</p>
	        			
	        		</div>

	        	</div>
	        	<ul class="checklist-wrapper main_info feature-color m_t15 featuresList">
	        		@foreach($routine->subDestinations as $key=>$sub_dest)
	        		<li>
	        			<input type="radio" name="subdest" value="{{$sub_dest->id}}" class="sub_destination" data-id={{$routine->id}}> {{$sub_dest->sub_destination}}
	        		</li>
	        		@endforeach
	        	</ul>
	        	<div class="row margin-manager">
	        	
	        		<div class="col-lg-3 col-md-6 col-12 m_t15">
	        			<div class="row">
			        		<div class=" col-lg-4 col-md-4 col-4 mb-3 font_13"> 
			        			<img src="{{asset('front/assets/images/available-seat.png')}}" class="seat_icon2">  Available seat
			        		</div>
			        		<div class=" col-lg-4 col-md-4 col-4 mb-3 font_13"> 
			        			<img src="{{asset('front/assets/images/booked.png')}}" class="seat_icon2"> Booked seat
			        		</div>
			        		<div class=" col-lg-4 col-md-4 col-4 mb-3 font_13"> 
			        			<img src="{{asset('front/assets/images/selected.png')}}" class="seat_icon2 "> selected seat
			        		</div>
	        				
	        			</div>
	        			<table class="counter_bus_seat_view">
                            <tbody >
                            	@for($i=0;$i<$bus->column;$i++)
                                <tr>
                                	@for($j=0;$j<$bus->row;$j++)
                                	@php
                                	    $rowcol=$i.$j;
                                	    $busseat=$bus->busseat()->where('row_col',$rowcol)->first();
                                	    $check_date=Session::get('check_date');

                                	    $value=Session::get('jointable');

                                	    
                                	@endphp
                                    
                                    
                                    <td class="bookmyseat" data-id="{{$routine->id}}">
                                    	@if($i==0 && $j==$bus->row-1)
                                        <img src="{{asset('front/assets/images/stearing.png')}}" class="seat_icon2">
                                        @else
                                            @if($busseat)
                                           		@if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->where('from',$routine->from)->where('to',$routine->to)->where('routine_id',$routine->id)->first())
                                           			<div class="seat"></div>
                    						<img src="{{asset('front/assets/images/booked.png')}}" class="seat_icon2 seat_change">
                    						<p class="booked_seat_text">{{$busseat->seat_name}}</p>
                                           		@else
                                           			<div class="seat{{$routine->id}}{{$i}}{{$j}}"></div>
                    						<img src="{{asset('front/assets/images/available-seat.png')}}" class="seat_icon2 seat_change" data-seat_no="{{$routine->id}}{{$i}}{{$j}}" data-seat_name="{{$busseat->seat_name}}" data-bus_id="{{$bus->id}}" data-price="{{$routine->price}}" data-si="{{$busseat->id}}">
                    						<p>{{$busseat->seat_name}}</p>
                                           		@endif
                                            
                							@else
                							@endif
                						@endif

                                    </td>
                                    @endfor
                                </tr>
                                @endfor
                                
                            </tbody>
						</table>
							<div class="box_back p_a10 font_14 booking_seat seat-detail-wrapper">
	        					<p>seat No.: 
	        						<span class="choosen_seat{{$routine->id}}">
	        							
	        						</span>  
	        					</p>
	        					<p class="total_amount{{$routine->id}}">total amount:  </p>
	        					<div class="m_t10 text-right">
	        						<a href="{{route('bookNow',$routine->id)}}" class="btn btn-info btn-sm process" data-id="{{$routine->id}}">process</a>
	        						
	        					</div>
							</div>
	        		</div>
	        		<div class="col-lg-9 col-md-12 m_t15">
	        			
						<div class="new-layout">
							<!-- <ul class="driver-info-wrapp">
								<li><p>Driver Number</p><span>9865802604</span></li>
								<li><p>Conductor Number</p><span>9865802604</span></li>
							</ul> -->
							<div class="row bus-image-row">
								<div class="col-lg-4 col-md-4 col-12">
									<a href="{{asset('images/main/'.$bus->image_1)}}" class="bus-image-wrapp">
										<img src="{{asset('images/main/'.$bus->image_1)}}">
									</a>
								</div>
								<div class="col-lg-4 col-md-4 col-12">
									<a href="{{asset('images/main/'.$bus->image_2)}}" class="bus-image-wrapp">
										<img src="{{asset('images/main/'.$bus->image_2)}}">
									</a>
								</div>
								<div class="col-lg-4 col-md-4 col-12">
									<a href="{{asset('images/main/'.$bus->image_3)}}" class="bus-image-wrapp">
										<img src="{{asset('images/main/'.$bus->image_3)}}">
									</a>
								</div>
							</div>
							<div class="notice-wrapp">
								<h3>Notice Here</h3>
								<p>{!!$routine->notice!!}</p>
							</div>
							<div class="row ad-section">
								<div class="col-lg-6 col-md-6 col-12">
									<a href="{{asset('front/images/ime-pay-300x150.webp')}}" class="ad-wrapper">
										<img src="{{asset('front/images/ime-pay-300x150.webp')}}">
									</a>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<a href="{{asset('front/images/bus3.jpg')}}" class="ad-wrapper">
										<img src="{{asset('front/images/300x250.gif')}}">
									</a>
								</div>
							</div>
						</div>
	        		</div> 
	        	</div>
	      	</div>
	    </div>
		</div> 
		@endforeach
</div>
@endif