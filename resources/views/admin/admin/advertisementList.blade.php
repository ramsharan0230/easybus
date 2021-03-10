@extends('layouts.admin')
@section('title','Advertisement List')
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Advertisement list<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li class="active">List</li>
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
                                            <th>Title</th> 
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    	@php($i=1)
                                    	@foreach($details as $detail)
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td> {{$detail->title}}</td>
                                            <td>
                                                @if($detail->image)
                                                <img src="{{asset('document/'.$detail->image)}}" width="100" height="100">
                                                @else
                                                N\A
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <a href="{{route('editAdvertisement', $detail->id)}}" class="btn btn-info">Edit</a>
                                                <div class="btn  btn-danger">
                                                    <form method="post" action="{{route('advertisement.delete')}}" class="delete">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                        <input type="hidden" value="{{ $detail->id }}" name="advertisement_id">
                                                        <button type="submit" class="btn-delete" style="display:inline"><span class="fa fa-trash"></span> Delete</button>
                                                    </form>
                                                </div>
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