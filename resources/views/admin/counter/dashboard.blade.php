@extends('layouts.admin')
@section('title','Counter Dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Counter<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('counterDashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    
                    <li class="active">Dashboard</li>
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
                                            <th>Desination</th>
                                            <th><i class="fa fa-bus"></i> Bus Layout</th>
                                            <th>Seats</th>

                                            <th><i class="fa fa-user-circle"></i> Assistants</th>
                                            
                                        </tr>
                                        
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($allBuses as $bus)
                                        <?php

                                        if($bus->bus->busBooking){
                                            $booked=count($bus->bus->busBooking()->where('date',$check_date)->get());
                                        }else{
                                            $booked=0;
                                        }
                                        if($bus->bus->busseat){
                                            $available=count($bus->bus->busseat)-$booked;
                                        }else{
                                            $available=0;
                                        }
                                        
                                        ?>
                                        <?php

                                        $routine = $bus->bus->busRoutine()->where('date',$check_date)->get();

                                        ?>
                                        @if(count($routine)>0)
                                        <tr >
                                            <td>1.</td>
                                            <td>{{$bus->bus->bus_name}}</td>
                                           
                                            <td>{{$bus->bus->bus_number}}</td>
                                           
                                            <td>
                                                
                                                From:{{$routine[0]->from}}<br>
                                                To:{{$routine[0]->to}}
                                                
                                            </td>
                                           
                                            <td>
                                                <a href="{{route('bookedView',$bus->bus->id)}}" class="btn vendor-busses"> <span class="fa fa-bus"></span> Bus Layout</a>
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div> -->
                                            </td>
                                            <td>
                                                Booked:{{$booked}}<br>
                                                Available:{{$available}}
                                            </td>
                                            <td>
                                                @if($bus->bus->driver)
                                                <u>Driver</u>
                                                {{$bus->bus->driver->name}} <br>
                                                {{$bus->bus->driver->phone}}<br>

                                                @endif
                                                @if($bus->bus->conductor)
                                                <u>Conductor</u>
                                                {{$bus->bus->conductor->name}} <br>
                                                {{$bus->bus->conductor->phone}}<br>
                                                @endif
                                            </td>
                                           
                                        </tr>

                                        @php($i++)
                                        @endif
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