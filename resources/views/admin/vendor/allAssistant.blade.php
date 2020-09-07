@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Assestants<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Vendor</a></li>
                    <li><a href="#">Assestant Management</a></li>
                    <li class="active">All Assestants</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                <a href="{{route('addAssistant')}}" class="btn add-asis-btn vendor-busses">Add Assestant</a>
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
                                            <th>Assestant Full Name</th> 
                                            <th><i class="fa fa-mobile"></i> Contact No.</th>
                                            <th><i class="fa fa-map-marker"></i> Address</th>
                                            <th> <i class=" fa fa-eye"></i> View  All Detail </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    	@php($i=1)
                                    	@foreach($assistants as $assistant)
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td> {{$assistant->name}}</td>
                                            <td>{{$assistant->phone}}</td>
                                            <td>{{$assistant->address}}</td>
                                            <td> 
                                                <a href="{{route('assistantDetail',$assistant->id)}}" class="btn vendor-busses"> <i class="fa fa-eye"></i> View</a> 
                                            </td>    
                                          
                                            <td>
                                                <a href="{{route('editAssistant',$assistant->id)}}" class="btn vendor-busses"> <span class="fa fa-edit"></span> edit</a>
                                                <div class="btn vendor-busses">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div>
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