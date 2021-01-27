@extends('layouts.admin')
@section('title')
All Assistants of vendor {{$detail->name}}
@endsection
@section('content')
            <?php //dd($detail) ?>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Assistants of vendor {{$detail->name}}<small>EASYBUS</small></h1>
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
                                <table id="example1" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                    
                                        <tr>
                                            <th>SN</th>
                                            <th>Assistant Full Name</th> 
                                            <th><i class="fa fa-mobile"></i> Contact No.</th>
                                            <th><i class="fa fa-map-marker"></i> Address</th>
                                            <th><i class="fa fa-list"></i> Role</th>
                                            <th><i class="fa fa-list"></i> Citizenship</th>
                                            <!-- <th><i class="fa fa-bus"></i> Bus No.:</th> -->
                                            
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @if(isset($detail->assistants))
                                                @foreach($detail->assistants as $key=>$asdetail)
                                                <tr>
                                                     <?php //dd($asdetail) ?>
                                                    <td>{{$key +1}}.</td>
                                                    <td> {{$asdetail->name}}</td>
                                                    <td>{{$asdetail->phone}}</td>
                                                    <td>{{$asdetail->address}}</td>
                                                    <td>{{$asdetail->role}}</td>
                                                    <td>
                                                        <img src="{{ asset('citizen_front/').$asdetail->citizen_front }}" alt="" srcset=""> 
                                                        <img src="{{ asset('citizen_front/').$asdetail->citizen_back }}" alt="" srcset=""> 
                                                    </td>
                                                </tr>
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