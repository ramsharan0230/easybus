<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/ionicons.min.css')}}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{asset('backend/assets/css/_all-skins.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
     
    <!-- Daterange picker -->
    
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{asset('js/nepali.datepicker.v2.2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/AdminLTE.min.css')}}">

    @stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>E</b>BUS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>EASY</b>BUS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                  
                    <!-- Notifications: style can be found in dropdown.less -->
                    
                    <!-- Tasks: style can be found in dropdown.less -->
                  

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           
                            <span class="hidden-xs">Easy Bus</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <!-- <img src="{{asset('backend/assets/images/user2-160x160.jpg')}}" class="img-circle" alt="User Image"> -->

                                <p>
                                Easy Bus
                                <!-- <small>Member since Nov. 2012</small> -->
                                </p>
                            </li>
                            <!-- Menu Body -->
                           
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                        <!-- Control Sidebar Toggle Button -->
                    <li>
                   <!--  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                </li>
            </ul>
            </div>
        </nav>
    </header>
    <?php 
        $role=Auth::user()->role;
    ?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('front/images/logo.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>EasyBus Admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
             
            <ul class="sidebar-menu" data-widget="tree">
                @if($role=='admin')
                <li class="header">ADMIN VIEW</li>
                

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Admin Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('user.create')}}"><i class="fa fa-plus"></i>Add Admin</a></li>
                        <li><a href="{{route('user.index')}}"><i class="fa fa-eye"></i>All Admin</a></li>  
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle"></i> <span>Vendor Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('vendor.create')}}"><i class="fa fa-plus"></i>Add Vendor</a></li>
                        <li><a href="{{route('vendor.index')}}"><i class="fa fa-eye"></i>All Vendor</a></li>
                        <li><a href="{{route('pendingVendor')}}"><i class="fa fa-eye"></i>Pending Vendor</a></li>
                        
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">

                        <i class="fa fa-circle-o"></i> <span>Counter Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('adminCounter')}}"><i class="fa fa-circle-o"></i> All Counter
                                <!-- <span class="pull-right-container">
                                    <span class="label label-primary pull-right">4</span>
                                </span> -->
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-male"></i> <span>Assistant Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- <li><a href="add-vendor.php"><i class="fa fa-plus"></i>Add Assestant</a></li> -->
                        <li><a href="{{route('adminAssistant')}}"><i class="fa fa-eye"></i>All Assistant</a></li>
                        
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Passenger Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- <li><a href="add-vendor.php"><i class="fa fa-plus"></i>Add Assestant</a></li> -->
                        <li><a href="{{route('allPassenger')}}"><i class="fa fa-list"></i>All Passenger</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Bus Category </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- <li><a href="add-vendor.php"><i class="fa fa-plus"></i>Add Assestant</a></li> -->
                        <li><a href="{{route('bus-type.create')}}"><i class="fa fa-list"></i>All Category</a></li>
                    </ul>
                </li>
                
                

                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i> <span>Reports</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Passenger Report</a></li> -->
                        <li>
                            <a href="{{route('passengerReport')}}"><i class="fa fa-users"></i> Passenger Report</a>
                        </li>
                        <li>
                            <a href="{{route('ticketReport')}}"><i class="fa fa-ticket"></i> Ticket Sale</a>
                        </li>
                        <li>
                            <a href="{{route('incomeReport')}}"><i class="fa fa-dollar"></i> Income Report</a>
                        </li>
                        <li>
                            <a href="{{route('vendorReport')}}"><i class="fa fa-user-circle"></i> Vendor Report</a>
                        </li>
                       <!--  <li class="treeview">
                            <a href="#"><i class="fa fa-bus"></i> Bus Report
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Daily Bus
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Weekly Bus
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Monthly Bus
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Custom Bus
                                    </a>
                                </li>
                            </ul>
                        </li>
                         
                        <li class="treeview">
                            <a href="#"><i class="fa fa-ticket"></i> Counter Report
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Daily Counter Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Weekly Counter Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Monthly Counter Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Custom Counter Report
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-dollar"></i> Income Report
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Daily Income Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Weekly Income Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Monthly Income Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Custom Income Report
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-map-marker"></i> Destination Report
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Daily Destination Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Weekly Destination Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Monthly Destination Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Custom Destination Report
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-user-circle"></i> Vendor Report
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Daily Vendor Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Weekly Vendor Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Monthly Vendor Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Custom Vendor Report
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                         
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-map-marker"></i> <span>Destination Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- <li><a href="add-vendor.php"><i class="fa fa-plus"></i>Add Assestant</a></li> -->
                        <li><a href="{{route('destination.index')}}"><i class="fa fa-list"></i>All Destinations</a></li>
                        <!-- <li>
                            <a href="vendor-list.php"><i class="fa fa-refresh"></i>Pending Vendor
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right">4</span>
                                </span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dollar"></i> <span>Payment Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="add-admin.php"><i class="fa fa-plus"></i>Pay direct to vendor</a></li>
                        <li><a href="admin-list.php"><i class="fa fa-eye"></i>Pay to counter on counter</a></li>  
                    </ul>
                </li>
                @endif
                @if($role=='vendor')
                <li class="header">VENDOR VIEW</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Update Info</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu"> 
                            <li>
                                <a href="{{route('editVendorInfo')}}"><i class="fa fa-user"></i> Update Info</a>
                            </li>
                            <!-- <li>
                                <a href="recover-password.php"><i class="fa fa-key"></i> Recover Password</a>
                            </li> -->
                            <li>
                                <a href="{{route('editPersonalInfo')}}"><i class="fa fa-key"></i> Edit Personal Detail</a>
                            </li>
                        </ul>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bus"></i> <span>Manage Bus</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('bus.create')}}"><i class="fa fa-plus"></i>Add Bus</a></li>
                        <li>
                            <a href="{{route('bus.index')}}"><i class="fa fa-eye"></i>Bus list
                                <!-- <span class="pull-right-container">
                                    <span class="label label-info pull-right">24</span>
                                </span> -->
                            </a>
                        </li>  
                          
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-map-marker"></i> <span> Manage Counter</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{route('allCounters')}}">
                                    <i class="fa fa-eye"></i>All Counters
                                    <!-- <span class="pull-right-container">
                                        <span class="label label-info pull-right">12</span>
                                    </span> -->
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-dollar"></i>Payment Status
                                </a>
                            </li>
                            
                            
                        </ul>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bus"></i> <span>Manage Bus Request</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="{{route('busRequest')}}"><i class="fa fa-eye"></i>Request Bus
                                <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span>
                            </a>
                        </li>  
                        <li>
                            <a href="{{route('rejectedBusList')}}"><i class="fa fa-eye"></i>Rejected Bus
                                <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span>
                            </a>
                        </li> 
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Manage Assistant</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="{{route('addAssistant')}}"><i class="fa fa-plus"></i>Add Assistant
                               <!--  <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span> -->
                            </a>
                        </li>  
                        <li>
                            <a href="{{route('allAssistant')}}"><i class="fa fa-eye"></i> Assistant List
                                <!-- <span class="pull-right-container">
                                    <span class="label label-info pull-right">18</span>
                                </span> -->
                            </a>
                        </li> 
                    </ul>
                </li>
                @endif
                @if($role=='counter')
                <li class="header">COUNTER VIEW</li>
                
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-edit"></i> <span> Update Information</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="{{route('editCounterInfo')}}"><i class="fa fa-edit"></i> Company Information
                               <!--  <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span> -->
                            </a>
                        </li> 
                       <!--  <li>
                            <a href="recover-password.php"><i class="fa fa-edit"></i> Recover Password
                            </a>
                        </li>  -->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-bus"></i> <span>Bus list</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="{{route('busList')}}"><i class="fa fa-list"></i> 
                                All Bus
                            </a>
                        </li> 
                        <li>
                            <a href="{{route('pendingbusList')}}"><i class="fa fa-list"></i> Pending Bus
                            </a>
                        </li>
                        <!-- <li>
                            <a href="search-bus.php"><i class="fa fa-search"></i>Search Bus
                            </a>
                        </li>
                        <li>
                            <a href="search-vendor.php"><i class="fa fa-search"></i>Search Bus
                            </a>
                        </li> -->
                        <li>
                            <a href="{{route('searchViewBus')}}"><i class="fa fa-search"></i>Search Bus
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-book"></i> <span>Booking</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="{{route('history')}}"><i class="fa fa-circle-o"></i> All History</a>
                        </li>
                        <li>
                            <a href="{{route('bookedTicketsView')}}"><i class="fa fa-list"></i> Booked Tickets
                            </a>
                        </li>
                         

                    </ul>
                </li>
                 
                <li><a href="booking-history"><i class="fa fa-circle-o"></i>Payment</a></li>
                
             
                <!-- <li class="treeview">
                    <a href="">
                        <i class="fa fa-edit"></i> <span>Counter</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="add-assestant.php"><i class="fa fa-plus"></i>Add Assestant
                                <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span>
                            </a>
                        </li>  
                        <li>
                            <a href="all-assestant.php"><i class="fa fa-eye"></i> Assestant List
                                <span class="pull-right-container">
                                    <span class="label label-info pull-right">18</span>
                                </span>
                            </a>
                        </li> 
                    </ul>
                </li> -->
                @endif
                @if($role=='assistant')
                <li class="header">ASSESTANT VIEW</li>
                <li>
                    <a href="{{route('passengerList')}}"><i class="fa fa-users"></i> Passengers</a>
                </li>

                
               <!--  <li class="treeview">
                    <a href="">
                        <i class="fa fa-share"></i> <span>Booking list</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Level One
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li> -->
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<div class="content-wrapper">
    @yield('content')
            </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0 Design & Developed By <a href="https://webhousenepal.com/" title="https://webhousenepal.com/">webhousenepel.com</a>
        </div>
        <strong>Copyright &copy; 2019 <a href="">EASYBUS SERVICE</a>.</strong> All rights reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('backend/assets/js/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
 <script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('backend/assets/js/raphael.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('backend/assets/js/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('backend/assets/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('backend/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dataTables.bootstrap.min.js')}}"></script>

    <!-- <script src="assets/js/jquery.inputmask.date.extensions.js"></script>
    <script src="assets/js/jquery.inputmask.extensions.js"></script> -->
    <script src="{{asset('backend/assets/js/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
    < 
    <script src="{{asset('backend/assets/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('backend/assets/js/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('backend/assets/js/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backend/assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="assets/js/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    
    <script src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
    <script src="{{asset('front/assets/js/demo.js')}}"></script>
    @stack('script')
</body>
</html>
