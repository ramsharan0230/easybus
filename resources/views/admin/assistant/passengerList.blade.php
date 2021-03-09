@extends('layouts.admin')
@section('title','Passenger List')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Ticket Booking Detail<small>EASYBUS</small></h1>
        <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Assestant</a></li>
            <li class="active">Ticket Booking Detail</li>
        </ol>
    </section>
            
    <!-- Main content -->
    <section class="content">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible message">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {!! Session::get('message') !!}
            </div>
            @endif
            

        <div class="row equal_height">
            <div class="col-lg-12">
                <!-- Default box -->
                <div class="box">

                    <div class="box-header">
                        @if($bus)
                        <a href="{{route('assistantBookingView')}}" class="btn btn-info">BUS HISTORY </a>
                        @endif
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body ">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#today-booking-list"><strong>Today Bookins</strong></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#yesterday-booking-list"><strong>Yesterday Bookings</strong></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#booking-history"><strong>History</strong></a>
                            </li>
                          </ul>
                        
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="today-booking-list" class="container tab-pane active"><br>
                              <h3>Today Booking List</h3>
                              <table id="example1" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Seat No.:</th>
                                        <th>
                                            <span class="fa fa-user"></span> Passenger Name & No.
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i> Bus No.:
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i> Date:
                                        </th>
                                        <th>
                                            <span class="fa fa-user"></span> Departure Time 
                                        </th>
                                        <!-- <th>Pickup Station</th> -->
                                        <th> 
                                            <i class="fa fa-street-view"></i> Passenger Station
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-uppercase">
                                    @php($i=1)
                                    @foreach($todayBookings as $booking)
                                    <tr >
                                        <?php //dd($booking)//dd(DB::table('bus_bookings')->where('')->first()) ?>
                                        <td>{{$i}}</td>
                                        <td>{{$booking->seat_id}}</td>
                                        <td>{{$booking->name}} <br> 
                                        <small>{{$booking->phone}}</small></td>
                                        <td>{{$booking->bus->bus_number}}</td>
                                        <!-- <td> 2075-12-12 <br>
                                            <small>12:55:00 PM</small>
                                        </td> -->
                                        <td>{{$booking->date}}</td>
                                        <td>{{$booking->time}}</td>
                                        <td>
                                            From: {{$booking->pickup_station}} <br> To: {{$booking->drop_station==null?$booking->to:$booking->drop_station}}
                                        </td>
                                        
                                        <!-- <td>
                                            @if($booking->bus->driver)
                                            {{$booking->bus->driver->name}} <br>
                                            <small>{{$booking->bus->assistant_one_phone}}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($booking->bus->conductor)
                                            {{$booking->bus->conductor->name}} <br>
                                            <small>{{$booking->bus->assistant_two_phone}}</small>
                                            @endif
                                        </td> -->
                                        
                                        <!-- <td>
                                            <a href="add-bus.php" class="btn btn-info"> <span class="fa fa-edit"></span> Edit</a>
                                            <div class="btn  btn-danger">
                                                <form method= "post" action="" class="delete">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                </form>
                                            </div>
                                        </td> -->
                                    </tr>
                                    @php($i++)
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            </div>
                            <div id="yesterday-booking-list" class="container tab-pane fade"><br>
                              <h3>Yesterday Booking List</h3>
                              <table id="example1" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Seat No.:</th>
                                        <th>
                                            <span class="fa fa-user"></span> Passenger Name & No.
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i> Bus No.:
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i> Date:
                                        </th>
                                        <th>
                                            <span class="fa fa-user"></span> Departure Time 
                                        </th>
                                        <!-- <th>Pickup Station</th> -->
                                        <th> 
                                            <i class="fa fa-street-view"></i> Passenger Station
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-uppercase">
                                    @php($i=1)
                                    @foreach($bookings as $booking)
                                    <tr >
                                        <?php //dd($booking)//dd(DB::table('bus_bookings')->where('')->first()) ?>
                                        <td>{{$i}}</td>
                                        <td>{{$booking->seat_id}}</td>
                                        <td>{{$booking->name}} <br> 
                                        <small>{{$booking->phone}}</small></td>
                                        <td>{{$booking->bus->bus_number}}</td>
                                        <!-- <td> 2075-12-12 <br>
                                            <small>12:55:00 PM</small>
                                        </td> -->
                                        <td>{{$booking->date}}</td>
                                        <td>{{$booking->time}}</td>
                                        <td>
                                            From: {{$booking->pickup_station}} <br> To: {{$booking->drop_station==null?$booking->to:$booking->drop_station}}
                                        </td>
                                        
                                        <!-- <td>
                                            @if($booking->bus->driver)
                                            {{$booking->bus->driver->name}} <br>
                                            <small>{{$booking->bus->assistant_one_phone}}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($booking->bus->conductor)
                                            {{$booking->bus->conductor->name}} <br>
                                            <small>{{$booking->bus->assistant_two_phone}}</small>
                                            @endif
                                        </td> -->
                                        
                                        <!-- <td>
                                            <a href="add-bus.php" class="btn btn-info"> <span class="fa fa-edit"></span> Edit</a>
                                            <div class="btn  btn-danger">
                                                <form method= "post" action="" class="delete">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                </form>
                                            </div>
                                        </td> -->
                                    </tr>
                                    @php($i++)
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div id="booking-history" class="container tab-pane fade"><br>
                              <h3>Booking History</h3>
                              <table id="example1" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Seat No.:</th>
                                        <th>
                                            <span class="fa fa-user"></span> Passenger Name & No.
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i> Bus No.:
                                        </th>
                                        <th>
                                            <i class="fa fa-calendar"></i> Date:
                                        </th>
                                        <th>
                                            <span class="fa fa-user"></span> Departure Time 
                                        </th>
                                        <!-- <th>Pickup Station</th> -->
                                        <th> 
                                            <i class="fa fa-street-view"></i> Passenger Station
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-uppercase">
                                    @php($i=1)
                                    @foreach($bookings as $booking)
                                    <tr >
                                        <?php //dd($booking)//dd(DB::table('bus_bookings')->where('')->first()) ?>
                                        <td>{{$i}}</td>
                                        <td>{{$booking->seat_id}}</td>
                                        <td>{{$booking->name}} <br> 
                                        <small>{{$booking->phone}}</small></td>
                                        <td>{{$booking->bus->bus_number}}</td>
                                        <!-- <td> 2075-12-12 <br>
                                            <small>12:55:00 PM</small>
                                        </td> -->
                                        <td>{{$booking->date}}</td>
                                        <td>{{$booking->time}}</td>
                                        <td>
                                            From: {{$booking->pickup_station}} <br> To: {{$booking->drop_station==null?$booking->to:$booking->drop_station}}
                                        </td>
                                        
                                        <!-- <td>
                                            @if($booking->bus->driver)
                                            {{$booking->bus->driver->name}} <br>
                                            <small>{{$booking->bus->assistant_one_phone}}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($booking->bus->conductor)
                                            {{$booking->bus->conductor->name}} <br>
                                            <small>{{$booking->bus->assistant_two_phone}}</small>
                                            @endif
                                        </td> -->
                                        
                                        <!-- <td>
                                            <a href="add-bus.php" class="btn btn-info"> <span class="fa fa-edit"></span> Edit</a>
                                            <div class="btn  btn-danger">
                                                <form method= "post" action="" class="delete">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                </form>
                                            </div>
                                        </td> -->
                                    </tr>
                                    @php($i++)
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            </div>
                          </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@push('script')
  <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>
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
       $('.message').fadeOut(4000);
    });
    $(function () {
        $("#example1").DataTable({
            "pageLength": 100
        });

    });
  </script>
@endpush