@extends('layouts.admin')
@section('title','Booking List')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')

<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Ticket Booking Detail<small>EASYBUS</small></h1>
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
                                        <form action="{{route('paymentToVendor')}}" method="post">
                                            {{csrf_field()}}
                                       
                                        <div class="col-lg-4 col-md-4">
                                            @if($from)
                                            <input type="text" id="nepaliDate1" class="bod-picker form-control" name="from" autocomplete="off" placeholder="from date(yyyy-mm-dd)" value="{{$from}}">
                                            @else
                                            <input type="text" id="nepaliDate1" class="bod-picker form-control" name="from" autocomplete="off" placeholder="from date(yyyy-mm-dd)" value="">
                                            @endif
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            @if($to)
                                            <input type="text" id="nepaliDate2" class="bod-picker form-control" name="to" autocomplete="off" placeholder="to date(yyyy-mm-dd)" value="{{$to}}">
                                            @else
                                            <input type="text" id="nepaliDate2" class="bod-picker form-control" name="to" autocomplete="off" placeholder="to date(yyyy-mm-dd)" value="">
                                            @endif
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                        	<div class="form-group">
                                            <select class="form-control" name="vendor">
                                            	<option>Select Vendors</option>
                                            	@foreach($vendors as $vendor)
                                            	<option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                            	@endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1">
                                            <button class="form-control btn btn-success" name="submit" value="">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                    

                                
                                
                                
                                
                            </div>
                            <div class="box-body append_here">
                                <table id="datatable" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            
                                            <th>
                                                <span class="fa fa-user"></span> Passenger Name & No.
                                            </th>
                                            <th>
                                                <i class="fa fa-calendar"></i> Bus No.:
                                            </th>
                                            <th>
                                                <i class="fa fa-calendar"></i> Date:
                                            </th>
                                            <!-- <th>
                                                <span class="fa fa-user"></span>Departure Detail  
                                            </th> -->
                                            <!-- <th>Pickup Station</th> -->
                                            <th> 
                                                <i class="fa fa-street-view"></i> Passenger Station
                                            </th>
                                            <!-- <th> 
                                                <i class="fa fa-user-circle"></i> Assestant 1
                                            </th>
                                            <th> 
                                                <i class="fa fa-user-circle"></i> Assestant 2
                                            </th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                    	@foreach($paymentDetails as $detail)

                                        <tr >
                                            <td>{{$i}}</td>
                                            <td>{{$detail->booking->name}} <br> 
                                                <small>{{$detail->booking->phone}}</small></td>
                                            <td>{{$detail->booking->bus->bus_number}}</td>
                                            <!-- <td> 2075-12-12 <br>
                                                <small>12:55:00 PM</small>
                                            </td> -->
                                            <td>{{$detail->booking->date}}</td>
                                            <td>
                                                From: {{$detail->booking->pickup_station}} <br> To: {{$detail->booking->drop_station}}
                                            </td>
                                           
                                            
                                        </tr>
                                        @php($i++)
                                        @endforeach
                                       
                                        
                                        
                                    </tbody>
                                </table> 
                                {{$paymentDetails->links()}}

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