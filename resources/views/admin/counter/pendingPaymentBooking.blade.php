@extends('layouts.admin')
@section('title','My Bookings')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>My Bookings<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <li><a href="#">Payment</a></li>
                    <li class="active">My Bookings</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                <!-- <a href="add-bus.php" class="btn btn-success">Add Bus</a> -->
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body ">
                                <table id="" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Booking No.:</th>
                                            <th>
                                                <span class="fa fa-user"></span> Passenger Name & No.
                                            </th>
                                            <th>Token</th>
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
                                            <th>Price</th>
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
                                        @foreach($bookings as $booking)
                                        <tr >
                                            <td>{{$i}}</td>
                                            <td>{{$booking->book_no}}</td>
                                            <td>{{$booking->name}} <br> 
                                                <small>{{$booking->phone}}</small>
                                            </td>
                                            <td>{{$booking->token}}</td>
                                            <td>{{$booking->bus->bus_number}}</td>
                                            <!-- <td> 2075-12-12 <br>
                                                <small>12:55:00 PM</small>
                                            </td> -->
                                            <td>{{$booking->date}}</td>
                                            <td>
                                                From: {{$booking->pickup_station}} <br> To: {{$booking->drop_station}}
                                            </td>
                                            <td>{{$booking->price}}</td>
                                           
                                        </tr>
                                        @php($i++)
                                        @endforeach
                                       
                                        
                                        
                                    </tbody>
                                   
                                </table> 
                                {{$bookings->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection
@push('script')
<script type="text/javascript">
    $(function () {
        $("#datatable").DataTable();
    });
</script>
@endpush