@extends('layouts.admin')
@section('content')
	 <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Bus<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <!-- <li><a href="#">Assestant</a></li> -->
                    <li class="active">Search My Bus</li>
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
                   <!--  <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-body">
                               <form action="">
                                    <h3 class="profile-username">Search Bus</h3>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="bus_from" id="bus_from" class="form-control" placeholder="From">
                                            </div>
                                            <div class="col-md-4"> 
                                                <input type="text" name="bust_to" id="bust_to" class="form-control" placeholder="To">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" name="search_bus" id="search_bus" class="form-control" placeholder="Date">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-success"> <span class="fa fa-search"></span> Search</button>
                                            </div>
                                        </div>
        

                                        
                                        
                                        
                                        
                                        
                                   
                                        
                                        
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-body">
                               <form action="">
                                    <h3 class="profile-username">Search by Date</h3>
                                    <div class="input-group">
                                        
                                        <input type="date" name="search_bus" id="search_bus" class="form-control" placeholder="Vendor Name">
                                        <div class="input-group-addon">
                                             <button type="submit" class="btn btn-success"> <span class="fa fa-search"></span> Search</button>
                                        </div>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">My Bus</h3>
                            </div>
                            <div class="box-body ">
                                <form action="" class="form form-horizontal form-responsive" method="post" >
                                    <div class="row equal_height form-group">
                                    	@foreach($allBuses as $bus)
                                        <div class="col-md-4 col-sm-12 col-xs-12 m_b20">
                                            <a href="counter-booking-detail.php">
                                                <div class="bus_image">
                                                    <img src="{{asset('images/listing/'.$bus->image_1)}}" alt="">
                                                </div>
                                                <div class="search_bus_info">
                                                    <ul>
                                                        <li><i class="fa fa-bus"></i> {{$bus->bus->bus_name}}</li>
                                                        <li><i class="fa fa-street-view"></i> Route: {{$bus->bus->from}} To {{$bus->bus->to}}</li>
                                                        <!-- <li><i class="fa fa-clock-o"></i> 2075 12 04</li> -->
                                                        <li><i class="fa fa-calendar"></i> Bus No.: {{$bus->bus->bus_number}}</li>
                                                        <li>
                                                            <div class="box-tools pull-right">
                                                                <a href="{{route('bookingList',$bus->bus->id)}}" class="btn btn-primary">View</a> 
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                        
                                       
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
            </section>
@endsection