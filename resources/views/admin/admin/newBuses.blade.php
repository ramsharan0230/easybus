@extends('layouts.admin')
@section('title','New Bus List')

@section('content')
<section class="content-header">
	<h1>New Bus<small>List</small></h1>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Mew Bus</a></li>
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
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>S.N.</th>
								<th>Bus No</th>
								<th>Bus Name</th>
								<th>Status</th>
								<th>Bus Layout</th>
								<th>Status</th>
                                <!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($details as $detail)
                        <tr>
                        	<td>{{$i++}}</td>
				            <td>{{$detail->bus_number}}</td>
				            <!-- <td>@if($detail->image)
								<img src="{{asset('images/listing/'.$detail->image)}}">
								@else
								<p>N/A</p>
								@endif
				            </td> -->

				            <td>{{$detail->bus_name}}</td>
				            <td>{{$detail->status}}</td>
				            <td><a class="btn btn-warning edit" href="{{route('busDetail',$detail->id)}}" title="Edit">Bus Layout</a></td>
				            <!-- <td>{{$detail->publish==1? 'active':'inactive'}}</td> -->
				            <td>
				            	<a class="btn btn-info edit" href="{{route('approveBus',$detail->id)}}" title="Edit">Approve</a>
				            	<a class="btn btn-danger edit" href="{{route('rejectBus',$detail->id)}}" title="Edit">Reject</a>
				            	
				            	
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
