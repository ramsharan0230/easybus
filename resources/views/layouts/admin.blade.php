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
    
    <link rel="stylesheet" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/nepaliDatePicker.css')}}">
    <link rel="stylesheet" href="{{asset('js/nepali.datepicker.v2.2.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{asset('backend/assets/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{asset('front/css/nepaliDatePicker.css')}}">
    <link rel="stylesheet" href="{{asset('js/nepali.datepicker.v2.2.min.css')}}">
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
            <?php 
                $role=Auth::user()->role;
                $user=Auth::user();
                
            ?>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
           

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            
                            
                            <span class="hidden-xs">{{$user->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if($user->role=='admin')
                                <img src="{{asset('front/images/newlogo.png')}}" class="img-circle" alt="User Image" width="100" height="100">
                                @else
                                <img src="{{asset('document/'.$user->passport_image)}}" class="img-circle" alt="User Image">
                                @endif
                                

                                <p>
                                {{$user->name}}
                               
                                </p>
                            </li>
                            <!-- Menu Body -->
                           
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!-- <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div> -->
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                        <!-- Control Sidebar Toggle Button -->
                    <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
            </div>
        </nav>
    </header>
    
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    @if($user->role=='admin')
                    <img src="{{asset('front/images/newlogo.png')}}" class="img-circle" alt="User Image" width="100" height="100">
                    @else
                    <img src="{{asset('document/'.$user->passport_image)}}" class="img-circle" alt="User Image">
                    @endif
                    
                </div>
                <div class="pull-left info">
                    <p>{{$user->name}}</p>
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
                        <i class="fa fa-user"></i> <span>Bus Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('newBuses')}}"><i class="fa fa-plus"></i>New Buses</a></li>
                        <li><a href="{{route('approvedBuses')}}"><i class="fa fa-eye"></i>Approved Bus</a></li>  
                        <li><a href="{{route('rejectedBus')}}"><i class="fa fa-eye"></i>Rejected Bus</a></li>  
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
                            <li><a href="{{route('pendingCounter')}}"><i class="fa fa-eye"></i>Pending Counter</a></li>
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
                            <a href="{{route('registeredVehicles')}}"><i class="fa fa-users"></i> Registered Vehicles<small class="label pull-right bg-red">{{$dashboard_approved_bus}}</small></a>
                        </li>
                        <li>
                            <a href="{{route('bookingReport')}}"><i class="fa fa-ticket"></i> Booked Seats</a>
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
                        <li><a href="{{route('payToVendor')}}"><i class="fa fa-plus"></i>Pay direct to vendor</a></li>
                        
                    </ul>
                </li>
                @endif
                @if($role=='vendor')
                <li class="header">VENDOR VIEW</li>
                <li class="">
                    <a href="{{route('vendorDashboard')}}">
                        <i class="fa fa-edit"></i> <span> Dashboard</span>
                        <span class="pull-right-container">
                            
                        </span>
                    </a>
                    
                </li>
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
                            <!-- <li>
                                <a href="payment.php">
                                    <i class="fa fa-dollar"></i>Payment Status
                                </a>
                            </li> -->
                            
                            
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
                            <a href="{{route('busRequest')}}"><i class="fa fa-eye"></i>Bus Request
                                <span class="pull-right-container">
                                    <!-- <span class="label label-info pull-right">2</span> -->
                                </span>
                            </a>
                        </li>   
                        <li>
                            <a href="{{route('rejectedBusList')}}"><i class="fa fa-eye"></i>Rejected Bus
                                <span class="pull-right-container">
                                    <!-- <span class="label label-info pull-right">2</span> -->
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
                <!-- <li class="treeview">
                    <a href="">
                        <i class="fa fa-book"></i> <span>Payments</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href=""><i class="fa fa-circle-o"></i>Paid</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-circle-o"></i>Pendings</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-circle-o"></i>By Bus</a>
                        </li>
                        
                         

                    </ul>
                </li> -->
                @endif
                @if($role=='counter')
                <li class="header">COUNTER VIEW</li>
                
                <li class="">
                    <a href="{{route('counterDashboard')}}">
                        <i class="fa fa-edit"></i> <span> Dashboard</span>
                        <span class="pull-right-container">
                            
                        </span>
                    </a>
                    
                </li>
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
                        <!-- <li>
                            <a href="recover-password.php"><i class="fa fa-edit"></i> Recover Password
                            </a>
                        </li> --> 
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
                        </li> -->
                        <li>
                            <a href="{{route('searchViewBus')}}"><i class="fa fa-search"></i>Search Bus
                            </a>
                        </li>
                        <!-- <li>
                            <a href="counter-search-bus.php"><i class="fa fa-search"></i>Search Bus
                            </a>
                        </li> -->

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
                            <a href="{{route('counterBusSearch')}}"><i class="fa fa-circle-o"></i> Book Seat</a>
                        </li>
                        <li>
                            <a href="{{route('history')}}"><i class="fa fa-circle-o"></i> All History</a>
                        </li>
                        <li>
                            <a href="{{route('bookedTicketsView')}}"><i class="fa fa-list"></i> Booked Tickets
                            </a>
                        </li>
                         

                    </ul>
                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-book"></i> <span>Vendors</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('myVendors')}}"><i class="fa fa-circle-o"></i> My Vendors</a>
                        </li>
                        
                         

                    </ul>
                </li>
                <!-- <li class="treeview">
                    <a href="">
                        <i class="fa fa-book"></i> <span>Payments</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('paidBookings')}}"><i class="fa fa-circle-o"></i>Paid</a>
                        </li>
                        <li>
                            <a href="{{route('pendingBookings')}}"><i class="fa fa-circle-o"></i>Pendings</a>
                        </li>
                        <li>
                            <a href="{{route('paymentBasedOnBus')}}"><i class="fa fa-circle-o"></i>By Bus</a>
                        </li>
                        
                         

                    </ul>
                </li> -->
                 
                
                
             
                
                @endif
                @if($role=='assistant')
                <li class="header">ASSESTANT VIEW</li>
                <li>
                    <a href="{{route('passengerList')}}"><i class="fa fa-users"></i> Passengers</a>
                    <a href="{{route('changeDetail')}}"><i class="fa fa-users"></i> Change Detail</a>
                </li>
                @endif

                
               <!--  <li class="treeview">
                    <a href="#">
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
                </li>
            </ul>
        </section>
        -->
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
<script src="{{asset('backend/assets/js/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('backend/assets/js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/assets/js/fastclick.js')}}"></script>

<script src="{{asset('backend/assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="assets/js/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/assets/js/demo.js')}}"></script>
<script src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
</body>
</html>

@stack('script')
<script >
    $(document).ready(function() {
        $('.table').wrap( '<div class="table-container"></div>' );
    })
// $(".bod-picker").val();
// $(".bod-picker").nepaliDatePicker({
//     dateFormat: "%y-%m-%d",
//     closeOnDateSelect: true,
//     // minDate: formatedNepaliDate
// });
if ($("#total_passengers_week").length) { 
    var f = document.getElementById("total_passengers_week");
    new Chart(f, { type: "bar",
    data: { labels: ["Day=1", "Day=2","Day=3", "Day=4", "Day=5", "Day=6", "Today"], 
    datasets: 
        [
            { 
                label: "Weekly Income", 
                data: [ 501,  310,  140, 657, 755, 436, 609,  ], 
                backgroundColor: [
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#daa520"
                    ],
               
            }
        ] 

    }, 
        options: 
        { scales: 
            { 
                yAxes: 
                [{ 
                    ticks: { 
                        beginAtZero: !0 
                    } 
                }] 
            } 
        } 

    }) 
}
if ($("#total_passengers").length) { 
    var f = document.getElementById("total_passengers");
    new Chart(f, { type: "bar",
    data: { labels: [1, 2, 3, 4, 5, 6, 7, 8 , 9 , 10, 11, 12, 13, 14 ,15 ,16 ,17 ,18,19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31], 
    datasets: 
        [
            { 
                label: "Monthly Income", 
                data: [ 50100,  31000,  14000,  23800,  34500, 54300, 43500, 23487, 45387, 35874, 65877, 78755, 38734, 43871, 48701, 58741, 76873, 43876, 68709, 80879, 28724, 54879, 55875, 38745, 54872, 28733, 58745, 65874, 23874, 51874, 58721,], 
                backgroundColor: "#daa520",
               /* backgroundColor: [*/
                    /*"#36a2eb", 
                    "#ff6384", 
                    "#ff9f40", 
                    "#ffcd56", 
                    "#4bc0c0", */

                    /*"#1d69d2",*/

                    /*"#4c3344",
                    "#687eda",
                    "#708488",
                    "ff0000",
                    "#ffd700",
                    "#40e0d0",
                    "#ff7373",
                    "#800000",
                    "#800080",
                    "#00ff00",
                    "#333333",
                    "#ff7f50",
                    "#c0d6e4",
                    "#808080",
                    "#ffff66",
                    "#3399ff",
                    "#ff4444",*/

                    /*],*/
            }
        ] 

    }, 
        options: 
        { scales: 
            { 
                yAxes: 
                [{ 
                    ticks: { 
                        beginAtZero: !0 
                    } 
                }] 
            } 
        } 

    }) 
}

</script>
