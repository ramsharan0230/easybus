@extends('layouts.admin')
@section('title','Edit Category')

@section('content')
<section class="content-header">
    <h1>Category<small>edit</small></h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="">Category</a></li>
        <li><a href="">Edit</a></li>
    </ol>
</section>
<div class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
        {!! Session::get('message') !!}
    </div>
    @endif
    
    <div class="row">
        <div class="col-md-5">
            <form method="post" action="{{route('bus-type.update',$detail->id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="box box-primary">
                <div class="box-header with-heading">
                    <h3 class="box-title">Edit category</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="name" class="form-control" value="{{$detail->name}}">
                    </div>
                    <!-- <div class="form-group">
                        <label for="publish"><input type="checkbox" id="publish" name="publish" checked> Publish</label>
                    </div> -->
                    <div class="form-group">
                        <input type="submit" name="" class="btn btn-success">
                    </div>      
                </div>
            </form>   
      </div>
    </div>
    <div class="col-md-7">
        <div class="box box-warning">
            <div class="box-header with-heading">
                <h3 class="box-title">Categories</h3>
            </div>
            <div class="box-body vendor-box">
                <table id="example1" class="table vendor-table table-striped">
                    <thead class="vendor-head">
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($categories as $detail)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$detail->name}}</td>
                        
                        <!-- <td>{{$detail->publish==1? 'active':'inactive'}}</td> -->
                        <td>
                            
                            <a class="btn vendor-busses edit" href="{{route('bus-type.edit',$detail->id)}}" title="Edit">Edit</a>
                            <!-- <form method= "post" action="{{route('bus-type.destroy',$detail->id)}}" class="delete">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn  btn-danger btn-delete" style="display:inline">Delete</button>
                            </form> -->
                          
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

  
  <script>
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
    
    $(function () {
      $("#example1").DataTable();
    });
    </script>

@endpush