@extends('layouts.admin')
@section('title','Booking List')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')

<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Ticket Booking Detail<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
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
                                
                                <input type="hidden" name="bus_id" value="" id="bus_id">
                                <div class="pull-right"> 
                                    <!-- <div class="row">   
                                        <div class="col-lg-12 col-md-12">
                                            <input type="text" id="nepaliDate1" class="bod-picker form-control" name="date" autocomplete="off">
                                        </div>
                                    </div> -->

                                </div>
                                
                                
                                <!-- <div class="box-tools pull-right">


                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div> -->
                            </div>
                            <div class="box-body append_here vendor-box">
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
                                            <td>{{$booking->seat->seat_name}}</td>
                                            <td>{{$booking->name}} <br> 
                                                <small>{{$booking->phone}}</small></td>
                                            <td>{{$booking->bus->bus_number}}</td>
                                            <!-- <td> 2075-12-12 <br>
                                                <small>12:55:00 PM</small>
                                            </td> -->
                                            <td>{{$booking->date}}</td>
                                            <td>
                                                From: {{$booking->to}} <br> To: {{$booking->from}}
                                            </td>
                                           
                                            
                                        </tr>
                                        @php($i++)
                                        @endforeach
                                       
                                        
                                        
                                    </tbody>
                                </table> 

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
    $(function () {
        $("#datatable").DataTable();
    });

    
    </script>
@endpush