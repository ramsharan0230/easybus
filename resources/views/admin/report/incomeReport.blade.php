@extends('layouts.admin')
@section('title','Income Report')

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
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header">
                                <div class="box-title"> Income In This Week</div>
                                <div class="box-title pull-right"> 
                                    <form action="{{route('income-reports.weekly-income-reports')}}" method="GET">
                                        {{csrf_field()}}
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <input type="text" id="nepaliDate1" class="bod-picker form-control" name="from" autocomplete="off" placeholder="from date(yyyy-mm-dd)">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <input type="text" id="nepaliDate2" class="bod-picker form-control" name="to" autocomplete="off" placeholder="to date(yyyy-mm-dd)">
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <button class="form-control btn btn-success" name="submit" value="">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="box-body">
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
                                    @foreach($weeklyTickets as $key=>$weeklyTicket)
                                    <tr>
                                        <?php //dd($weeklyTicket) ?>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $weeklyTicket->bus->bus_name }}</td>
                                        <td>{{ $weeklyTicket->bus->bus_number }}</td>
                                        <td>{{ $weeklyTicket->seat_id }}</td>
                                        <td>{{ $weeklyTicket->name.'/'.$weeklyTicket->phone }}</td>
                                        <td>{{ $weeklyTicket->booked_on }}</td>
                                        <td>{{ $weeklyTicket->from }}</td>
                                        <td>{{ $weeklyTicket->to }}</td>
                                        <td>{{ 'Rs'.'. '.$weeklyTicket->price }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8"><strong>Total</strong></td>
                                            <td><strong>{{ 'Rs'.'. '.$sumWeekly }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>  
                        </div>
                        <!-- /.box -->

                        <div class="box">
                            <div class="box-header">
                                <div class="box-title"> Income Monthly Report</div>
                            </div>
                            <div class="box-body">
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
                                        <td>{{ $monthlyTicket->name.'/'.$weeklyTicket->phone }}</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
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
@endpush