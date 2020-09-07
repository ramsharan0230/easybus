@extends('layouts.admin')
@section('title','Vendor Create')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add Vendor<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">User Management</a></li>
                    <li class="active">All Admin</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
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
                                <h3 class="box-title">Add Vendor</h3>
                            </div>
                            <div class="box-body ">
                                <div class=" new_registration">
                                    <h2 class="p_b40">Register as Vendor</h2>
                                        
                                    @if(Session::has('message'))
                                    <div class="alert alert-success alert-dismissible message">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {!! Session::get('message') !!}
                                    </div>
                                    @endif
                                    @if (count($errors) > 0)
                                     <div class="alert alert-danger alert-dismissible ">
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
                                    <div class="row">
                                        <form action="{{route('vendor.store')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                        <div class="col-sm-12 text-center m_b25">
                                            <nav class="register_account">
                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active nav-item nav-link first_button">
                                                            <a href="#first_step" data-toggle="tab">Step 1</a>
                                                        </li>
                                                        <li class="nav-item nav-link second_button">
                                                            <a href="#second_step" data-toggle="tab">Step 2</a>
                                                        </li>
                                                        <li class="nav-item nav-link third_button">
                                                            <a href="#third_step" data-toggle="tab">Step 3</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="active tab-pane" id="first_step">
                                                            <div class="row form-group">
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Full Name* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="name" class="form-control  border_radius0" placeholder="Full Name" value="{{old('name')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Passport size image* (250*250) :</label>

                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="file" name="passport_image" class="form-control  border_radius0" placeholder="Company Reg. No" >
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Email* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15"> 
                                                                    <input type="text" name="email" class="form-control  border_radius0" placeholder="Email Address" value="{{old('email')}}">    
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Password* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="password" name="password" class="form-control  border_radius0" placeholder="password">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Re-password* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="password" name="password_confirmation" class="form-control  border_radius0" placeholder="">
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                                                    <button type="button" class="btn btn_nextone">NEXT</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="second_step">
                                                            <div class="row form-group">
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Name* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="company_name" class="form-control  border_radius0" placeholder="Company Name" value="{{old('company_name')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Address* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="address" class="form-control  border_radius0" placeholder="Company Addresss" value="{{old('address')}}">     
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Phone* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="company_phone" class="form-control  border_radius0" placeholder="Company Phone" value="{{old('company_phone')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Company Reg. no.* :</label>

                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="company_reg_no" class="form-control  border_radius0" placeholder="Company Reg. No" value="{{old('company_reg_no')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Upload Reg. Document* :</label>

                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="file" name="company_image" class="form-control  border_radius0" placeholder="Company Reg. No" >
                                                                </div>

                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">  (PAN) Reg. no.*  :</label>

                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="pan" class="form-control  border_radius0" placeholder="PAN No." value="{{old('pan')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Upload(PAN)* :</label>

                                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                                    <input type="file" name="pan_image" class="form-control  border_radius0" placeholder="Company Reg. No">
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 p_tb20 text-right">
                                                                    <button type="button" class="btn btn_prevone">PREV</button>
                                                                    <button type="button" class="btn btn_nexttwo">NEXT</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="third_step">
                                                            <div class="row form-group">
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Father's Name :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="father_name" class="form-control  border_radius0" placeholder="Fathers Name" value="{{old('father_name')}}">
                                                                </div>


                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Mother's Name :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="mother_name" class="form-control  border_radius0" placeholder="Mothers Name" value="{{old('mother_name')}}">
                                                                </div>

                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Phone No* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="phone" class="form-control  border_radius0" placeholder="Phone No" value="{{old('phone')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Citizenship No* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="text" name="citizen_no" class="form-control  border_radius0" placeholder="Citizenship No" value="{{old('citizen_no')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Front copy of Citizenship* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="file" name="citizen_front"  class="form-control  border_radius0" placeholder="Citizenship front copy" value="{{old('citizen_front')}}">
                                                                </div>
                                                                <label class="font_13 m_b0 col-lg-4 col-md-4 col-sm-4">Back copy of Citizenship* :</label>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 m_b15">
                                                                    <input type="file" name="citizen_back"  class="form-control  border_radius0" placeholder="Citizenship front copy" value="{{old('citizen_back')}}">   
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 p_tb20 text-right">
                                                                    <button type="button" class="btn btn_prevtwo">PREV</button>
                                                                    <button type="submit" class="btn btn-success border_radius0 text-uppercase"><i class="fa fa-paper-plane"></i> register</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>       
                                            </nav>
                                        </div>
                                        </form>
                                    </div>
                                </div>
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
          required: true,
          minlength: 7
        },
         password_confirmation: {
            required: true,
            minlength: 7,
            equalTo: "#password"
        }
       
      },
    });
  });
  $('.message').delay(5000).fadeOut(400);
</script>
<script>
    $(document).ready(function(){
        $('.btn_nextone, .second_button').click(function(e){
            e.preventDefault();
            $('#first_step, #third_step, .first_button, .third_button').removeClass('active').removeClass('show');
            $('#second_step, .second_button').addClass('active').addClass('show');
            // $('#nav-home-tab').removeClass('active');
            // $('#nav-profile-tab').addClass('active');
        })
        $('.btn_prevone, .first_button').click(function(e){
            e.preventDefault();
            $('#first_step, .first_button').addClass('active').addClass('show');
            $('#second_step, #third_step, .second_button, .third_button').removeClass('active').removeClass('show');
            // $('#nav-home-tab').addClass('active');
            // $('#nav-profile-tab').removeClass('active');
        })
        $('.btn_nexttwo, .third_button').click(function(e){
            e.preventDefault();
            $('#third_step, .third_button').addClass('active').addClass('show');
            $('#first_step, #second_step, .first_button, .second_button').removeClass('active').removeClass('show');
            // $('#nav-personal-detail').addClass('active');
            // $('#nav-profile-tab').removeClass('active');
             
        })
        $('.btn_prevtwo, .second_button').click(function(){
            $('#first_step, #third_step, .third_button, .first_button').removeClass('active').removeClass('show');
            $('#second_step, .second_button').addClass('active').addClass('show');
            // $('#nav-personal-detail').removeClass('active');
            // $('#nav-profile-tab').addClass('active');
        })
    })
</script>
@endpush