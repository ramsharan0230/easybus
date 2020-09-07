@extends('layouts.admin')
@section('content')
<style>
	
</style>
<section class="first_section">
	<div class="container p_tb10">
		<div class="row">
			<!-- <div class="col-lg-12 col-md-12 col-12">
				<div class="text-right">
					
				</div>
			</div> -->
			<div class="col-lg-4"></div>
			<div class="col-lg-4  col-md-12  m_t70">
					@if(Session::has('loginmessage'))
					<div class="alert alert-success alert-dismissible message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	{!! Session::get('loginmessage') !!}
					</div>
					@endif
					@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible message">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      		<span aria-hidden="true">&times;</span>
				    	</button>
				    	{!! Session::get('message') !!}
					</div>
					@endif
				<div class="height_manage box_shadow home_back">
							
						@if (count($errors) > 0)
						<div class="alert alert-danger message">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					      		<span aria-hidden="true">&times;</span>
					    	</button>
							<ul>
								@foreach($errors->all() as $error)
								<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
						@endif
					<form action="{{route('counterBusSearch')}}" method="get" class="form form-horizontal">
						{{csrf_field()}}
						<div class="row form-group">
							<div class="col-lg-6 col-md-6">
							<label class="font_13 m_b0">From</label>
								<select name="from" class="form-control">
									<option value="">From</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}">{{$destination->name}}</option>
									@endforeach
								</select>
								<!-- <input type="text" name="bus_from" class="form-control  border_radius0" placeholder="Enter City(Exg:Kathmandu)"> -->
							</div>
					 
							<div class="col-lg-6 col-md-6">
							<label class="font_13 m_b0" >To</label>
								<select name="to" class="form-control">
									<option value="">To</option>
									@foreach($destinations as $destination)
									<option value="{{$destination->name}}">{{$destination->name}}</option>
									@endforeach
								</select>
								<!-- <input type="text" name="bus_from" class="form-control  border_radius0" placeholder="Enter City(Exg:Kathmandu)"> -->
							</div>
							<div class="col-lg-12 col-md-12 text-center p_t30">
								<label class="font_18">Shift</label>
								<ul class="take_shift shit_searh">
									<li>
										<div class="input-group input-group-sm mb-3">
											<ul class="shit_searh">
												<li>
										  			<input type="radio" name="shift" value="Day" checked="checked">
												</li>
												<li>
											  		<div class="input-group-append">
											    		<span class="input-group-text font_17" id="inputGroup-sizing-sm" >Day</span>
											  		</div>
													
												</li>
											</ul>
										</div>
										 
									</li>
									<li>
										<div class="input-group input-group-sm mb-3">
											<ul class="shit_searh">
												<li>
										  			<input type="radio"  name="shift"   value="Night">
												</li>
												<li>
											  		<div class="input-group-append">
											    		<span class="input-group-text font_17" id="inputGroup-sizing-sm">Night</span>
											  		</div>
												</li>
											</ul>
										</div>
									</li>
									 
								</ul>
								  
							</div>
					 
							<div class="col-lg-6 col-md-6">
								<label class="font_13 m_b0">Travel Date</label>
								<input type="text" id="nepaliDate1" class="bod-picker form-control" name="date" autocomplete="off">
							</div>
							
							<div class="col-lg-6 col-md-6 m_t25">

								<button type="submit" class="btn btn-info search_button border_radius0">  search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 ">
				<div class="box_shadow height_manage">
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@push('script')
<script type="text/javascript">
	$(".bod-picker").nepaliDatePicker({
    dateFormat: "%y-%m-%d",
    closeOnDateSelect: true,
    // minDate: formatedNepaliDate
});
</script>
@endpush