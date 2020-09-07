@extends('layouts.admin')
@section('title','bus View')
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
                <!-- <div class="row equal_height">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a href="#" class="btn btn-success">All Vendor</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row equal_height">
                    @foreach($bus->busRoutine()->where('date',$dashboard_nepali_date)->get() as $routine)
                    <div class="col-md-3 col-sm-12 col-xs-12">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <h3 class="profile-username">Seat Information</h3>
                                <div class="row equal_height">
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <ul class="seat_info">
                                        	<?php
                                            $check_date=$dashboard_nepali_date;
                                            
                                            $bus=$routine->bus;
                                            
                                        	$booked=count($bus->busBooking()->where('date',$check_date)->where('shift',$routine->shift)->where('routine_id',$routine->id)->get());
                                        	$available=count($bus->busseat)-$booked;
                                            
                                        	?>
                                            <li>
                                                <img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon1 free_seat" title="Available Seat"> <span>Available Seats: {{$available}} </span>
                                            </li>
                                           
                                            <li>
                                                <img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon1 booked_seat" disabled title="Booked Seat"><span>Booked Seats :{{$booked}}</span>
                                            </li>
                                            <!-- <li>
                                                <img src="{{asset('backend/assets/images/seat.png')}}" class="seat_icon1 " disabled title="Booked Seat"><span>Total Seats : 39</span>
                                            </li> -->
                                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="box box-primary">
                            <div class="box-body box-profile">
                                <h3 class="profile-username">Bus Image</h3>
                                <div class="row equal_height bus_layout_image">
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <img src="assets/images/bus.jpg" alt="">
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <img src="assets/images/bus.jpg" alt="">
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <img src="assets/images/bus.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
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
                                                        $check_date=$dashboard_nepali_date;

                                                        $value=Session::get('jointable');

                                                        
                                                    @endphp
                                                    
                                                    
                                                    <td class="bookmyseat">
                                                        @if($i==0 && $j==$bus->row-1)
                                                        <img src="{{asset('front/assets/images/stearing.png')}}" class="seat_icon2">
                                                        @else
                                                            @if($busseat)
                                                                @if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->where('routine_id',$routine->id)->first())
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
                                        <div class="text-center">
                                            <h2>
                                                {{$bus->bus_name}} from({{$routine->from}}) to({{$routine->to}})
                                                <br>
                                                time({{$routine->time}})
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>   
                    </div>
                    @endforeach
                </div>
            </section>
            <!-- /.content -->
        
       

        

@endsection