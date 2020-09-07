@extends('layouts.admin')
@section('title','Destination List')
@section('content')
	<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add Destination<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Destination Management</a></li>
                    <li class="active">Add Destination</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                <a href="{{route('destination.index')}}" class="btn btn-success">All Destination</a>
                            </div>
                            <div class="box-body ">
                                <form action="{{route('destination.store')}}" method="post">
                                    {{csrf_field()}}
                                
                               <div class="row equal_height form-group">
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-bus"> Name</i>
                                            </div>
                                            <input type="text" name="name" id="conter_name" class="form-control"   placeholder="Ex. Kathmandu">
                                        </div>
                                    </div>
                                   
                                     
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <div class="box-tools pull-right">
                                            <div class="input-group">
                                                
                                                <button type="submit" class="btn btn-success"> <span class="fa fa-plus"></span> Add Destination</button>
                                            </div>
                                        </div>
                                    </div>
                              </form>
                                </div>
                            </div>  
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        
       

        
@endsection