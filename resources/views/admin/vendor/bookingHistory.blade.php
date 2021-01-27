@extends('layouts.admin')
@section('title','All History');

@section('content')
 <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Bookings<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Vendor</a></li>
                    <li class="active">All Bookings</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <!-- <div class="box-header">
                                <a href="add-destination.php" class="btn btn-success">Add New Passengers</a>
                            </div> -->
                            <div class="box-body ">
                                <table id="datatable" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th><i class="fa fa-user"></i> Passenger's Full Name</th>
                                            <th><i class="fa fa-phone"></i> Phone </th>
                                            <th><i class="fa fa-bus"></i> Bus </th>
                                            <th><i class="fa fa-chair"></i> Seat No.</th>
                                            <th> <i class="fa fa-calender"></i> Date</th>
                                            <th><i class="fa fa-list"></i> From</th>
                                            <th><i class="fa fa-list"></i> TO</th>
                                            <th><i class="fa fa-list"></i> Pickup</th>
                                            <th><i class="fa fa-location"></i> Dropping point</th>
                                            <th><i class="fa fa-time"></i> Time</th>
                                            <th><i class="fa fa-doller"></i> Price</th>
                                            <th><i class="fa fa-home"></i> Payment Method/Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        <?php $total_price = 0; ?>
                                    	@foreach($bookings as $key=>$booking)
                                        <tr>
                                            <?php  $total_price += $booking->price  ?>
                                            <td>{{$key + 1}}.</td>
                                            <td> {{$booking['name']}}</td>
                                            <td>{{$booking['phone']}}</td>
                                            <td>{{ $booking->bus->bus_name.'/'.$booking->bus->bus_number  }}</td>
                                            <td> {{ $booking->seat_id }}</td>
                                            <td> {{ $booking->date }}</td>
                                            <td> {{ $booking->from }}</td>
                                            <td> {{ $booking->to }}</td>
                                            <td> {{ $booking->pickup_station }}</td>
                                            <td>{{ $booking->drop_station  }}</td>
                                            <td>{{ $booking->time }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>{{ $booking->paid?"Paid":"Not Paid" }}/ {{ $booking->online_payment?"Online Payment":"" }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="10">   Total </th>
                                            <th colspan="3"> Rs. {{ $total_price }}</th>
                                           
                                        </tr>
                                    </tfoot>
                                </table> 
                            </div>  
                        </div>
                        <!-- /.box -->
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