@extends('layouts.front')
@section('content')
<section class="user-bus-search">
 
	<div class="container p_tb40 user_dash">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-12 ">
				<div class="height_manage box_shadow search_back">
					<form action="{{route('busSearch')}}" method="get" class="form form-horizontal">
						{{csrf_field()}}
						<div class="row form-group">
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0">From</label>

								<select name="from" class="form-control" id="from">
									<option value="">From</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}" {{$from==$destination->name?'selected':''}}>{{$destination->name}}</option>
									@endforeach
								</select>
							</div>
					 
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0" >To</label>
								<select name="to" class="form-control" id="to">
									<option value="">To</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}" {{$to==$destination->name?'selected':''}}>{{$destination->name}}</option>
									@endforeach
								</select>
							</div>
					 
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0">Travel Date</label>
						 
     
								<input type="text" name="date" id="SelectDate" class="bod-picker form-control  border_radius0 radius-manager" value="{{Session::get('check_date')}}">
							 
							</div>
							<div class="col-lg-4 col-md-4">
								<label>Shift</label>
								<ul class="take_shift">
									<li>
										<div class="input-group input-group-sm mb-3">
										  	<input type="radio" name="shift" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" {{$shift=='Day'?'checked':''}} value="Day">
									  		<div class="input-group-append">
									    		<span class="input-group-text" id="inputGroup-sizing-sm">Day</span>
									  		</div>
										</div>
										 
									</li>
									<li>
										<div class="input-group input-group-sm mb-3">
										  	<input type="radio" class="form-control" name="shift" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" {{$shift=='Night'?'checked':''}} value="Night">
									  		<div class="input-group-append" >
									    		<span class="input-group-text" id="inputGroup-sizing-sm">Night</span>
									  		</div>
										</div>
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
					  			<div class="col-lg-12 col-md-12 col-12 p_tb40">
									<div class="category-list-wrapper usersearch-wrapp">
										<ul class="category_option bus-search-cate">
											@foreach($busCategories as $category)
											<li>
												<button class="btn category_button bus_category" data-id={{$category->id}}>{{$category->name}}</button>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12 append">
									<div class="accordion" id="accordionExample">

										@foreach($buses as $key=>$bus)
										
										<?php
											$date=Session::get('check_date');
											$routine=$bus->busRoutine()->where('from',$from)->where('to',$to)->where('date',$date)->where('shift',$shift)->first();
												$facilities=explode(',',$bus->facilities);
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
																	<p>Ba 5 Pa 2025</p>
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
					                                                    
					                                                    
					                                                    <td class="bookmyseat" data-id="{{$routine->id}}" data-selected="0" id="bookmyseat{{$bus->id}}">
					                                                    	@if($i==0 && $j==$bus->row-1)
					                                                        <img src="{{asset('front/assets/images/stearing.png')}}" class="seat_icon2">
					                                                        @else
						                                                        @if($busseat)
						                                                        	
						                                                        	
						                                                        	
						                                                       		@if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->where('from',$routine->from)->where('to',$routine->to)->where('routine_id',$routine->id)->first())
						                                                       			<div class="seat" ></div>
						                                                        	
                                                        						<img src="{{asset('front/assets/images/booked.png')}}" class="seat_icon2  seat_change" >
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
																<div class="box_back p_a10 font_14 booking_seat seat-detail-wrapper " id="process{{$routine->id}}" data-id="{{$routine->id}}">
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
@push('scripts')
<script type="text/javascript">
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
					// console.log(data);
					if(data.status){
						sub_price={};
						sub_price[routine_id]=data.sub_destination_price;
					}else{
						window.location.href="{{route('home')}}";
					}
				}
			});
		});
		
		$(document).on('click', '.bookmyseat', function(e){
			
			e.preventDefault();
			
			// $(this).attr("data-selected", 'h');
			// if($(this).data('selected')=='h'){
			// 	alert('hello');
			// }
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
				$(this).find('img').attr("src", "front/assets/images/selected.png");
            	
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
				$(this).find('img').attr("src", "front/assets/images/available-seat.png");
				bus_id=$(this).find('img').data('bus_id');
			    seat_id=$(this).find('img').data('si');
				$.ajax({
					url: "{{route('removeSession')}}",
       				method: 'post',
        			async: true,
        			data: { bus_id: bus_id,seat_id:seat_id,routine_id:id},
        			success:function(data){
        				if(data.errors){
        					console.log('errors');
        				}
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
				var url = '{{ route("bookNow", ":id") }}';

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
			from=$('#from').find(":selected").val();
			to=$('#to').find(":selected").val();
			shift=$("input[name='shift']:checked").val();
			date=$('#SelectDate').val();

			$.ajax({
				url: "{{route('userSelectBusByCategory')}}",
   				method: 'post',
    			async: true,
    			data: { id: id,from:from,to:to,shift:shift,date:date},
    			success:function(data){
    				// console.log(data);
    				$('.accordion').remove();
    				 $('.append').html(data);
    				
    			}
			});
		});
	});
</script>
@endpush