@extends('layouts.admin')
@section('title','Passenger List')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Ticket Booking Detail<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Vendor</a></li>
                    <li class="active">Ticket Booking Detail</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                
                                <a href="{{route('allCounters')}}" class="btn vendor-busses">Back</a>
                                
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body vendor-box">
                                <table id="datatable" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>Sn</th>
                                            
                                            <th>
                                                <span class="fa fa-user"></span> Passenger Name & No.
                                            </th>
                                            <th>
                                                <i class="fa fa-calendar"></i> Bus No.:
                                            </th>
                                            <th>
                                                <i class="fa fa-calendar"></i> Date:
                                            </th>
                                            <!-- <th>
                                                <span class="fa fa-user"></span>Departure Detail  
                                            </th> -->
                                            <!-- <th>Pickup Station</th> -->
                                            <th> 
                                                <i class="fa fa-street-view"></i> Passenger Station
                                            </th>
                                            <!-- <th> 
                                                <i class="fa fa-user-circle"></i> Assestant 1
                                            </th>
                                            <th> 
                                                <i class="fa fa-user-circle"></i> Assestant 2
                                            </th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($bookingDetails as $detail)
                                        <tr >
                                            <?php //dd(DB::table('bus_bookings')->where('id', $detail->booking_id)->first()) ?>
                                            <td>{{$i}}</td>
                                            <td>{{@$detail->booking->from}} <br> 
                                                <small>{{ @$detail->booking->phone}}</small></td>
                                            <td>{{ @$detail->booking->bus->bus_number}}</td>
                                            <!-- <td> 2075-12-12 <br>
                                                <small>12:55:00 PM</small>
                                            </td> -->
                                            <td>{{ @$detail->booking->date}}</td>
                                            <td>
                                                From: {{ @$detail->booking->pickup_station}} <br> To: {{ @$detail->booking->drop_station}}
                                            </td>
                                           
                                            
                                        </tr>
                                        @php($i++)
                                        @endforeach
                                       
                                        
                                        
                                    </tbody>
                                </table> 
                                {{$bookingDetails->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection