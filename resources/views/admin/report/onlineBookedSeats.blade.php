@extends('layouts.admin')
@section('title','Online Booked Seat Report')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<section class="content-header">
	<h1>Booked Seat<small>report</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Report</a></li>
		<li><a href="">Vehicle</a></li>
	</ol>
</section>
<div class="content">
	@if(Session::has('message'))
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
    	</button>
    	{!! Session::get('message') !!}
	</div>
	@endif
	
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			    <div class="box-body">
			        <div class="row">
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label class="font_13 m_b0">Travel Date</label>
			                    <input type="text" name="date" id="SelectDate" class="bod-picker form-control  border_radius0" autocomplete="off" value="">
			                </div>
			                <div class="form-group">
			                    <input type="submit" name="submit" class="btn btn-success datesubmit">
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label class="font_13 m_b0">By Bus</label>
			                    <select class="form-control busData name="bus">
			                        @foreach($buses as $bus)
			                        <option value="{{$bus->id}}">{{$bus->bus_name}}</option>
			                        @endforeach
			                    </select>
			                    
			                </div>
			                <div class="form-group">
			                    <input type="submit" name="submit" class="btn btn-success searchbyBus">
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="box">
				<a href="{{route('counterBookedSeats')}}" class="btn btn-success">Counter</a>
				<a href="{{route('onlineBookedSeats')}}" class="btn btn-info">Online</a>
				<div class="box-header">
					<h3 class="box-title">Data Table</h3>
				</div>
				<div class="box-body appendData">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>S.N.</th>
								<th>Booked By</th>
								<th>Bus</th>
								<th>From</th>
								<th>To</th>
								<th>Price</th>
								<th>Date</th>
								<th>Shift</th>
								<th>Booked On</th>
								
                                <!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
							@php($i=1)
							@foreach($bookingReports as $report)
							<tr>
								<td>{{$i}}</td>
								<td>
									{{$report->name}}<br>
									({{$report->phone}})
								</td>
								<td>{{$report->bus->bus_name}}({{$report->bus->bus_number}})</td>
								<td>{{$report->from}}</td>
								<td>@if($report->sub_destination)
									{{$report->sub_destination}}
									@else
									{{$report->to}}
									@endif
								</td>
								<td>{{$report->price}}</td>
								<td>{{$report->date}}</td>
								<td>{{$report->shift}}</td>
								<td>{{$report->booked_on}}</td>

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
@endsection
@push('script')
  <!-- DataTables -->
  <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>
  <script >
  	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
       $('.delete').submit(function(e){
        e.preventDefault();
        var message=confirm('Are you sure to delete');
        if(message){
          this.submit();
        }
        return;
       });
    });
  </script>
  <script>
  $(".bod-picker").nepaliDatePicker({
      dateFormat: "%y-%m-%d",
      closeOnDateSelect: true,
      // minDate: formatedNepaliDate
  });
  $(function () {
    $("#example1").DataTable({
    	"pageLength": 100
    });
  });

  $('.datesubmit').click(function(){
      if($('.bod-picker').val()==''){
          return;
      }else{
          date=$('.bod-picker').val();
          counter=0;
          online=1
          $.ajax({
              method:"post",
              url:"{{route('searchPassengerByDate')}}",
              data:{date:date,counter:counter,online:online},
              success:function(data){
                  if(data.message){
                      $('#example1_wrapper').remove();
                      $('.appendData').append(data.html);
                      $("#example1").DataTable({
                          "pageLength": 100
                      });
                  }
              }
          });
      }
      
  });
  $('.searchbyBus').on('click',function(){

      busId=$('.busData').val();
      counter=1;
      $.ajax({
          method:"post",
          url:"{{route('searchPassengerByBus')}}",
          data:{bus_id:busId,counter:counter},
          success:function(data){
              if(data.message){
                  $('#example1_wrapper').remove();
                  $('.appendData').append(data.html);
                  $("#example1").DataTable({
                      "pageLength": 100
                  });
              }
          }
      });
  });

</script>
@endpush
