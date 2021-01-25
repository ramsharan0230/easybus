@extends('layouts.admin')
@section('title','Monthly Income Report')
@push('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endpush
@section('content')
  <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Income<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Reports</a></li>
                    <li class="active">Income</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="box-title"> Monthly Income Report</div>
                            </div>
                            <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <form action="{{ route('income-reports.monthly-income-reports') }}" method="GET">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="calender">Calender</label>
                                                        <input type="text" id="datepicker" class="form-control" autocomplete="off" name="month" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn btn-primary btn-sm pull-left" style="margin-top:25px"> Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-6">
                                            <form action="{{ route('income-reports.monthly-income-reports.pdf') }}" method="GET">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="calender">Calender</label>
                                                        <input type="text" id="datepicker1" class="form-control" autocomplete="off" name="date" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="submit" target="_blank" class="btn btn-primary btn-sm pull-left" style="margin-top:25px"> PDF</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                <table id="example1" class="table vendor-table table-striped">
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Bus Name</th>
                                            <th>Bus No</th>
                                            <th>Seat No. </th>
                                            <th>Booked By/Phone</th>
                                            <th>Booked Date</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Price</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($monthlyTickets as $key=>$monthlyTicket)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $monthlyTicket->bus->bus_name }}</td>
                                        <td>{{ $monthlyTicket->bus->bus_number }}</td>
                                        <td>{{ $monthlyTicket->seat_id }}</td>
                                        <td>{{ $monthlyTicket->name.'/'.$monthlyTicket->phone }}</td>
                                        <td>{{ $monthlyTicket->booked_on }}</td>
                                        <td>{{ $monthlyTicket->from }}</td>
                                        <td>{{ $monthlyTicket->to }}</td>
                                        <td>{{ 'Rs'.'. '.$monthlyTicket->price }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8"><strong>Total</strong></td>
                                            <td><strong>{{ 'Rs'.'. '.$sumMonthly }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection
@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@push('script')

  <script>
      $('#datepicker').datepicker({
        'dateFormat':'yy-mm'
      });

      $('#datepicker1').datepicker({
        'dateFormat':'yy-mm'
      });
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
@endpush
@endpush