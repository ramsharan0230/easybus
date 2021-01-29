@extends('layouts.admin')
@section('title','Approved Bus List')

@section('content')
<section class="content-header">
	<h1>Approved Bus<small>List</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Approved Bus</a></li>
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
					<h3 class="box-title">Data Table(total number of buses = {{count($details)}})</h3>
				</div>
				<div class="box-body vendor-box">
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-8">
							<form class="form-inline" method="GET" action="{{ route('approved-buses') }}">
								<div class="form-group mb-2">
									<label for="staticEmail2" class="sr-only">Email</label>
									<select name="bus-type" id="bus-type" class="form-control">
										<option value="">Select Bus Type</option>
										@forelse ($busCategories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>	
										@empty
											<option value="">No Bus Category Found!</option>
										@endforelse
										<option value=""></option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary btn-sm">Filter</button>
							</form>
						</div>
					</div>

					<table id="example1" class="table vendor-table table-striped">
						<thead class="vendor-head">
							<tr>
								<th>S.N.</th>
								<th>Bus No</th>
								<th>Bus Name</th>
								<th>Bus Layout</th>
								<th>Bus Category</th>
								<th>Status</th>
                                <!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($details as $detail)
                        <tr>
                        	<td>{{$i}}</td>
				            <td>{{$detail->bus_number}}</td>
				            <!-- <td>@if($detail->image)
								<img src="{{asset('images/listing/'.$detail->image)}}">
								@else
								<p>N/A</p>
								@endif
				            </td> -->

				            <td>{{$detail->bus_name}}</td>
				            <!-- <td>{{$detail->publish==1? 'active':'inactive'}}</td> -->
				            <td>
				            	<a class="btn vendor-busses edit" href="{{route('bus-seat-layout', $detail->id)}}" title="Edit">Bus Layout</a>
							</td>
							<td>{{ $detail->busCategory->name }}</td>
				            <td>
				            	<a class="btn vendor-busses edit" href="{{route('suspendBus',$detail->id)}}" title="Suspend">Suspend</a>
				            	<a class="btn vendor-busses edit" href="{{route('busAdvertisemet',$detail->id)}}" title="Advertise">Advertisement</a>
								<a class="btn vendor-busses edit" href="{{route('bus.ticketHistory',$detail->id)}}" title="Ticket History">Ticket History</a>
								<a class="btn vendor-busses edit" href="{{route('bus.bookings',$detail->id)}}" title="Bookings">Bookings</a>
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
    $("#example1").DataTable({
    	"pageLength":50
    });
  });

</script>
@endpush
