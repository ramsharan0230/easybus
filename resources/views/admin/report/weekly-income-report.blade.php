@extends('layouts.admin')
@section('title','Weekly Income Report')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@section('content')
  <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Income<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Reports</a></li>
                    <li class="active">Weekly Income</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <form action="{{ route('income-reports.weekly-income-reports') }}" method="GET">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="calender">Calender</label>
                                                    <input type="text" id="datepicker" class="form-control" autocomplete="off" name="date" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-primary btn-sm pull-left" style="margin-top:25px"> Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{ route('income-reports.weekly-income-reports.pdf') }}" method="GET">
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
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   $('#datepicker').datepicker({
        'dateFormat':'yy-mm-dd'
      });

      $('#datepicker1').datepicker({
        'dateFormat':'yy-mm-dd '
      });
   
</script>
@endpush
@endpush