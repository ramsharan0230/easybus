@extends('layouts.admin')
@section('title','Vendor Booked Seat Report')
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
				<a href="" class="btn btn-success counter" data-vendor_id="{{$details->id}}">Counter</a>
				<a href="" class="btn btn-info online" data-vendor_id="{{$details->id}}">Online</a>
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
							@foreach($details->vendor_bookings as $report)
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

  $('.online').click(function(e){
  	e.preventDefault();
  	vendor_id=$(this).data('vendor_id');
  	online=1;
  	counter=0;
  	$.ajax({
  		method:"post",
  		url:"{{route('vendorOnlineTicket')}}",
  		data:{vendor_id:vendor_id,online:online,counter:counter},
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
  $('.counter').click(function(e){
  		e.preventDefault();
  		
  		vendor_id=$(this).data('vendor_id');
  		online=0;
  		counter=1;
  		$.ajax({
  			method:"post",
  			url:"{{route('vendorOnlineTicket')}}",
  			data:{vendor_id:vendor_id,online:online,counter:counter},
  			success:function(data){
  				console.log(data);
  				if(data.message){
  	            $('#example1_wrapper').remove();
  	            $('.appendData').append(data.html);
  	            $("#example1").DataTable({
  	                "pageLength": 100
  	            });
  	        }
  			}
  		});
  })
</script>
@endpush
