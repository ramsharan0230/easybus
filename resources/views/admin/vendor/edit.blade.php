@extends('layouts.admin')
@section('title','Vendor Edit')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Edit Vendor<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">User Management</a></li>
                    <li class="active">All Admin</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
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
                <div class="row equal_height">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header">
                                <a href="{{route('vendor.index')}}" class="btn btn-success">All Vendor</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row equal_height">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                        <h3 class="box-title">Edit Vendor</h3>

                        <div class="box-tools pull-right">
                            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fa fa-minus"></i></button> -->
                           
                        </div>
                    </div>
                            <div class="box-body ">
                                <form action="{{route('vendor.update',$detail->id)}}" class="form form-horizontal form-responsive" method="post" enctype="multipart/form-data" id="form">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row equal_height form-group">
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">  
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Vendor Full Name" value="{{$detail->name}}">
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$detail->phone}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-at"></i>
                                                </div>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="{{$detail->email}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="box-tools pull-right">
                                                <div class="input-group">
                                                    <button type="reset" class="btn btn-info"> <span class="fa fa-trash"></span> Cancel</button>

                                                    <button type="submit" class="btn btn-success"> <span class="fa fa-send"></span> submit</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
            </section>
            <!-- /.content -->
        
       

        
@endsection
@push('script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script >
  $(document).ready(function(){
    $('#form').validate({
      rules:{
        name:{
            required:true,
        },
        phone:{
            required:true,
        },
        email:{
          required:true ,
          email:true,
        },
        password: {
          
          minlength: 7
        },
         password_confirmation: {
            
            minlength: 7,
            equalTo: "#password"
        }
       
      },
    });
  });
  $('.message').delay(5000).fadeOut(400);
</script>
@endpush