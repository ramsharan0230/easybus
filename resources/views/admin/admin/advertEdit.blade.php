@extends('layouts.admin')
@section('title','Edit Advertisement')
@section('content')
    <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add Routine<small>EASYBUS</small></h1>
                
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <!-- Default box -->
                        <div class="box">

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
                            <div class="box-body ">
                                <form action="{{route('updateAdvertisement',$detail->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <input type="hidden" name="bus_id" value="{{$detail->bus_id}}">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$detail->title}}">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($detail->image)
                                    <img src="{{asset('document/'.$detail->image)}}" width="100px" height="100px">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="submit" class="btn btn-success">
                                </div>
                            </form>
                            </div>  
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        
       

            
@endsection
@push('script')
<script src="//cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>

<script type="text/javascript">
    

    
    $(document).ready(function(){
        $(".bod-picker").val();
        $(".bod-picker").nepaliDatePicker({
            dateFormat: "%y-%m-%d",
            closeOnDateSelect: true,
            // minDate: formatedNepaliDate
        });
    });
</script>
@endpush