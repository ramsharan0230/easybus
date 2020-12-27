@extends('layouts.admin')
@section('title','Pending Vendor')

@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Pending Vendors<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">User Management</a></li>
                    <li><a href="#">Vendor Management</a></li>
                    <li class="active">All Pending Vendors</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                <!-- <a href="vendor-list.php" class="btn btn-success">All Vendor</a> -->
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body vendor-box">
                                <table id="example1" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>SN</th>
                                            <th>Company Name</th>
                                            <th>Role</th>
                                            <th><i class="fa fa-phone"></i> Contact No.</th>
                                            <th> <i class="fa fa-at"></i> Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td>{{$user->company_name}}</td>
                                            <td>Vendor</td>
                                            <td>{{$user->company_phone}}</td>
                                            <td>{{$user->email}}</td>
                                            
                                            <td>
                                                <!-- <a href="vendor-detail.php" class="btn btn-info"> <span class="fa fa-eye"></span> View</a> -->
                                                 
                                                <div class="btn vendor-busses btn-success">
                                                   
                                                    <form method= "post" action="{{route('approveVendorRequest')}}" class="delete">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    
                                                        <button type="submit" class="btn-delete" style="display:inline" ><span class="fa fa-check"></span> Approve</button>
                                                    </form>

                                                   
                                                </div>
                                                <a href="{{route('vendor.show',$user->id)}}" class="btn vendor-busses">View</a>

                                                
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                       
                                       
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
       
    });
    $(function () {
    $("#example1").DataTable({
        "pageLength": 100
    });
  });
  </script>
@endpush