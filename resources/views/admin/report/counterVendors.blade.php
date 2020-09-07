@extends('layouts.admin')
@section('title','All Vendors')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Vendors of {{$counter->name}}<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">My Vendors</a></li>
                    <li class="active">All Vendors</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                           <!--  <div class="box-header">
                                <a href="#" class="btn btn-success">Add Counter</a>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                            </div> -->
                            <div class="box-body vendor-box">
                                <table id="datatable" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>SN</th>
                                            <th>Counter Name</th>
                                            <!-- <th>Counter Assestant</th> -->
                                            <th><i class="fa fa-map-marker"></i> Location</th>
                                            <th><i class="fa fa-phone"></i> Telephone No.</th>
                                            
                                            <!-- <th><span class="fa fa-bus"></span> Approved Bus</th> -->
                                            <th> <i class="fa fa-at"></i> Email</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($vendors as $vendor)
                                        <tr>
                                                
                                            <td>{{$i}}.</td>
                                            
                                            <td>{{$vendor->company_name}}</td>
                                            <!-- <td> baburam thapa</td> -->
                                            <td>{{$vendor->address}}</td>
                                            <td>{{$vendor->company_phone}}</td>
                                            
                                            <!-- <td>
                                                <a href="approved-bus-list.php" class="btn btn-success"> <span class="fa fa-bus"></span> 3</a>
                                            </td> -->
                                            <td>{{$vendor->email}}</td>
                                            
                                            <td>
                                                <a href="{{route('vendor.show',$vendor->id)}}" class="btn vendor-busses">View</a>
                                                
                                                <a href="{{route('bookingTovendors',$vendor->id)}}" class="btn vendor-busses"> <span class="fa fa-edit"></span> Bookings</a>
                                                <!-- <a href="{{route('ticketSale',$vendor->id)}}" class="btn btn-warning"> <span class="fa fa-edit"></span>Ticket Sale</a> -->
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div> -->
                                            </td>
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