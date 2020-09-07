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
                                            <th>Passenger's Full Name</th>
                                            <!-- <th><i class="fa fa-bus"></i> From </th> 
                                            <th><i class="fa fa-map-marker"></i> To</th> -->
                                            <th><i class="fa fa-phone"></i> Contact No.</th> 
                                            <th>Address</th>
                                            <!-- <td>Pickup Point</td> -->
                                            <!-- <th>Total Tickets</th> -->

                                             
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    	@php($i=1)
                                    	@foreach($bookings as $booking)
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td> {{$booking['name']}}</td>
                                            <td>{{$booking['phone']}}</td>
                                            <td>{{$booking['address']}}</td>
                                            <!-- <td>New Buspark</td> -->
                                            
                                            <!-- <td> -->
                                                <!-- <a href="passenger-detail.php" class="btn btn-info"> <span class="fa fa-edit"></span> edit</a> -->
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div> -->
                                            <!-- </td> -->
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