@extends('layouts.admin')
@section('title','Bus Layout')
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
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Seat Layout</h3>
                            </div>
                            <div class="box-body ">
                                
                                <div class="row equal_height form-group">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p_t20">
                                       <div class="bus-layout-wrapper">
                                          <div class="layout-side">
                                                <h2>Seat Layout({{$check_date}})</h2>
                                                <table class="counter_bus_seat_view">
                                                    <tbody >
                                                        @for($i=0;$i<$bus->column;$i++)
                                                        <tr>
                                                            @for($j=0;$j<$bus->row;$j++)
                                                            @php
                                                                $rowcol=$i.$j;
                                                                $busseat=$bus->busseat()->where('row_col',$rowcol)->first(); 
                                                            
                                                            @endphp
                                                            <!-- <td>
                                                                @if($i==0 && $j==$bus->row-1)
                                                                <img src="{{asset('backend/assets/images/stearing.png')}}" class="seat_icon2">
                                                                @else
                                                                    @if($busseat)
                                                                        <img src="{{asset('backend/assets/images/seat2.png')}}" class="seat_icon2 bus-layout-seat free_seat">
                                                                    <p>{{$busseat->seat_name}}</p>
                                                                    @endif
                                                                @endif
                                                            </td> -->
                                                            <td>
                                                            	@if($i==0 && $j==$bus->row-1)
                                                                <img src="{{asset('backend/assets/images/stearing.png')}}" class="seat_icon2">
                                                                @else
                                                                	@if($busseat)
                                                                		@if($busseat->booking()->where('bus_id',$bus->id)->where('date',$check_date)->first())
                                                                		<img src="{{asset('front/assets/images/booked.png')}}" class="seat_icon2  seat_change" >
                                                        						<p class="booked_seat_text">
                                                                		<p>{{$busseat->seat_name}}</p>
                                                                		@else
                                                                		<img src="{{asset('backend/assets/images/seat2.png')}}" class="seat_icon2 bus-layout-seat free_seat">
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
                                          </div>
                                            <!-- <div class="bus-info-side">
                                                <h2>Bus Information</h2>
                                                <ul class="bus-info-wrapp">
                                                    <li><p>Bus Number:</p><span>Ba 5 Kha 2052</span></li>
                                                    <li><p>Bus Name:</p><span>Salina Deluxe</span></li>
                                                    <li><p>Model Number:</p><span>122456765</span></li>
                                                    <li><p>Manufacture Company:</p><span>Starline</span></li>
                                                    <li><p>Bill Book Number:</p><span>846592761641</span></li>
                                                    <li><p>Total Seat:</p><span>25</span></li>
                                                    <li><p>Bus Category:</p><span>Deluxe</span></li>
                                                    <li><p>Phone Number:</p><span>9803649228</span></li>
                                                    <li><p>Vendor:</p><span>Namaste Yatayat Pvt.Ltd</span></li>
                                                    <li><p>Owner:</p><span>Bharat Baraili</span></li>
                                                    <li><p>Driver:</p><span>Pramod Khatioda</span></li>
                                                    <li><p>Conductor:</p><span>Ritesh Shrestha</span></li>
                                                    <li><p>Facilities:</p><span>Free Wifi,Double Folding Seat,Telivision,Free Meal,Ac,Heater,Cooler,Free Water,Newspaper</span></li>
                                                    <li><p>Bus Photo:</p><span><img src="{{asset('backend/assets/images/bus2.jpg')}}" alt=""><img src="{{asset('backend/assets/images/bus2.jpg')}}" alt=""><img src="{{asset('backend/assets/images/bus2.jpg')}}" alt=""></span></li>
                                                    <li><p>Billbook Document:</p><span><img src="{{asset('backend/assets/images/bus2.jpg')}}" alt=""><img src="{{asset('backend/assets/images/bus2.jpg')}}" alt=""><img src="{{asset('backend/assets/images/bus2.jpg')}}" alt=""></span></li>
                                                </ul>
                                            </div> -->
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