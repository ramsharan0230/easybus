@extends('layouts.admin')
@section('title','Update Info')
@section('content')
<section class="content-header">
                <h1>Counter/Vendor<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter/Vendor</a></li>
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
                    
                    <div class="col-lg-6">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                        <h3 class="box-title">Update Information</h3>

                        <!-- <div class="box-tools pull-right">
                            <a href="vendor-list.php" class="btn btn-success">All Assestant</a>
                        </div> -->
                    </div>
                    			@php
                                    $info=Auth::user();
                                @endphp
                            <div class="box-body ">
                                <form action="{{route('updateVendorInfo',$info->id)}}" class="form form-horizontal form-responsive" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row equal_height form-group">
                                         

                                        <div class="col-md-12">
                                            <div class="row equal_height">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <h3 class="header">Owner Detail</h3>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">  
                                                    <input type="text" name="name" id="full_name" class="form-control" placeholder="Full Name" value="{{$info->name}}">
                                                </div>
                                                <div class="col-lg-6 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </div>
                                                        <input type="text" name="phone" id="mobile" class="form-control" placeholder="Mobile No" value="{{$info->phone}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-street-view"></i>
                                                        </div>
                                                        <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{$info->address}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Father's Name
                                                        </div>
                                                        <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father" value="{{$info->father_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Mother's Name
                                                        </div>
                                                        <input type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Mother" value="{{$info->mother_name}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Citizenship No
                                                        </div>
                                                        <input type="text" name="citizen_no" id="citizenship" class="form-control" placeholder="citizenship No" value="{{$info->citizen_no}}">
                                                    </div>
                                                </div>


                                                

                                                
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Passport Size Photo
                                                        </div>
                                                        <input type="file" name="passport_image" id="image" class="form-control" placeholder="Profile Image">
                                                    </div>
                                                    @if($info->passport_image)
                                                       <div class="form-group">
                                                          <strong>Thumbnail Image</strong>
                                                          <br>
                                                          <img src="{{ asset('document/'.$info->passport_image) }}" width="250" height="250"/>
                                                       </div>
                                                       @endif
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Front copy of Citizenship
                                                        </div>
                                                        <input type="file" name="citizen_front" id="image" class="form-control" placeholder="Citizenship Front Image">
                                                    </div>
                                                    @if($info->citizen_front)
                                                       <div class="form-group">
                                                          <strong>Thumbnail Image</strong>
                                                          <br>
                                                          <img src="{{ asset('document/'.$info->citizen_front) }}" width="250" height="250"/>
                                                       </div>
                                                       @endif
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            Back copy of Citizenship
                                                        </div>
                                                        <input type="file" name="citizen_back" id="image" class="form-control" placeholder="Citizenship Back Image">
                                                    </div>
                                                    @if($info->citizen_back)
                                                       <div class="form-group">
                                                          <strong>Thumbnail Image</strong>
                                                          <br>
                                                          <img src="{{ asset('document/'.$info->citizen_back) }}" width="250" height="250" />
                                                       </div>
                                                       @endif
                                                </div>
                                                 
                                                
                                                <!-- <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-key"></i>
                                                        </div>
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-key"></i>
                                                        </div>
                                                        <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Password">
                                                    </div>
                                                </div> -->
                                                
                                            </div>
                                        </div>




                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="box-tools pull-right">
                                                <div class="input-group">
                                                    <button type="reset" class="btn btn-info"> <span class="fa fa-trash"></span> Cancel</button>

                                                    <button type="submit" class="btn btn-success" > <span class="fa fa-send"></span> submit</button>
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