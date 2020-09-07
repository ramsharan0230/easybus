@extends('layouts.admin')
@section('title','Update Info')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Counter<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <!-- <li><a href="#">Assestant</a></li> -->
                    <li class="active">Update  Infomration</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <!-- <div class="row equal_height">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a href="#" class="btn btn-success">All Vendor</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row equal_height">
                    
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                        <h3 class="box-title">Update Information</h3>

                        <!-- <div class="box-tools pull-right">
                            <a href="vendor-list.php" class="btn btn-success">All Assestant</a>
                        </div> -->
                    </div>
                            <div class="box-body ">
                               
                                @php
                                    $info=Auth::user();
                                @endphp
                                <form action="{{route('updateCounterInfo',$info->id)}}" class="form form-horizontal form-responsive" method="post" id="form" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    
                                    <div class="row equal_height form-group">
                                        <div class="col-md-12">
                                            <div class="row equal_height">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <h3 class="header">Company Information</h3>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">  
                                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" value="{{$info->company_name}}">
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-street-view"></i>
                                                        </div>
                                                        <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{$info->address}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Email
                                                        </div>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="{{$info->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            COMPANY PHONE
                                                        </div>
                                                        <input type="text" name="company_phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$info->company_phone}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            PAN
                                                        </div>
                                                        <input type="text" name="pan" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$info->pan}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            PAN
                                                        </div>
                                                        <input type="file" name="pan_image" id="image" class="form-control" placeholder="Profile Image" value="">
                                                        
                                                    </div>
                                                    @if($info->pan_image)
                                                    <div class="form-group">
                                                        <div class="row">   
                                                            <div class="col-lg-3">
                                                               <br>
                                                               <img src="{{ asset('document/'.$info->pan_image) }}" width="100%" height="100%" class=" img img-responsive img-thumbnail" />
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Company Registration
                                                        </div>
                                                        <input type="file" name="company_image" id="image" class="form-control" placeholder="Profile Image">
                                                        
                                                    </div>
                                                    @if($info->company_image)
                                                    <div class="form-group">
                                                        <div class="row">   
                                                            <div class="col-lg-3">
                                                               <br>
                                                               <img src="{{ asset('document/'.$info->company_image) }}" width="100%" height="100%" class=" img img-responsive img-thumbnail" />
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
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

@endpush