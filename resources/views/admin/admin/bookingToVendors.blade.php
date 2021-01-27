@extends('layouts.admin')
@section('title','Booking List')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')

<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Ticket Booking Detail <small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <li class="active">Ticket Booking Detail</li>
                </ol>
            </section>
             
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">
	                       
                            <div class="box-header">
                               
                                
                                
                                    <div class="row">   
                                    <form action="{{route('counterPaymentToVendor')}}" method="post">
                                        {{csrf_field()}}
                                   
                                    <div class="col-lg-3 col-md-3">
                                        @if($from)
                                        <input type="text" id="nepaliDate1" class="bod-picker form-control" name="from" autocomplete="off" placeholder="from date(yyyy-mm-dd)" value="{{$from}}">
                                        @else
                                        <input type="text" id="nepaliDate1" class="bod-picker form-control" name="from" autocomplete="off" placeholder="from date(yyyy-mm-dd)" value="">
                                        @endif
                                        
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        @if($to)
                                        <input type="text" id="nepaliDate2" class="bod-picker form-control" name="to" autocomplete="off" placeholder="to date(yyyy-mm-dd)" value="{{$to}}">
                                        @else
                                        <input type="text" id="nepaliDate2" class="bod-picker form-control" name="to" autocomplete="off" placeholder="to date(yyyy-mm-dd)" value="">
                                        @endif
                                    </div>
                                    <input type="hidden" name="vendor_id" value="{{$id}}">
                                    
                                    <div class="col-lg-2 col-md-2">
                                        <div class="form-group">
                                            <input type="radio" name="payment_status" value="1" {{$payment_status==1?'checked':''}}> Paid
                                            <input type="radio" name="payment_status" value="0" {{$payment_status==0?'checked':''}}> Unpaid<br>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1">
                                        <button class="form-control btn btn-success" name="submit" value="">Submit</button>
                                    </div>
                                    </form>
                                </div>
                                    

                                
                                
                                
                                <!-- <div class="box-tools pull-right">


                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div> -->
                            </div>
                            <div class="box-body append_here">
                                <table id="datatable" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead>
                                        <tr>
                                           
                                            <th>Sn. </th>
                                            <th><span class="fa fa-user"></span> Pessanger Name/Phone </th>
                                            <th><span class="fa fa-user"></span> Bus Name / Number</th>
                                            <th><i class="fa fa-calendar"></i> Date:</th>
                                            <th><i class="fa fa-bars"></i> Seat No.</th>
                                            <th><i class="fa fa-street-view"></i> Passenger Station</th>
                                            <th><i class="fa fa-calender"></i> Time</th>
                                            <th><i class="fa fa-calender"></i> Paid</th>
                                            <th><i class="fa fa-money"> </i> Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    	@forelse ($bookings as $key=>$detail)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $detail->name }}/ {{ $detail->phone }}</td>
                                            <td><strong>{{$detail->bus->bus_name}}</strong> <small>{{$detail->bus->bus_number}}</small></td>
                                            <td>{{$detail->booked_on}}</td>
                                            <td>
                                               {{ $detail->seat->seat_name }}
                                            </td>
                                            <td>From: {{$detail->pickup_station}} <br> To: {{$detail->drop_station}}</td>
                                            <td>{{ $detail->time }}</td>
                                            <td>{{ $detail->paid==1?"Paid":"Not Paid" }}</td>
                                            <td>{{ $detail->online_payment==1?"Yes":"No"}}</td>
                                            <?php //dd($detail) ?>
                                        </tr>
                                        @empty
                                        <tr >
                                            <td colspan="10">
                                                No Data Found!!!
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table> 
                                {{$bookings->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection
@push('script')

  <script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#nepaliDate1').nepaliDatePicker({
         onFocus: false,
         ndpTriggerButton: true,
         ndpTriggerButtonText: 'Date',
         ndpTriggerButtonClass: 'btn btn-primary btn-sm'
     });
     $('#nepaliDate2').nepaliDatePicker({
         onFocus: false,
         ndpTriggerButton: true,
         ndpTriggerButtonText: 'Date',
         ndpTriggerButtonClass: 'btn btn-primary btn-sm',
         dateFormat: "%y-%m-%d",
         closeOnDateSelect: true,
     });



  
    
    </script>
@endpush