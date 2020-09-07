@extends('layouts.admin')
@section('title','All Counter')

@section('content')
 <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Counters<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">User Management</a></li>
                    <li class="active">All Counters</li>
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
                                <table id="example1" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>SN</th>
                                            <th>Counter Name</th>
                                            
                                            <th> Location</th>
                                            <th>Telephone No.</th>
                                            
                                            <!-- <th><span class="fa fa-clipboard"></span> All Issued Tickets </th> -->
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    	@php($i=1)
                                    	@foreach($details as $detail)
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td>{{$detail->company_name}}</td>
                                            <td>{{$detail->address}}</td>
                                            <td>{{$detail->company_phone}}</td>
                                            <td>{{$detail->email}}</td>
                                            <td>
                                                <a href="{{route('counterDetail',$detail->id)}}" class="btn vendor-busses"> <span class="fa fa-eye"></span> view</a>
                                                <a href="{{route('counterTicketsIssued',$detail->id)}}" class="btn vendor-busses"> Ticket Issued</a>
                                                <a href="{{route('vendorOfCounter',$detail->id)}}" class="btn vendor-busses">Vendors</a>
                                                <a href="{{route('counterBusList',$detail->id)}}" class="btn vendor-busses">Bus</a>
                                               
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
@push('script')
  
<script >
    $(document).ready(function(){
       $('.delete').submit(function(e){
        e.preventDefault();
        var message=confirm('Are you sure to delete');
        if(message){
          this.submit();
        }
        return;
       });
    });
    $(function () {
    $("#example1").DataTable({
        "pageLength": 100
    });
  });
  </script>
@endpush