    @extends('layouts.admin')
    @section('title','Vendor List')

    @section('content')
     <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>All Vendors<small>EASYBUS</small></h1>
                    <ol class="breadcrumb">
                        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">User Management</a></li>
                        <li class="active">All Vendors</li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
    					@if(Session::has('message'))
    					<div class="alert alert-success alert-dismissible message">
    						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				      		<span aria-hidden="true">&times;</span>
    				    	</button>
    				    	{!! Session::get('message') !!}
    					</div>
    					@endif
                    <div class="row equal_height">
                        <div class="col-lg-12">
                            <!-- Default box -->
                            <div class="box">
                                <div class="box-header">
                                    <a href="{{route('vendor.create')}}" class="btn btn-success">Add Vendor</a>

                                    <div class="box-tools pull-right">
                                       <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                        <i class="fa fa-minus"></i></button> -->
                                        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button> -->
                                    </div>
                                </div>
                                <div class="box-body vendor-box">
                                    <table id="example1" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                        
                                        <thead class="vendor-head">
                                            <tr>
                                                <th>SN</th>
                                                <th>Vendor Name</th>
                                                
                                                <th> Contact No.</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@php($i=1)
                                        	@foreach($details as $detail)
                                            <tr>

                                                <td>{{$i}}.</td>
                                                <td>{{$detail->name}}</td>
                                               
                                                <td>{{$detail->company_phone}}</td>
                                                <td>{{$detail->email}}</td>
                                                
                                                <td>
                                                    <a href="{{route('vendor.edit',$detail->id)}}" class="btn vendor-busses"> <span class="fa fa-edit"></span> Edit</a>
                                                    <form method= "post" action="{{route('vendor.destroy',$detail->id)}}" class="delete btn  vendor-busses">
                    								{{csrf_field()}}
                    								<input type="hidden" name="_method" value="DELETE">
                   									<button type="submit" class="btn-delete" style="display:inline">Delete</button>
                   				    				</form>
                                                    <a href="{{route('vendor.show',$detail->id)}}" class="btn vendor-busses">View</a>
                                                    <a href="{{route('vendorBusesReport',$detail->id)}}" class="btn vendor-busses">Buses</a>
                                                    <a href="{{route('counterOfVendor',$detail->id)}}" class="btn vendor-busses">Counters</a>
                                                    <a href="{{route('vendorsAssistant',$detail->id)}}" class="btn vendor-busses">Assistants</a>
                                                       
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
                </section>
                <!-- /.content -->
            
           

            

    @endsection
    @push('script')
    <script >
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
        $('.message').fadeOut(4000);
        $(function () {
        $("#example1").DataTable({
            "pageLength": 100
        });
      });
      </script>
    @endpush