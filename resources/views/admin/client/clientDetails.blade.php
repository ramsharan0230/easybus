@extends('layouts.admin')
@section('title','Client Booking History')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
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
                            <div class="box-body vendor-box">
                                <table id="datatable" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>Sn</th>
                                            <th>Seat No.:</th>
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
                                        @foreach($bookings as $booking)
                                        <tr >
                                            <td>{{$i}}</td>
                                            <td>{{$booking->book_no}}</td>
                                            <td>{{$booking->name}} <br> 
                                                <small>{{$booking->phone}}</small></td>
                                            <td>{{$booking->bus->bus_number}}</td>
                                            <!-- <td> 2075-12-12 <br>
                                                <small>12:55:00 PM</small>
                                            </td> -->
                                            <td>{{$booking->date}}</td>
                                            <td>
                                                From: {{$booking->from}} <br> To: {{$booking->sub_destination?$booking->sub_destination:$booking->to}}
                                            </td>
                                           
                                            <!-- <td>
                                                @if($booking->bus->driver)
                                                {{$booking->bus->driver->name}} <br>
                                                <small>{{$booking->bus->assistant_one_phone}}</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($booking->bus->conductor)
                                                {{$booking->bus->conductor->name}} <br>
                                                <small>{{$booking->bus->assistant_two_phone}}</small>
                                                @endif
                                            </td> -->
                                            
                                            <!-- <td>
                                                <a href="add-bus.php" class="btn btn-info"> <span class="fa fa-edit"></span> Edit</a>
                                                <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div>
                                            </td> -->
                                        </tr>
                                        @php($i++)
                                        @endforeach
                                    </tbody>
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