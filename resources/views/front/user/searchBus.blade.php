@extends('layouts.front')
@section('content')
<section class="">
	
	<div class="container p_tb40 user_dash">
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
					<div class="alert alert-success alert-dismissible message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	{!! Session::get('message') !!}
					</div>
					@endif
				<div class="height_manage box_shadow search_back">
					<form action="{{route('userBusSearch')}}" method="get" class="form form-horizontal">
						{{csrf_field()}}
						<div class="row form-group">
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0">From</label>

								<select name="from" class="form-control">
									<option value="">From</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}" >{{$destination->name}}</option>
									@endforeach
								</select>
							</div>
					 
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0" >To</label>
								<select name="to" class="form-control">
									<option value="">To</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}" >{{$destination->name}}</option>
									@endforeach
								</select>
							</div>
					 
							<div class="col-lg-2 col-md-2">
								<label class="font_13 m_b0">Travel Date</label>
						 
     
								<input type="text" name="date" id="SelectDate" class="bod-picker form-control  border_radius0" value="" autocomplete="off">
							 
							</div>
							<div class="col-lg-4 col-md-4">
								<label>Shift</label>
								<ul class="take_shift">
									<li>
										<div class="input-group input-group-sm mb-3">
										  	<input type="radio" name="shift" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Day">
									  		<div class="input-group-append">
									    		<span class="input-group-text" id="inputGroup-sizing-sm">Day</span>
									  		</div>
										</div>
										 
									</li>
									<li>
										<div class="input-group input-group-sm mb-3">
										  	<input type="radio" class="form-control" name="shift" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Night">
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