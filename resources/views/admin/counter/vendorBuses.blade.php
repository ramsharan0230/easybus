@extends('layouts.admin')
@section('title','Vendor Buses')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Available Bus<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <li><a href="#">Bus List</a></li>
                    <li class="active">Vendor Bus</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                           
                            <div class="box-body vendor-box">
                                <table id="datatable" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">

                                        <tr>
                                            <th>Bus Name</th>
                                            <th>Bus Number</th>
                                           
                                            <th>Bus Type</th>
                                            <th>Booking Status</th>
                                            <th style="width:20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($buses as $bus)
                                        <tr >
                                            <td>{{$bus->bus_name}}</td>
                                           
                                            <td>{{$bus->bus_number}}</td>
                                            <td>Deluxe</td>
                                            <td>Booked</td>
                                            <td class="buss-list-btn"><a href="#" class="btn vendor-busses">Booking Details</a><a href="#" class="btn vendor-busses">Ticket History</a></td>
                                            
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
<script type="text/javascript">
    $(function () {
        $("#datatable").DataTable();
    });
</script>
@endpush