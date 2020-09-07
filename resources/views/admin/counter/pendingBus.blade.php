@extends('layouts.admin')
@section('title','Pending Buses')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Pending Bus<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <li><a href="#">Bus List</a></li>
                    <li class="active">Pending Bus</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                <!-- <a href="add-bus.php" class="btn btn-success">Add Bus</a> -->
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
                                            <!-- <th><span class="fa fa-street-view"></span> Bus Station </th> -->
                                            
                                            <th><i class="fa fa-bus"></i> Bus Layout</th>
                                            <th><i class="fa fa-user-circle"></i> Assestant 1</th>
                                            <th><i class="fa fa-user"></i> Assestant 2</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($allBuses as $bus)
                                        <tr >
                                            <td>1.</td>
                                            <td>{{$bus->bus->bus_name}}</td>
                                           
                                            <td>{{$bus->bus->bus_number}}</td>
                                            <!-- <td>Koteshwor, Kathmandu</td> -->
                                            
                                            <!-- <td>2075 Chaitra 10 </td>
                                            <td>2075Chaitra 11 </td> -->
                                            <td>
                                                <a href="{{route('busLayout',$bus->bus->id)}}" class="btn btn-info"> <span class="fa fa-bus"></span> Bus Layout</a>
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div> -->
                                            </td>
                                            <td>@if($bus->bus->driver)
                                                {{$bus->bus->driver->name}} <br>
                                                {{$bus->bus->driver->phone}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($bus->bus->conductor)
                                               {{$bus->bus->conductor->name}}  <br>
                                                {{$bus->bus->conductor->phone}}
                                                @endif
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