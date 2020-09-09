@extends('layouts.admin')
@section('title','Bus View')
@section('content')
 <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Bus Detail<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <li><a href="#">Search Bus</a></li>
                    <li class="active">Bus Detail</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                 

                <form action="" class="form form-horizontal form-responsive" method="post" >
                    <div class="row equal_height">
                        <div class="col-lg-6 col-sm-12 col-xs-12 m_t20 bus_detail">
                            <img src="{{asset('images/main/'.$bus->image_1)}}" alt="">
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12 m_t20 bus_detail">
                            <img src="{{asset('images/main/'.$bus->image_2)}}" alt="">
                        </div>







                        
                        <div class="col-lg-12 col-sm-12 col-xs-12 m_t20">
                            <div class="row equal_height">
                                <div class="col-lg-6 col-md-6 col-12 busview-wrapper">
                                    <h2 class="box-header bus-info-title">Bus Information</h2>
                                    <div class="">
                                        <div class="box box-info">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Bus Number</h3> 
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-calendar"></i> <span> {{$bus->bus_number}} </span>
                                                    </li>
                                                </ul>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Bus Name</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-bus"></i>
                                                        <span>{{$bus->bus_name}}</span>
                                                    </li>
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Seat Limit</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon1 free_seat" title="Available Seat">
                                                        <span>{{$bus->seat_limit}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Made Year</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-calendar"></i>
                                                        <span>{{$bus->made_year}}</span>
                                                    </li>
                                                </ul>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Bus Manufracturer</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-cgs"></i>
                                                        <span>{{$bus->manufacturer}}</span>
                                                    </li>
                                                </ul>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Bus Model</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-bus"></i>
                                                        <span>{{$bus->model}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Bus Colour</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        COLOUR
                                                        <span> {{$bus->color}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Route</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-map-marker"></i>
                                                        <span>{{$bus->from}} To {{$bus->to}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Shift</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-bus"></i>
                                                        <span>{{$bus->service_type}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Vendor</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-user"></i>
                                                        <span>{{$bus->user->name}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @if($bus->driver)
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Assistant 1</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-user"></i>
                                                        <span>{{$bus->driver->name}}</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-phone"></i>
                                                        <span>{{$bus->assistant_one_phone}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($bus->conductor)
                                    <div class="">
                                        <div class="box box-primary">
                                            <div class="box-body box-profile">
                                                <h3 class="profile-username">Assistant 2</h3>
                                                <ul class="seat_info">
                                                    <li>
                                                        <i class="fa fa-user"></i>
                                                        <span>{{$bus->conductor->name}}</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-phone"></i>
                                                        <span>{{$bus->assistant_two_phone}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>


                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <!-- Default box -->
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Seat Layout</h3>
                                        </div>
                                        <div class="box-body ">
                                            
                                            <div class="row equal_height form-group">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 p_t20">
                                                    <table class="counter_bus_seat_view">
                                                        <tbody >
                                                        	@for($i=0;$i<$bus->column;$i++)
                                                            <tr>
                                                            	@for($j=0;$j<$bus->row;$j++)
                                                            	@php
                                                            	    $rowcol=$i.$j;
                                                            	    $busseat=$bus->busseat()->where('row_col',$rowcol)->get();
                                                            	    
                                                            	@endphp
                                                                <td>
                                                                	@if($i==0 && $j==$bus->row-1)
                                                                	<img src="{{asset('backend/assets/images/stearing.png')}}" class="seat_icon2">
                                                                	@else
                                                                		@if(count($busseat)>0)
				                                                        <img src="{{asset('front/assets/images/seat.png')}}" class="seat_icon2 free_seat">
                                                                    <p>{{$busseat[0]['seat_name']}}</p>
				                                                    @else
				                                                    @endif
																@endif
                                                                    
                                                                </td>
																@endfor
                                                                
                                                            </tr>
                                                            @endfor
                                                            
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center">
                                                        <h2>
                                                           {{$bus->bus_name}}
                                                        </h2>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                    </div>   
                                </div>


                            </div>
                        </div>





















                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                            <div class="box-tools pull-right">
                                <div class="input-group">
                                    <!-- <button type="reset" class="btn btn-info"> <span class="fa fa-trash"></span> Cancel</button> -->
                                    @php
                                        $busrequest=Auth::user()->sent_request()->where('bus_id',$bus->id)->first();

                                    @endphp
                                    @if($busrequest)
                                        @if($busrequest->acceptance_status==0)
                                        <button class="btn vendor-busses" disabled="">Request Sent</button>
                                        @else
                                        <button class="btn vendor-busses" disabled="">Request Sent</button>
                                        @endif
                                    
                                    @else
                                    <button data-bus_id="{{$bus->id}}" data-vendor_id="{{$bus->user->id}}" data-user_id="{{Auth::user()->id}}" class="btn vendor-busses sendRequest"> <span class="fa fa-send"></span> Send Request</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </section>
            <!-- /.content -->      
@endsection
@push('script')
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	//send request
	$(document).ready(function(){
        $('.sendRequest').on('click',function(e){
            e.preventDefault();
            bus_id=$(this).data('bus_id');
            vendor_id=$(this).data('vendor_id');
            user_id=$(this).data('user_id')
            
                $.ajax({
                url: "{{route('sendBusRequest')}}",
                method: 'post',
                async: true,
                data: { bus_id: bus_id, vendor_id: vendor_id,sender_id:user_id },
                success: function(data) {
                    console.log(data);
                    $('.sendRequest').html('Request Sent');
                    $('.sendRequest').prop('disabled','true');
                    $('.sendRequest').removeClass('btn btn-success');
                    $('.sendRequest').addClass('btn btn-warning');
                }
            });
        });
    });
</script>
@endpush
