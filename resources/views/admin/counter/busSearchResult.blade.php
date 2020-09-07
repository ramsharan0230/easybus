@extends('layouts.admin')
@section('content')
<section class="content">
 
	<div class=" p_tb40 user_dash">
		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-12 ">
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
					@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	{!! Session::get('message') !!}
					</div>
					@endif
				<div class="height_manage box_shadow search_back">
					<form action="{{route('busSearchCounter')}}" method="get" class="form form-horizontal">
						{{csrf_field()}}
						<div class="row form-group">
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0">From</label>

								<select name="from" class="form-control">
									<option value="">From</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}" {{$from==$destination->name?'selected':''}}>{{$destination->name}}</option>
									@endforeach
								</select>
							</div>
					 
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0" >To</label>
								<select name="to" class="form-control">
									<option value="">To</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}" {{$to==$destination->name?'selected':''}}>{{$destination->name}}</option>
									@endforeach
								</select>
							</div>
					 
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0">Travel Date</label>
						 
     
								<input type="text" name="date" id="SelectDate" class="bod-picker form-control  border_radius0" autocomplete="off" value="{{Session::get('check_date')}}">
							 
							</div>
							<div class="col-lg-4 col-md-4">
								<label class="font_16">Shift</label>
								<ul class="take_shift shit_searh">
									<li>
										<ul class="shit_searh">
											<li>
										  		<input type="radio" name="shift" {{$shift=='Day'?'checked':''}} value="Day">
												
											</li>
											<li>
									    		<span class="input-group-text font_17" id="inputGroup-sizing-sm">Day</span>	
											</li>
										</ul>
									</li>
									<li>
										<ul class="shit_searh">
											<li>
										  		<input type="radio"  name="shift"  {{$shift=='Night'?'checked':''}} value="Night">
											</li>
											<li>
									    		<span class="input-group-text font_17" id="inputGroup-sizing-sm">Night</span>
											</li>
										</ul>
									</li>
									 
								</ul>
								  
							</div>
							<div class="col-lg-2 col-md-2">
								<button type="submit" class="btn btn-info search_button border_radius0"><i class="fa fa-search"></i> search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 ">
				
				<div class="height_manage box_shadow">
					<div class="row">
					  	
					  	<div class="col-lg-12 col-md-12 col-12 text-capitalize ">
					  		<div class="row">
					  			<!-- <div class="col-lg-12 col-md-12 col-12 text-right p_tb40">
									<ul class="category_option">
										@foreach($busCategories as $category)
										<li>
											<button class="btn category_button category_active bus_category" data-id={{$category->id}}>{{$category->name}}</button>
										</li>
										@endforeach 
									</ul>
								</div> -->
								<div class=" append">

									<div class="accordion" id="accordionExample">
										
										@foreach($busroutine as $key=>$routine)


										<?php
											$bus=$routine->bus;
											$facilities=explode(',',$bus->facilities);

										?>
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
										        	<ul class="checklist-wrapper main_info feature-color m_t15 featuresList">
										        		
										        		@foreach($routine->subDestinations as $key=>$sub_dest)
										        		<li>
										        			<input type="radio" name="subdest" value="{{$sub_dest->id}}" class="sub_destination" data-id={{$routine->id}}> {{$sub_dest->sub_destination}}
										        		</li>
										        		
										        		@endforeach
										        		
										        	</ul>
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
												        			<img src="{{asset('front/assets/images/available-seat.png')}}" class="seat_icon2 ">  Available seat
												        		</div>
												        		<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-3 font_16 seat-text"> 
												        			<img src="{{asset('front/assets/images/booked.png')}}" class="seat_icon2 "> Booked seat
												        		</div>
												        		<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-3 font_16 seat-text"> 
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
						                                                       		@if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->where('from',$routine->from)->where('to',$routine->to)->first())
						                                                       			<div class="seat"></div>
                                                        						<img src="{{asset('front/assets/images/booked.png')}}" class="seat_icon2 seat_change">
                                                        						<p class="booked_seat_text">{{$busseat->seat_name}}</p>
						                                                       		@else
						                                                       			<div class="seat{{$routine->id}}{{$i}}{{$j}}"></div>
                                                        						<img src="{{asset('front/assets/images/available-seat.png')}}" class="seat_icon2  seat_change" data-seat_no="{{$routine->id}}{{$i}}{{$j}}" data-seat_name="{{$busseat->seat_name}}" data-bus_id="{{$bus->id}}" data-price="{{$routine->price}}" data-si="{{$busseat->id}}">
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
@push('script')
<script type="text/javascript">
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
    $(".bod-picker").nepaliDatePicker({
    		dateFormat: "%y-%m-%d",
    		closeOnDateSelect: true,
    	// minDate: formatedNepaliDate
		});
    });
	$(document).ready(function(){
		var sub_price={};
		$(document).on('click','.sub_destination',function(){
			id=$(this).val();
			routine_id=$(this).data('id');
			$.ajax({
				method:'post',
				url:"{{route('saveSubDestinationPrice')}}",
				data:{id:id,routine_id:routine_id},
				success:function(data){
					 console.log(data);
					if(data.status){
						sub_price={};
						sub_price[routine_id]=data.sub_destination_price;
					}else{
						window.location.href="{{route('home')}}";
					}
				}
			});
		});
		$(document).on('click', '.bookmyseat', function(){

			id=$(this).data('id');
			seat_name=$(this).find('img').data('seat_name');
			image=$(this).find('img').attr('src');
			
			if(image=='{{route("home")}}/front/assets/images/booked.png'){
				return;
			}
			seat_no=$(this).find('img').data('seat_no');
			check_value=$('#append_'+seat_no).val();
			if(check_value!=seat_no){
				seatname=[];
				sum=0;
				bus_id=$(this).find('img').data('bus_id');
				seat_id=$(this).find('img').data('si');
				
				price=$(this).find('img').data('price');
				Add='<input type="hidden" value="'+seat_no+'" id="append_'+seat_no+'" data-seat_name="'+seat_name+'" data-bus_id="'+bus_id+'" class="'+id+'" data-price="'+price+'">'
				$(this).find('.seat'+seat_no).append(Add);
				$(this).find('img').attr("src", "{{route('home')}}/backend/assets/images/selected.png");
            	
				$.ajax({
					url: "{{route('saveSession')}}",
       				method: 'post',
        			async: true,
        			data: { bus_id: bus_id,seat_id:seat_id,routine_id:id},
        			success:function(data){
        				
        				//console.log(data);
        				
        				if(data.status){
							$('.'+id).each(function(){
								price=$(this).data('price');
								// console.log(sub_price)
								if(sub_price){
									
									$.each(sub_price, function(key, value) {
									      key=key;
									      if(key==id){
									      	price=value;
									      }
									      
									});
									
								}
								// console.log(price);
								sum+=parseInt(price);

								if(sum!=0){
									$('#process'+id).addClass('process_background');
								}
								$('.total_amount'+id).html('');
								
								$('.total_amount'+id).append("total amount:"+sum);
			                	seatname.push($(this).data('seat_name'));
			            	});
			            	seatname.join(',');
			            	$('.choosen_seat'+id).html('');
			            	$(".choosen_seat"+id).append(seatname.toString());
        				}
        				
        			}
				});
            	
          
			}else{
				$(this).find('img').attr("src", "{{route('home')}}/backend/assets/images/available-seat.png");
				bus_id=$(this).find('img').data('bus_id');
			    seat_id=$(this).find('img').data('si');
				$.ajax({
					url: "{{route('removeSession')}}",
       				method: 'post',
        			async: true,
        			data: { bus_id: bus_id,seat_id:seat_id,routine_id:id},
        			success:function(data){
        				console.log(data);
        				if(data.status){
        					$('#append_'+seat_no).remove();
        					seatname = jQuery.grep(seatname, function(value) {
        					  return value != seat_name;
        					});
        					// alert(seatname);
        					$('.choosen_seat'+id).html('');
        					$(".choosen_seat"+id).append(seatname.toString());
        					price=data.price;
        					if(sub_price){
        						$.each(sub_price, function(key, value) {
        						      key=key;
        						      if(key==id){
        						      	price=value;
        						      }
        						});
        						
        					}
        					sum-=price;
    					    if(sum==0){
    					    	$('#process'+id).removeClass('process_background');
    					    }
    						$('.total_amount'+id).html('');
    						$('.total_amount'+id).append("total amount:"+sum);
        				}
        			}
				});
			}
			
		});
		

	});
	$(document).ready(function(){
		$(document).on('click','.process',function(e){
			e.preventDefault();
			id=$(this).data('id')
			// console.log(($('.'+id).length)
			if($('.'+id).length>0){
				seat_names=$('.choosen_seat').text();
				var url = '{{ route("counterbookNow", ":id") }}';

				url = url.replace(':id', id);

				window.location.href=url;
				

			}else{
				message=confirm('Please select seat');
				if(message){
					return ;
				}
			}
			
		});
	});
	$(document).ready(function(){
		$('.bus_category').click(function(){
			id=$(this).data('id');
			$.ajax({
				url: "{{route('counterSelectBusByCategory')}}",
   				method: 'post',
    			async: true,
    			data: { id: id},
    			success:function(data){
    				console.log(data);
    				$('.accordion').remove();
    				 $('.append').html(data);
    				
    			}
			});
		});


		// $('button').click(function(e){
		// 	if (this.hasClass('collapsed')) {
		// 		var find_class = $(this).find('div.show');
		// 		if (find_class) {

		// 		}
		// 	}
		// })
	});
</script>
@endpush