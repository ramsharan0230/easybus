@extends('layouts.admin')
@section('title','Booked Seat Report')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<section class="content-header">
	<h1>Booked Seat of bus {{$bus->bus_number}}<small>report</small></h1>
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

							@foreach($bus->busBooking as $report)
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

  $('.counter').on('click',function(e){
  	e.preventDefault();
  	counter=1;
  	online=0;
  	bus_id=$(this).data('bus_id');
  	$.ajax({
  		method:"post",
  		url:"{{route('individualBustickets')}}",
  		data:{bus_id:bus_id,counter:counter,online:online},
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
  $('.online').on('click',function(e){
  	e.preventDefault();
  	counter=0;
  	online=1;
  	bus_id=$(this).data('bus_id');
  	$.ajax({
  		method:"post",
  		url:"{{route('individualBustickets')}}",
  		data:{bus_id:bus_id,counter:counter,online:online},
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
