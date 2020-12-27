@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add Assestant<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Vendor</a></li>
                    <li><a href="#">Assestant</a></li>
                    <li class="active">Add Assestant</li>
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
                            <div class="box-header with-border">
                        <h3 class="box-title">Add Assistant</h3>

                        <div class="box-tools pull-right">
                            <a href="vendor-list.php" class="btn btn-success">All Assestant</a>
                        </div>
                    </div>

                            <div class="box-body ">
                                <form action="{{route('saveAssistant')}}" class="form form-horizontal form-responsive" method="post" enctype="multipart/form-data">
                                	{{csrf_field()}}
                                    <div class="row equal_height all-table-manage form-group">
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">  
                                            <input type="text" name="name" id="full_name" class="form-control" placeholder="Assestant Full Name">
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <!-- <i class="fa fa-phone"></i> -->
                                                    Phone
                                                </div>
                                                <input type="text" name="phone" id="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask='"mask": "(999) 999-9999"'  placeholder="Contact No">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <!-- <i class="fa fa-street-view"></i> -->
                                                    Address

                                                </div>
                                                <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Email
                                                </div>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Category
                                                </div>
                                                <select name="category" class="form-control">
                                                    <option value="driver">Driver</option>
                                                    <option value="conductor">Conductor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Passport Size Photo(250*250)
                                                </div>
                                                <input type="file" name="passport_image" id="image" class="form-control" placeholder="Profile Image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Front copy of Citizenship
                                                </div>
                                                <input type="file" name="citizen_front" id="image" class="form-control" placeholder="Citizenship Front Image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Back copy of Citizenship
                                                </div>
                                                <input type="file" name="citizen_back" id="image" class="form-control" placeholder="Citizenship Back Image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Front copy of Driving License
                                                </div>
                                                <input type="file" name="driving_front" id="image" class="form-control" placeholder="Driving License Front Image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Back copy of Driving License
                                                </div>
                                                <input type="file" name="driving_back" id="image" class="form-control" placeholder="Driving License Front Image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <!-- <i class="fa fa-key"></i> -->
                                                    Password
                                                </div>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 m_b20">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <!-- <i class="fa fa-key"></i> -->
                                                    Re-type Password
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