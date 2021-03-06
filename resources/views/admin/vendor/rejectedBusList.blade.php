@extends('layouts.admin')
@section('title','Rejected List')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Rejected List<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Vendors</a></li>
                    <li class="active">All Bus</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                <a href="{{route('bus.create')}}" class="btn btn-success">Add Bus</a>
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
                                            <th>SN</th>
                                            <th><span class="fa fa-bus"></span> Bus Name</th>
                                            <th><i class="fa fa-calendar"></i> Bus No.:</th>
                                            <th><span class="fa fa-user"></span> Request Sent By </th>
                                            <th> <i class="fa fa-user-circle"></i> Driver</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @foreach($bus_request as $request)
                                        <tr >
                                            <td>1.</td>
                                            <td>{{@$request->bus->bus_name}}</td>
                                           
                                            <td>{{@$request->bus->bus_number}}</td>
                                            <td>
                                               {{@$request->requestSender->company_name}}
                                            </td>
                                            <td>{{@$request->bus->driver->name}}</td>
                                            
                                            <td>
                                               <!--  <a href="bus-detail.php" class="btn btn-info"> <span class="fa fa-eye"></span> View</a> -->
                                                 
                                                <div class="btn  btn-success">
                                                    @if($request->acceptance_status==0)
                                                    <form method= "post" action="{{route('acceptRequest')}}" class="delete">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$request->id}}">
                                                        
                                                            <button type="submit" class="btn-delete" style="display:inline" ><span class="fa fa-check"></span> Approve</button>
                                                        @else
                                                        <button class="btn btn-info" disabled>Approved</button>
                                                        @endif
                                                    </form>
                                                </div>
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="{{route('rejectRequest')}}" class="delete">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$request->id}}">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-close"></span> Reject</button>
                                                    </form>
                                                </div> -->
                                            </td>
                                        </tr>
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