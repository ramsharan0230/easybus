@extends('layouts.admin')
@section('title','Client List')

@section('content')
<section class="content-header">
	<h1>Client <small>List</small></h1>
	<a href="{{route('bus.create')}}" class="btn btn-success">Add Client</a>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Client</a></li>
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
								<th>Fullname</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Another Mobile</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @forelse($details as $key => $detail)
                        <tr>
                        	<td>{{$key +1}}</td>
				            <td>{{$detail->name}}</td>
				            <td>{{$detail->email}}</td>
				            <td>{{$detail->mobile_number}}</td>
				            <td>{{$detail->opt_mobile_number}}</td>
							<td>{{$detail->address}}</td>
				            <td>
				            	<ul class="display_inline">
				            		<li>
					            		<a class="btn vendor-busses" href="{{route('client.edit', $detail->id)}}" title="Edit">Edit</a>
				            		</li>
				            		<li>
					            		<form method= "post" action="{{route('client.delete',$detail->id)}}" class="delete">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn  btn-sm btn-danger" style="display:inline">Delete</button>
                                        </form>
									</li>
									
									<li>
										<a class="btn vendor-busses" href="{{route('client.show.booking', $detail->id)}}" title="Edit">View Bookings</a>
									</li>
               				    </ul>
				            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Client Found!!</td>
                        </tr>
                        @endforelse
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
