@extends('layouts.admin')
@section('title','Category Bus Report')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
<section class="content-header">
	<h1>{{$category->name}} bus list<small>report</small></h1>

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
				<a href="{{route('categoryReport')}}" class="btn btn-success">Category</a>
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
								
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($buses as $detail)
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
				            <!-- <td>{{$detail->publish==1? 'active':'inactive'}}</td> -->
				            <td>
				            	<a class="btn btn-warning edit" href="{{route('busDetail',$detail->id)}}" title="Edit">Bus Layout</a>
				            	
				            	
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
