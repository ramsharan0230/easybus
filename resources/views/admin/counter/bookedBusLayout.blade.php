@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Bus Seat Layout<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <!-- <li><a href="#">Assestant</a></li> -->
                    <li class="active">Bus Seat Layout</li>
                </ol>
            </section>
           
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-6">  </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="box">
                            <div class="row">   
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" id="nepaliDate1" class="bod-picker form-control" name="date" autocomplete="off" placeholder="Search Here...">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="row equal_height" id="append_here">
                    <div class="col-md-3 col-sm-12 col-xs-12 layout_hide">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <h3 class="profile-username">Seat Information</h3>
                                <div class="row equal_height">
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <ul class="seat_info">
                                            <input type="hidden" name="bus_id" value="{{$bus->id}}" id="bus_id">
                                        	<?php
                                        	$check_date=$dashboard_nepali_date;
                                            
                                            $booked=count($bus->busBooking()->where('date',$check_date)->get());
                                            $available=count($bus->busseat)-$booked;
                                        	?>
                                            <li>
                                                <img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon1 free_seat" title="Available Seat"> <span>Available Seats: {{$available}} </span>
                                            </li>
                                            <li>
                                                <img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon1 booked_seat" disabled title="Booked Seat"><span>Booked Seats : {{$booked}}</span>
                                            </li>
                                            <!-- <li>
                                                <img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon1 " disabled title="Booked Seat"><span>Total Seats : 39</span>
                                            </li> -->
                                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <h3 class="profile-username">Bus Image</h3>
                                <div class="row equal_height bus_layout_image">
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <img src="assets/images/bus.jpg" alt="">
                                    </div>
                                    <!-- <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <img src="assets/images/bus.jpg" alt="">
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <img src="assets/images/bus.jpg" alt="">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12 layout_hide">
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
                                                	    $busseat=$bus->busseat()->where('row_col',$rowcol)->first(); 
                                                	   
                                                	@endphp
                                                    <td>
                                                    	@if($i==0 && $j==$bus->row-1)
                                                        <img src="{{asset('backend/assets/images/stearing.png')}}" class="seat_icon2"   >
                                                        @else
                                                        	@if($busseat)
                                                        		@if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->first())
                                                        		<img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon2 booked_seat">
                                                        		<p>{{$busseat->seat_name}}</p>
                                                        		@else
                                                        		<img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon2 free_seat">
                                                        		<p>{{$busseat->seat_name}}</p>
                                                        		@endif
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
                                   <!--  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m_b20">
                                       <a href="">
                                           <div class="bus_image">
                                               <img src="assets/images/bus4.jpg" alt="">
                                           </div>
                                           <div class="search_bus_info">
                                               <ul>
                                                   <li><i class="fa fa-bus"></i> Miteri Yatayat</li>
                                                   <li><i class="fa fa-street-view"></i> Route: Kathmandu To Dharan</li>
                                                   <li><i class="fa fa-calendar"></i> Bus No.: BA 5 KHA 4573</li>
                                                   <li><img src="assets/images/seat.png" class="seat_icon">Capacity: 55 Seats</li>
                                                   <li>
                                                       <div class="box-tools pull-right">
                                                           <a href="" class="btn btn-primary">View</a> 
                                                       </div>
                                                       
                                                   </li>
                                               </ul>
                                           </div>
                                       </a>
                                   </div> -->
                                </div>
                               
                            </div>
                        </div>   
                    </div>
                </div>
            </section>
            <!-- /.content -->
        
       

@endsection
@push('script')

  <script>
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".bod-picker").val();
    $(".bod-picker").nepaliDatePicker({

    dateFormat: "%y-%m-%d",
    closeOnDateSelect: true,
    onChange: function(){
        
        date=$('#nepaliDate1').val();

        id=$('#bus_id').val();
        $.ajax({
            url: "{{route('searchBookedSeatLayout')}}",
                method: 'post',
                async: true,
                data: { date: date,id:id},
                success:function(data){
                    console.log(data);
                    $('.layout_hide').remove();
                    $('#append_here').html(data);
                    
                    
                }
            });
    }
    // minDate: formatedNepaliDate
});

        
    
    </script>

@endpush