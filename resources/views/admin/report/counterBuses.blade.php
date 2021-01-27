@extends('layouts.admin')
@section('title','All Buses')
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
                    <li class="active">Available Bus</li>
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
                                            <th> Bus Name</th>
                                            <th>Bus No.:</th>
                                            <!-- <th><span class="fa fa-street-view"></span> Bus Station </th> -->
                                           
                                            <th>Bus Layout</th>
                                            <th>Assestant 1</th>
                                            <th>Assestant 2</th>
                                            <th>Tickets</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($allBuses->counter_bus as $bus)
                                        <tr >
                                            <td>1.</td>
                                            <td>{{$bus->bus->bus_name}}</td>
                                           
                                            <td>{{$bus->bus->bus_number}}</td>
                                            <td>
                                                <a href="{{route('bus-detail',$bus->bus->id)}}" class="btn vendor-busses"> <span class="fa fa-bus"></span> Bus Layout</a>
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div> -->
                                            </td>
                                            <td>
                                                @if($bus->bus->driver)
                                                {{$bus->bus->driver->name}} <br>
                                                {{$bus->bus->driver->phone}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($bus->bus->conductor)
                                                {{$bus->bus->conductor->name}} <br>
                                                {{$bus->bus->conductor->phone}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('counterBusTickets',$bus->bus->id)}}" class="btn vendor-busses"> <span class="fa fa-bus"></span>Tickets</a>
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
@push('script')
<script type="text/javascript">
    $(function () {
        $("#datatable").DataTable();
    });
</script>
@endpush