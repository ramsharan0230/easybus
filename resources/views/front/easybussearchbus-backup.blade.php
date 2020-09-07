@extends('layouts.front')
@section('content')
<section class="">
	
	<div class="container p_tb40 user_dash">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-12 ">
				<div class="height_manage box_shadow search_back">
					<form action="{{route('busSearch')}}" method="get" class="form form-horizontal">
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
						 
     
								<input type="text" name="date" id="SelectDate" class="bod-picker form-control  border_radius0" value="{{Session::get('check_date')}}">
							 
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


										<?php
											$facilities=explode(',',$bus->facilities);

										?>
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
												          				<p>	{{$bus->departure_time}}</p>
												          			</li>
												          			<li>
												          				<p>price </p>
												          				<p>	Rs. {{$bus->price}}</p>
												          			</li>
												          			<li>
												          				<p>bording point </p>
												          				<p> {{$bus->boarding_point}}</p>
												          			</li>
												          			<li>
												          				<?php
												          				$booked=count($bus->busBooking()->where('date',Carbon\Carbon::today())->get());
												          				$available=count($bus->busseat)-$booked;
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
										        			<p>{{Session::get('check_date')}}</p>
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
										        						@foreach($facilities as $facility)
										        						<div class="col-4">
										        							<small>{{$facility}} </small>
										        						</div>
										        						@endforeach
										        						
										        					</div>
												        		 
										        				</div>
										        				<div class="col-12 p_lr30">
										        					<div class="row box_back   text-capitalize bus_view_info m_t10">
										        						<div class="col-12">
										        							<p class="font_weight600 font_20 text-center">notice</p>
										        						</div>
										        						<div class="col-12">
										        							<ul>
										        								{{$bus->notice}}
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
					                                                    
					                                                    
					                                                    <td class="">
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
												        					<p><small>deaparture time </small><br>
												        						{{$bus->departure_time}}
												        					</p>
												        				</li>
												        			</ul>
												        			<ul class="box_back p_a15  text-capitalize bus_view_info">
												        				<li>
												        					<p>
												        						<small>bording point: </small>
												        						{{$bus->boarding_point}}
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
		$(document).on('click','.seat_change',function(){
			
			seat_name=$(this).data('seat_name');
			seat_no=$(this).data('seat_no');
			check_value=$('#append_'+seat_no).val();
			if(check_value!=seat_no){
				seatname=[];
				sum=0;
				bus_id=$(this).data('bus_id');
				seat_id=$(this).data('si');
				
				price=$(this).data('price');
				Add='<input type="hidden" value="'+seat_no+'" id="append_'+seat_no+'" data-seat_name="'+seat_name+'" data-bus_id="'+bus_id+'" class="'+bus_id+'" data-price="'+price+'">'
				$('.seat'+seat_no).append(Add);
				$(this).removeClass('free_seat');
				$(this).addClass('selected_seat');
				
				$('.'+bus_id).each(function(){
					price=$(this).data('price');
					sum+=price;
					$('.total_amount'+bus_id).html('');
					$('.total_amount'+bus_id).append("total amount:"+sum);
                	seatname.push($(this).data('seat_name'));
            	});
            	
				$.ajax({
					url: "{{route('saveSession')}}",
       				method: 'post',
        			async: true,
        			data: { bus_id: bus_id,seat_id:seat_id},
        			success:function(data){
        				console.log(data);
        				
        			}
				});
            	seatname.join(',');
            	
            	$('.choosen_seat'+bus_id).html('');
            	$(".choosen_seat"+bus_id).append(seatname.toString());
          
			}else{
					$(this).addClass('free_seat');
					$(this).removeClass('selected_seat');
					
					price=$(this).data('price');
					bus_id=$(this).data('bus_id');
					$('#append_'+seat_no).remove();
					seatname = jQuery.grep(seatname, function(value) {
					  return value != seat_name;
					});
					// alert(seatname);
					$('.choosen_seat'+bus_id).html('');
					$(".choosen_seat"+bus_id).append(seatname.toString());
	        		
	        		price=$(this).data('price');
					sum-=price;
					bus_id=$(this).data('bus_id');
				    seat_id=$(this).data('si');
				    
					$('.total_amount'+bus_id).html('');
					$('.total_amount'+bus_id).append("total amount:"+sum);
					$.ajax({
						url: "{{route('removeSession')}}",
	       				method: 'post',
	        			async: true,
	        			data: { bus_id: bus_id,seat_id:seat_id},
	        			success:function(data){
	        				console.log(data);
	        				
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
			$.ajax({
				url: "{{route('selectBusByCategory')}}",
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
	});
</script>
@endpush