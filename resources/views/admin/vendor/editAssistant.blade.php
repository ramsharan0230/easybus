@extends('layouts.admin')
@section('title','Edit Assistant')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Edit Assestant<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Vendor</a></li>
                    <li><a href="#">Assistant</a></li>
                    <li class="active">Edit Assistant</li>
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
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                        <h3 class="box-title">Edit Assistant</h3>

                        <div class="box-tools pull-right">
                            <a href="{{route('allAssistant')}}" class="btn btn-success">All Assestant</a>
                        </div>
                    </div>

                            <div class="box-body ">
                                <form action="{{route('updateAssistant',$data->id)}}" class="form form-horizontal form-responsive" method="post" enctype="multipart/form-data">
                                	{{csrf_field()}}
                                    <div class="row equal_height form-group">
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">  
                                            <input type="text" name="name" id="full_name" class="form-control" placeholder="Assestant Full Name" value="{{$data->name}}">
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" name="phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No" value="{{$data->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-street-view"></i>
                                                </div>
                                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{$data->address}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Email
                                                </div>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="{{$data->email}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Category
                                                </div>
                                                <select name="category" class="form-control">
                                                    <option value="driver" {{$data->category=='driver'?'selected':''}}>Driver</option>
                                                    <option value="conductor" {{$data->category=='conductor'?'selected':''}}>Conductor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Passport Size Photo
                                                </div>
                                                <input type="file" name="passport_image" id="image" class="form-control" placeholder="Profile Image">
                                               
                                            </div>
                                             @if($data->passport_image)
                                               <div class="form-group">
                                                  <strong>Thumbnail Image</strong>
                                                  <br>
                                                  <img src="{{ asset('images/document/'.$data->passport_image) }}" />
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
                                            @if($data->citizen_front)
                                               <div class="form-group">
                                                  <strong>Thumbnail Image</strong>
                                                  <br>
                                                  <img src="{{ asset('images/document/'.$data->citizen_front) }}" />
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
                                            @if($data->citizen_back)
                                               <div class="form-group">
                                                  <strong>Thumbnail Image</strong>
                                                  <br>
                                                  <img src="{{ asset('images/document/'.$data->citizen_back) }}" />
                                               </div>
                                               @endif
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Front copy of Driving License
                                                </div>
                                                <input type="file" name="driving_front" id="image" class="form-control" placeholder="Driving License Front Image">
                                            </div>
                                            @if($data->driving_front)
                                               <div class="form-group">
                                                  <strong>Thumbnail Image</strong>
                                                  <br>
                                                  <img src="{{ asset('images/document/'.$data->driving_front) }}" />
                                               </div>
                                               @endif
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Back copy of Driving License
                                                </div>
                                                <input type="file" name="driving_back" id="image" class="form-control" placeholder="Driving License Front Image">
                                            </div>
                                            @if($data->driving_back)
                                               <div class="form-group">
                                                  <strong>Thumbnail Image</strong>
                                                  <br>
                                                  <img src="{{ asset('images/document/'.$data->driving_back) }}" />
                                               </div>
                                               @endif
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
                                                <input type="password" class="form-control" id="re_password" name="password_confirmation" placeholder="Password">
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