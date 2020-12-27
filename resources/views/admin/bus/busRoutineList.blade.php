@extends('layouts.admin')
@section('title','Bus Routine')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<section class="content-header">
	<h1>Bus Routine({{$bus->bus_name}})<small>List</small></h1>
	<a href="{{route('addRoutine',$bus->id)}}" class="btn btn-success">Add Routine</a>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Bus Routine</a></li>
		<li><a href="">list</a></li>
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
				<div class="box-body vendor-box">
					<table id="example1" class="table vendor-table table-striped">
						<thead class="vendor-head">
							<tr>
								<th>S.N.</th>
								<th>From</th>
								<th>To</th>
								<th>Date</th>
								<th>Shift</th>
								<th>Time</th>
								<th>Status</th>
                                <!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($busroutines as $detail)
                        <tr>
                        	<td>{{$i++}}</td>
				            <td>{{$detail->from}}</td>
				            
				            <td>{{$detail->to}}</td>
				            <td>{{$detail->date}}</td>
				            <td>{{$detail->shift}}</td>
				            <td>{{date("g:i a", strtotime($detail->time))}}</td>
				            <!-- <td>{{$detail->publish==1? 'active':'inactive'}}</td> -->
				            <td>
				            	<?php
				            		$bookings=$detail->bookings;

				            	?>
				            	@if(count($bookings)==0)
				            	<a class="btn vendor-busses btn-info edit" href="{{route('editBusRoutine',$detail->id)}}" title="Edit">Edit</a>
								@endif
								@if(count($bookings)==0)
				            	<a class="btn vendor-busses btn-danger" href="{{route('deleteRoutine',$detail->id)}}" title="Edit" onclick="return confirm('Are you sure?')">Delete</a>
				            	@endif
				            	<a class="btn vendor-busses btn-warning" href="{{route('smsView',$detail->id)}}" title="Edit" >SendSms</a>
				            	
               				   
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
  $(function () {
    $("#example1").DataTable();
  });

</script>
@endpush
