<div class="col-lg-12 col-md-12 col-12 text-capitalize ">
					  		<div class="row">
					  			<div class="col-lg-12 col-md-12 col-12 text-right p_tb40">
									<ul class="category_option">
										@foreach($busCategories as $category)
										<li>
											<button class="btn category_button category_active bus_category" data-id={{$category->id}}>{{$category->name}}</button>
										</li>
										@endforeach
										
										 
									</ul>
								</div>
								<div class="col-lg-12 col-md-12 col-12 append">
									<div class="accordion" id="accordionExample">

										@foreach($buses as $key=>$bus)
  										<div class="card">
										    <div class="card-header" id="heading{{$bus->id}}">
										      	<h2 class="mb-0">
										        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$bus->id}}" aria-expanded="true" aria-controls="collapseOne">
										        		<div class="row">
										        			<div class="col-lg-2 col-md-2 col-12 text-left">
										        				<span class="bus_name"> 
										          				{{$bus->bus_name}}
										          			</span>
										        			</div>
										        			<div class="col-lg-10 col-md-10 col-12">
												        		<ul class="main_info">
												          		 
												          			<li>
												          				<p>{{$bus->bus_number}}  </p>
												          				<!-- <p>	4480</p> -->
												          			</li>
												          			<li>
												          				<p>time </p>
												          				<p>	8:00 pm</p>
												          			</li>
												          			<li>
												          				<p>price </p>
												          				<p>	Rs. {{$bus->price}}</p>
												          			</li>
												          			<li>
												          				<p>bording point </p>
												          				<p> naya buspark, kalanki</p>
												          			</li>
												          			<li>
												          				<p>available seat</p>
												          				<p> total : 12</p>
												          			</li>
												          		</ul>
												          		<ul class="main_info m_t15 featuresList">
												          			<li>
												          				<p>	AC</p>
												          			</li>
												          			<li>
												          				<p>	WIFI</p>
												          			</li>
												          			<li>
												          				<p>	Charging</p>
												          			</li>
												          			<li>
												          				<p>Fooding</p>
												          			</li>
												          			<li>
												          				<p>	water</p>
												          			</li>
												          			<li>
												          				<p>fan</p>
												          			</li>
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
										        			<p>{{$bus->from}} to {{$bus->to}}</p>
										        		</div>
										        		<div class="col-lg-3 col-md-3 col-12 text-capitalize insideback">
										        			<p>2075/09/08</p>
										        		</div>
										        		<div class="col-lg-3 col-md-3 col-12 text-capitalize insideback">
										        			
										        			<p>{{$bus->service_type}} shift</p>
										        			
										        		</div>
										        	</div>
										        	<div class="row">
										        		<div class="col-lg-4 m_t15">
										        			
										        			<div class="row">
										        				<div class="col-12">
												        			<ul class="box_back p_a15  text-capitalize bus_view_info">
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
										        				</div>
										        				<div class="col-12  p_lr30">
										        					<div class="row box_back   text-capitalize bus_view_info m_t10">
										        						<div class="col-12">
										        							<p class="font_weight600 font_20 text-center">facilities</p>
										        						</div>
										        						<div class="col-3">
										        							<small>AC </small>
										        						</div>
										        						<div class="col-3">
										        							<small>WIFI</small>
										        						</div>
										        						<div class="col-3">
										        							<small>water</small>
										        						</div>
										        						<div class="col-3">
										        							<small>TV</small>
										        						</div>
										        						<div class="col-3">
										        							<small>charging</small>
										        						</div>
										        					</div>
												        		 
										        				</div>
										        				<div class="col-12 p_lr30">
										        					<div class="row box_back   text-capitalize bus_view_info m_t10">
										        						<div class="col-12">
										        							<p class="font_weight600 font_20 text-center">notice</p>
										        						</div>
										        						<div class="col-12">
										        							<ul>
										        								<li>
										        							<small>this is notice area for this bus to display </small>
										        									
										        								</li>
										        								<li>
										        									<small>this is notice area for this bus to display </small>
										        								</li>
										        							</ul>
										        						</div>
										        					</div>
										        				</div>
										        			</div>


										        			
										        		</div>
										        		<div class="col-lg-3 col-md-12 col-12 m_t15">
										        			<div class="row">
												        		<div class=" col-lg-4 col-md-4 col-12 mb-3 font_13"> 
												        			<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 free_seat">  Available seat
												        		</div>
												        		<div class=" col-lg-4 col-md-4 col-12 mb-3 font_13"> 
												        			<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 booked_seat"> Booked seat
												        		</div>
												        		<div class=" col-lg-4 col-md-4 col-12 mb-3 font_13"> 
												        			<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 selected_seat"> selected seat
												        		</div>
										        				
										        			</div>
										        			<table class="counter_bus_seat_view">
					                                            <tbody >
					                                            	@for($i=0;$i<$bus->row;$i++)
					                                                <tr>
					                                                	@for($j=0;$j<$bus->column;$j++)
					                                                	@php
					                                                	    $rowcol=$i.$j;
					                                                	    $busseat=$bus->busseat()->where('row_col',$rowcol)->first();
					                                                	    $check_date=Session::get('check_date');

					                                                	    $value=Session::get('jointable');

					                                                	    
					                                                	@endphp
					                                                    
					                                                    
					                                                    <td>
					                                                    	@if($i==0 && $j==0)
					                                                        <img src="{{asset('front/assets/images/stearing.png')}}" class="seat_icon2">
					                                                        @else
						                                                        @if($busseat)
						                                                       		@if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->first())
						                                                       			<div class="seat"></div>
                                                        						<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 booked_seat seat_change">
                                                        						<p>{{$busseat->seat_name}}</p>
						                                                       		@else
						                                                       			<div class="seat{{$bus->id}}{{$i}}{{$j}}"></div>
                                                        						<img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 free_seat seat_change" data-seat_no="{{$bus->id}}{{$i}}{{$j}}" data-seat_name="{{$busseat->seat_name}}" data-bus_id="{{$bus->id}}" data-price="{{$bus->price}}" data-si="{{$busseat->id}}">
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
										        		</div>
										        		<div class="col-lg-5 m_t15">
										        			<div class="row">
										        				<div class="col-lg-12 col-md-12 col-12 p_lr5">
												        			<ul class="box_back p_a15 bus_info_right">
												        				<li>
												        					<p>{{$bus->from}} to {{$bus->to}}</p>
												        				</li>
												        				<li>
												        					<p><small>apart time </small><br>
												        						8:00pm
												        					</p>
												        				</li>
												        			</ul>
												        			<ul class="box_back p_a15  text-capitalize bus_view_info">
												        				<li>
												        					<p>
												        						<small>bording point: </small>
												        						gongabu buspark, kalanki
												        					</p> 
												        				</li>
												        			</ul>
												        			<ul class="box_back p_a15 bus_info_right">
												        				<li>
												        					<p>{{$bus->service_type}} shift</p>
												        				</li>
												        				<li>
												        					<p><small>price </small><br>
												        						rs. {{$bus->price}}
												        					</p>
												        				</li>
												        			</ul>
										        					
										        				</div>
										        				<div class="col-lg-5 col-md-6 col-12 m_t10 p_lr5">
										        					<div class="box_back p_a10 font_14 booking_seat">
										        					<p>seat No.: 
										        						<span class="choosen_seat{{$bus->id}}">
										        							
										        						</span>  


										        					</p>
										        					<p class="total_amount{{$bus->id}}">total amount:  </p>
										        					<div class="m_t10 text-right">
										        						<a href="{{route('bookNow',$bus->id)}}" class="btn btn-info btn-sm process" data-id="{{$bus->id}}">process</a>
										        						
										        					</div>
										        					</div>
										        				</div>
										        				<div class="col-lg-7 col-md-6 col-12 m_t10 p_lr5">
										        					<div class="box_back p_a15">
										        						<p>Ads here</p>
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
								</div>				
					  		</div>
					  	</div>