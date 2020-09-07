@extends('layouts.admin')
@section('title','search bus')
@section('content')

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Bus<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Counter</a></li>
                    <!-- <li><a href="#">Assestant</a></li> -->
                    <li class="active">Search My Bus</li>
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

                <div class="equal_height">
                    
                        <div class="box box-primary">
                            <div class="box-body">
                               <form action="{{route('searchBusByNumber')}}" method="post">
                                {{csrf_field()}}
                                    <h3 class="profile-username">Search Bus By Number</h3>
                                    <div class="form-group bus-search-wrapper">
                                            <div class="form-group bus-search-form">
                                                <!--  <label>Bus Number</label> -->
                                                <input type="text" name="number" class="form-control" placeholder="Bus Number">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-success"> <span class="fa fa-search"></span> Search</button>
                              
                                        </div>
        

                                        
                                        
                                        
                                        
                                        
                                   
                                        
                                        
                                    </div>
                               </form>
                            </div>
                        </div>
            
                    <!-- <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="box box-primary">
                            <div class="box-body">
                               <form action="">
                                    <h3 class="profile-username">Search by Date</h3>
                                    <div class="input-group">
                                        
                                        <input type="date" name="search_bus" id="search_bus" class="form-control" placeholder="Vendor Name">
                                        <div class="input-group-addon">
                                             <button type="submit" class="btn btn-success"> <span class="fa fa-search"></span> Search</button>
                                        </div>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div> -->

                  
                </div>
            </section>
            <!-- /.content -->
        
       

        

@endsection