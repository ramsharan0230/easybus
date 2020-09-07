@extends('layouts.admin')
@section('title')
All Assistants of vendor {{$details->name}}
@endsection
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Assistants of vendor {{$details->name}}<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">User Management</a></li>
                    <li class="active">All Assistants</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                           <!--  <div class="box-header">
                                <a href="#" class="btn btn-success">Add Counter</a>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                            </div> -->
                            <div class="box-body ">
                                <table id="example1" class="table table-bordered responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead>
                                    
                                        <tr>
                                            <th>SN</th>
                                            <th>Assistant Full Name</th> 
                                            <th><i class="fa fa-mobile"></i> Contact No.</th>
                                            <th><i class="fa fa-map-marker"></i> Address</th>
                                            <!-- <th><i class="fa fa-bus"></i> Bus No.:</th> -->
                                            
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @if(isset($details->assistants))
                                                @php($i=1)
                                                @foreach($details->assistants as $detail)
                                                <tr>
                                                    <td>{{$i}}.</td>
                                                    <td> {{$detail->name}}</td>
                                                    <td>{{$detail->phone}}</td>
                                                    <td>{{$detail->address}}</td>
                                                    
                                                     
                                                    
                                                  
                                                </tr>
                                                @php($i++)
                                                @endforeach
                                        @endif
                                    	
                                       
                                    </tbody>
                                </table> 
                            </div>  
                        </div>
                        <!-- /.box -->
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
    $(function () {
    $("#example1").DataTable({
        "pageLength": 100
    });
  });
  </script>
@endpush