@extends('layouts.admin')
@section('title','All Vendors')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Vendors<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">My Vendors</a></li>
                    <li class="active">All Vendors</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <form action="" class="search">
                    <input type="search" placeholder="Search">
                    <button class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
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
                                <table id="datatable" id="vendor-table" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>Vendor Name</th>
                                            <th>Vendor Address</th>
                                            <th>Contact Number.</th>
                                            <th style="width:20%;">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($vendors as $vendor)
                                        <tr>
                                                
                                            <td>{{$vendor->company_name}}</td>
                                            <!-- <td> baburam thapa</td> -->
                                            <td>{{$vendor->address}}</td>
                                            <td>{{$vendor->company_phone}}</td>
                                            <td><a href="{{route('vendorBuses',$vendor->id)}}" class="btn vendor-busses">Authorized Bus List</a>
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