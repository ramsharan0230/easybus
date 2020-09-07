@extends('layouts.admin')
@section('title','User Detail')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>{{$data->name}} Detail<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Detail</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <!-- <div class="row equal_height">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <a href="#" class="btn btn-success">All Assestant</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <!-- <h3 class="box-title">Add Vendor</h3> -->

                               <!--  <div class="box-tools pull-right">
                                    <a href="{{route('vendor.index')}}" class="btn btn-success">All Vendors</a>
                                </div> -->
                            </div>
                            <div class="box-body ">
                                
                                <!-- <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                        <div class="box-tools pull-right">
                                            <a href="add-vendor.php" class="btn btn-primary">Edit Vendor</a>
                                        </div>
                                    </div>
                                </div> -->


                                <div class="row equal_height">
                                    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 m_b20">
                                        <img src="{{asset('document/'.$data->passport_image)}}" alt="" class="vendor_image"><br>

                                        <label class="text-center  m_t20 font_25">{{$data->name}}</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="row equal_height form-group"> 
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" name="full_name" id="full_name" class="form-control" value="{{$data->name}}" readonly="">
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        FATHER
                                                    </div>
                                                    <input type="text" name="full_name" id="" class="form-control" placeholder="Vendor Father's Name" value="Vendor's Father">
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        MOTHER
                                                    </div>
                                                    <input type="text" name="full_name" id="" class="form-control" placeholder="Vendor Mother's Name" value="Vendor's Mother">
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Citizenship
                                                    </div>
                                                    <input type="text" name="full_name" id="" class="form-control" placeholder="Citizenship No" value="311037/5078" readonly="">
                                                </div>
                                            </div> -->
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone"></i>
                                                    </div>
                                                    <input type="text" name="company_phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->phone}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Pan No
                                                    </div>
                                                    <input type="text" name="company_phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->pan}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Company Reg No
                                                    </div>
                                                    <input type="text" name="company_phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->company_reg_no}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Company Phone
                                                    </div>
                                                    <input type="text" name="company_phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->company_phone}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Company Address
                                                    </div>
                                                    <input type="text" name="company_phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->address}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Father's name
                                                    </div>
                                                    <input type="text" name="father_name" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->father_name}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Mother's name
                                                    </div>
                                                    <input type="text" name="company_phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->mother_name}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        Citizenship No
                                                    </div>
                                                    <input type="text" name="citizen_no" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->citizen_no}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-at"></i>
                                                       </div>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="{{$data->email}}" readonly="">
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        License No.: 
                                                    </div>
                                                    <input type="text" name="pan_no" class="form-control" value="1214">
                                                </div>
                                            </div> -->
                                           <!--  <div class="col-lg-6 col-sm-6 m_b20">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="bus" name="bus" placeholder="Total Bus" value="Kaski Nepal">
                                                     
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m_b20">
                                                <label class="font_25">Pan Image</label>
                                                <a href="{{asset('document/'.$data->pan_image)}}" target="_blank">
                                                    <img src="{{asset('document/'.$data->pan_image)}}" alt="" class="citizenship">
                                                    
                                                </a>
                                            </div>
                                             
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m_b20">
                                                <label class="font_25">Company Registration Image</label>
                                                <a href="{{asset('document/'.$data->company_image)}}" target="_blank">
                                                    <img src="{{asset('document/'.$data->company_image)}}" alt="" class="citizenship">
                                                    
                                                </a>
                                            </div>
                                             @if($data->driving_front)
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m_b20">
                                                <label class="font_25">Lincese Front Copy</label>
                                                <a href="{{asset('images/document/'.$data->driving_front)}}" target="_blank">
                                                    <img src="{{asset('images/document/'.$data->driving_front)}}" alt="" class="citizenship">
                                                    
                                                </a>
                                            </div>
                                            @endif
                                            @if($data->driving_back)
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m_b20">
                                                <label class="font_25">Lincese Back Copy</label>
                                                <a href="{{asset('images/document/'.$data->driving_back)}}" target="_blank">
                                                    <img src="{{asset('images/document/'.$data->driving_back)}}" alt="" class="citizenship">
                                                    
                                                </a>
                                            </div>
                                            @endif
                                            @if($data->citizen_front)
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m_b20">
                                                <label class="font_25">Citizenship Front Copy</label>
                                                <a href="{{asset('document/'.$data->citizen_front)}}" target="_blank">
                                                    <img src="{{asset('document/'.$data->citizen_front)}}" alt="" class="citizenship">
                                                    
                                                </a>
                                            </div>
                                            @endif
                                            @if($data->citizen_back)
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m_b20">
                                                <label class="font_25">Citizenship Back Copy</label>
                                                <a href="{{asset('document/'.$data->citizen_back)}}" target="_blank">
                                                    <img src="{{asset('document/'.$data->citizen_back)}}" alt="" class="citizenship">
                                                    
                                                </a>
                                            </div>
                                            @endif

                                            
                                        </div>
                                    </div>

                                     
                                </div>
                                
                                
                                 
                            </div>
                        </div>   
                    </div>
                </div>
            </section>
            <!-- /.content -->
        
       

        
@endsection