<div class="accordion" id="accordionExample">

	@foreach($buses as $key=>$bus)
	<div class="card">
										    <div class="card-header" id="heading{{$routine->id}}">
										      	<h2 class="mb-0 m_tb0">
										        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$routine->id}}" aria-expanded="true" aria-controls="collapseOne">
										        		<div class="row">
										        			<div class="col-lg-2 col-md-2 col-12 text-left">
																<a href="{{asset('images/main/'.$bus->image_1)}}">
																	<img src="{{asset('images/main/'.$bus->image_1)}}" class="bus-image">
																</a>
										        				<span class="bus_name"> 
										          				{{$bus->bus_name}}
										          			</span>
										        			</div>
										        			<div class="col-lg-10 col-md-10">
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
												          				<p> {{$bus->boarding_point}}</p>
												          			</li>
												          			<li>
												          				<?php

												          				if($bus->busbBooking){
												          					$booked=count($bus->busBooking()->where('date',Session::get('check_date'))->get());
												          				}else{
												          					$booked=0;
												          				}
												          				if($bus->busseat){
												          					$available=count($bus->busseat)-$booked;
												          				}else{
												          					$available=0;
												          				}
												          				
												          				?>
												          				<p>available seat</p>
												          				<p> total : {{$available}}</p>
												          			</li>
												          		</ul>
												          		<ul class="main_info m_t15 featuresList">
												          			@foreach($facilities as $facility)
												          			<li>
												          				<p>	{{$facility}}</p>
												          			</li>
												          			@endforeach
												          			
												          		</ul>
										        			</div>
										        		</div>
										        	</button>

										      	</h2>
										    </div>
										    <div id="collapse{{$routine->id}}" class="collapse {{$key==0?'show':''}}" aria-labelledby="heading{{$routine->id}}" data-parent="#accordionExample">
										      	<div class="card-body">
										        	<div class="row ">
										        		<div class="col-lg-3 col-md-3  text-capitalize insideback">
										        			<p>{{$bus->bus_number}}</p>
										        		</div>
										        		<div class="col-lg-3 col-md-3  text-capitalize insideback">
										        			<p>{{$routine->from}} to {{$routine->to}}</p>
										        		</div>
										        		<div class="col-lg-3 col-md-3  text-capitalize insideback">
										        			<p>{{Session::get('check_date')}}</p>
										        		</div>
										        		<div class="col-lg-3 col-md-3  text-capitalize insideback">
										        			
										        			<p>{{$routine->shift}} shift</p>
										        			
										        		</div>
										        	</div>
										        	<div class="row">
										        		<!-- <div class="col-lg-3 m_t15 p_lr0"> 
										        			<ul class="box_back p_tb15  text-capitalize bus_view_info no_liststyle">
										        				<p class="font_weight600 font_20 text-center">{{$bus->bus_name}}</p>
										        				<li>
										        					<p>
										        						<small>Driver Name: </small>
										        						@if($bus->driver)
										        						{{$bus->driver->name}}
										        						@endif
										        					</p> 
										        				</li>
										        				<li>
										        					<p>
										        						<small>
										        							assastent Name:
										        						</small>
										        						@if($bus->consuctor)
										        						{{$bus->conductor->name}}
										        						@endif
										        					</p>
										        				</li>
										        				<li>
										        					<p>
										        						<small>
										        							contact no: 
										        						</small>

										        						{{$bus->assistant_two_phone}}
										        					</p>
										        				</li>
										        			</ul>
								        				 
								        				 
								        					<div class=" box_back   text-capitalize bus_view_info m_t10">
								        						<div class="facilities_title">
								        							<p class="font_weight600 font_20 text-center">facilities</p>
								        						</div>
								        						<div class="row m_lr0">

								        						@foreach($facilities as $facility)
								        						<div class="col-lg-6 facility-detail p_lr10 font_17">
								        							<small>{{$facility}} </small>
								        						</div>
								        						@endforeach
								        							 
								        						</div>
								        						 
								        					</div>
								        					<div class=" box_back   text-capitalize bus_view_info m_t10">
								        						<div class="notice_title">
								        							<p class="font_weight600 font_20 text-center">notice</p>
								        						</div>
								        						<div class="notice-detail">
								        							<ul>
								        								{!!$bus->notice!!}
								        							</ul>
								        						</div>
								        					</div>
										        		</div> -->
										        		<div class="col-lg-3 col-md-12  m_t15">
										        			<div class="row">
												        		<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-3 font_16 seat-text"> 
												        			<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 free_seat">  Available seat
												        		</div>
												        		<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-3 font_16 seat-text"> 
												        			<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 booked_seat"> Booked seat
												        		</div>
												        		<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-3 font_16 seat-text"> 
												        			<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 selected_seat"> selected seat
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
						                                                       		@if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->where('from',$routine->from)->where('to',$routine->to)->first())
						                                                       			<div class="seat"></div>
                                                        						<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 booked_seat seat_change">
                                                        						<p>{{$busseat->seat_name}}</p>
						                                                       		@else
						                                                       			<div class="seat{{$routine->id}}{{$i}}{{$j}}"></div>
                                                        						<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 free_seat seat_change" data-seat_no="{{$routine->id}}{{$i}}{{$j}}" data-seat_name="{{$busseat->seat_name}}" data-bus_id="{{$bus->id}}" data-price="{{$routine->price}}" data-si="{{$busseat->id}}">
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
															
															<div class="box_back p_a10 font_14 total-amount-wrapper booking_seat height_manage">
																<p>seat No.: 
																	<span class="choosen_seat{{$routine->id}}"></span>  
																</p>
																<p class="total_amount{{$routine->id}}">total amount:  </p>
																<div class="m_t10 text-right">
																	<a href="{{route('counterbookNow',$routine->id)}}" class="btn btn-info btn-sm process" data-id="{{$routine->id}}">process</a>
																	
																</div>
															</div>
										        		</div>
										        		<div class="col-lg-9 m_t15">
										        			<!-- <div class="row equal_height">
										        				<div class="col-lg-12 col-md-12 col-12 p_lr5">
												        			<ul class="box_back p_tb15 bus_info_right ">
												        				<li>
												        					<p>{{$routine->from}} to {{$routine->to}}</p>
												        				</li>
												        				<li>
												        					<p><small>deaparture time </small><br>
												        						{{$routine->time}}
												        					</p>
												        				</li>
												        			</ul>
												        			<ul class="box_back p_tb15  text-capitalize bus_view_info">
												        				<li>
												        					<p>
												        						<small>bording point: </small>
												        						{{$bus->boarding_point}}
												        					</p> 
												        				</li>
												        			</ul>
												        			<ul class="box_back p_a15 bus_info_right">
												        				<li>
												        					<p>{{$routine->shift}} shift</p>
												        				</li>
												        				<li>
												        					<p><small>price </small><br>
												        						rs. {{$routine->price}}
												        					</p>
												        				</li>
												        			</ul>
										        					
										        				</div>
										        				<div class="col-lg-5 col-md-6 col-12 m_t10 p_lr5">
										        					<div class="box_back p_a10 font_14 booking_seat height_manage">
											        					<p>seat No.: 
											        						<span class="choosen_seat{{$routine->id}}"></span>  
											        					</p>
										        						<p class="total_amount{{$routine->id}}">total amount:  </p>
											        					<div class="m_t10 text-right">
											        						<a href="{{route('counterbookNow',$routine->id)}}" class="btn btn-info btn-sm process" data-id="{{$routine->id}}">process</a>
											        						
											        					</div>
										        					</div>
										        				</div>
										        				<div class="col-lg-7 col-md-6 col-12 m_t10 p_lr5">
										        					<div class="box_back p_a15 height_manage">
										        						<p>Ads here</p>
										        					</div>
										        				</div>
															</div> -->
															
															<!-- <ul class="driver-info">
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
																	<a href="{{asset('front/images/300x250.gif')}}" class="ad-wrapper">
																		<img src="{{asset('front/images/300x250.gif')}}">
																	</a>
																</div>
															</div>
										        		</div> 
										        	</div>
										      	</div>
										    </div>
  										</div> 
	@endforeach
</div>