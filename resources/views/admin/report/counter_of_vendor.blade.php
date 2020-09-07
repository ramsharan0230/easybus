@extends('layouts.admin')
@section('title','All Counter')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush
@section('content')
 <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Counters<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">User Management</a></li>
                    <li class="active">All Counters</li>
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
                                            <th>Counter Name</th>
                                            <th>Counter Assestant</th>
                                            <th><i class="fa fa-map-marker"></i> Location</th>
                                            <th><i class="fa fa-phone"></i> Telephone No.</th>
                                            <th><i class="fa fa-mobile"></i> Contact No.</th>
                                            <!-- <th><span class="fa fa-clipboard"></span> All Issued Tickets </th> -->
                                            <th> <i class="fa fa-at"></i> Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($counters as $detail)
                                        <tr>
                                            <td>{{$i}}.</td>

                                            <td>{{$detail->company_name}}</td>
                                            <td> {{$detail->name}}</td>
                                            <td>{{$detail->address}}</td>
                                            <td>{{$detail->company_phone}}</td>
                                            <td>{{$detail->phone}}</td>
                                            <!-- <td>
                                                <a href="counter-ticket.php" class="btn btn-success"> <span class="fa fa-clipboard"></span>  523</a>
                                            </td> -->
                                            <td>{{$detail->email}}</td>
                                            
                                            <td>
                                                <a href="{{route('counterDetail',$detail->id)}}" class="btn btn-info"> <span class="fa fa-eye"></span> view</a>
                                                <a href="{{route('counterTicketsIssued',$detail->id)}}" class="btn btn-warning"> <span class="fa fa-eye"></span> Ticket Issued</a>
                                                <!-- <div class="btn  btn-danger">
                                                    <form method= "post" action="" class="delete">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div> -->
                                            </td>
                                        </tr>
                                        @php($i++)
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
  <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>
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