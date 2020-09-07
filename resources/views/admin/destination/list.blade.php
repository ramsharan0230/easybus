@extends('layouts.admin')
@section('title','Destination List')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Destinations<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Destinations Management</a></li>
                    <li class="active">All Destinations</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <div class="box-header">
                                <a href="{{route('destination.create')}}" class="btn btn-success">Add New Destination</a>
                            </div>
                            <div class="box-body vendor-box">
                                <table id="example1" class="table vendor-table responsive table-hover dt-responsive nowrap bulk_action" >
                                    
                                    <thead class="vendor-head">
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th> 
                                            
                                             
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        @php($i=1)
                                        @foreach($details as $detail)
                                        <tr>
                                            <td>{{$i}}.</td>
                                            <td>{{$detail->name}}</td>
                                            
                                            <td>
                                                <a href="{{route('destination.edit',$detail->id)}}" class="btn vendor-busses"> <span class="fa fa-edit"></span> edit</a>
                                                <div class="btn vendor-busses">
                                                    <form method= "post" action="{{route('destination.destroy',$detail->id)}}" class="delete">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-delete" style="display:inline">Delete</button>
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
<script type="text/javascript">
    $(document).ready(function(){
       $('.delete').submit(function(e){
        e.preventDefault();
        var message=confirm('Are you sure to delete');
        if(message){
          this.submit();
        }
        return;
       });
       $("#example1").DataTable({
           "pageLength": 100
       });
    });
  </script>
</script>
@endpush