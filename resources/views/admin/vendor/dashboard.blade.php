@extends('layouts.admin')
@section('title','Bus List')

@section('content')
<section class="content-header">
	<h1>Bus<small>List</small></h1>
	<a href="{{route('bus.create')}}" class="btn btn-success">Add Bus</a>
	<ol class="breadcrumb">
		<li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li><a href="">Bus</a></li>
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
								<th>Bus No</th>
								<th>Bus Name</th>
								<th>Date</th>
								<th>Status</th>
								<th>Driver</th>
								<th>Booking Status</th>
								<th>Action</th>
								<!-- <th>Ticket History</th> -->
                                <!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($routines as $routine)

                        <?php
                        $detail = $routine->bus;
                        if($detail->busBooking){
                            $booked=count($detail->busBooking()->where('date',$routine->date)->get());
                        }else{
                            $booked=0;
                        }
                        if($detail->busseat){
                            $available=count($detail->busseat)-$booked;
                        }else{
                            $available=0;
                        }
                        
                        ?>
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
				            <td>{{$routine->date}}</td>
				            <td>{{$detail->status}}</td>
				            <td>{{@$detail->driver->name}}</td>
				            <td>
				            	Booked:{{$booked}}<br>
				            	Available:{{$available}}
				            </td>
				            <td>
				            	<ul class="display_inline">
				            		<!-- <li>
					            		<a class="btn vendor-busses edit" href="{{route('bus.edit',$detail->id)}}" title="Edit">Edit</a>
				            		</li> -->
				            		<li>
					            		<a class="btn vendor-busses edit" href="{{route('bookingDetailByDate',$routine->id)}}" title="Edit">Booking Detail</a>
				            		</li>
				            		<!-- <li>
					            		<a class="btn vendor-busses edit" href="{{route('busRoutine',$detail->id)}}" title="Edit">Bus Routine</a>
				            		</li> -->
				            		<li>
						            	@if($detail->status=='rejected' || $detail->status=='new')
						            	
						            	<form method= "post" action="{{route('bus.destroy',$detail->id)}}" class="delete">
		                				{{csrf_field()}}
		                				<input type="hidden" name="_method" value="DELETE">
		               					<button type="submit" class="btn  vendor-busses" style="display:inline">Delete</button>
		               				    </form>
		               				    @endif
				            			
				            		</li>

               				    </ul>
               				   
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
