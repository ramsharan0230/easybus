    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>EasyBus Admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
             
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">ADMIN VIEW</li>
                

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Admin Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="add-admin.php"><i class="fa fa-plus"></i>Add Admin</a></li>
                        <li><a href="admin-list.php"><i class="fa fa-eye"></i>All Admin</a></li>  
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
                        <li><a href="add-vendor.php"><i class="fa fa-plus"></i>Add Vendor</a></li>
                        <li><a href="vendor-list.php"><i class="fa fa-eye"></i>All Vendor</a></li>
                        <li>
                            <a href="pending-vendor.php"><i class="fa fa-refresh"></i>Pending Vendor
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right">4</span>
                                </span>
                            </a>
                        </li>
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
                            <a href="counter-list.php"><i class="fa fa-circle-o"></i> All Counter
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right">4</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-male"></i> <span>Assestant Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- <li><a href="add-vendor.php"><i class="fa fa-plus"></i>Add Assestant</a></li> -->
                        <li><a href="assestant-list.php"><i class="fa fa-eye"></i>All Assestant</a></li>
                        
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
                        <li><a href="all-passenger.php"><i class="fa fa-list"></i>All Passenger</a></li>
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
                        <li class="treeview">
                            <a href="#"><i class="fa fa-users"></i> Passenger Report
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="daily-passenger.php">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Daily Passenger
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Weekly Passenger
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Monthly Passenger
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Custom Passenger
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
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
                            <a href="#"><i class="fa fa-ticket"></i> Ticket Sale
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Daily Ticket Sale
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Weekly Ticket Sale
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Monthly Ticket Sale
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-arrow-circle-right"></i> 
                                        Custom Ticket Sale
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
                        </li>
                         
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
                        <li><a href="destination-list.php"><i class="fa fa-list"></i>All Destinations</a></li>
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
                <li class="header">VENDOR VIEW</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Update Info</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        <ul class="treeview-menu"> 
                            <li>
                                <a href="update-vendor-info.php"><i class="fa fa-user"></i> Update Info</a>
                            </li>
                            <li>
                                <a href="recover-password.php"><i class="fa fa-key"></i> Recover Password</a>
                            </li>
                            <li>
                                <a href="edit-personal.php"><i class="fa fa-key"></i> Edit Personal Detail</a>
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
                        <li><a href="add-bus.php"><i class="fa fa-plus"></i>Add Bus</a></li>
                        <li>
                            <a href="bus-list.php"><i class="fa fa-eye"></i>Bus list
                                <span class="pull-right-container">
                                    <span class="label label-info pull-right">24</span>
                                </span>
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
                                <a href="counter-under-vendor.php">
                                    <i class="fa fa-eye"></i>All Counters
                                    <span class="pull-right-container">
                                        <span class="label label-info pull-right">12</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="payment.php">
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
                            <a href="bus-request.php"><i class="fa fa-eye"></i>Request Bus
                                <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span>
                            </a>
                        </li>  
                        <li>
                            <a href="bus-rejected.php"><i class="fa fa-eye"></i>Rejected Bus
                                <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span>
                            </a>
                        </li> 
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Manage Assestant</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="add-assestant.php"><i class="fa fa-plus"></i>Add Assestant
                               <!--  <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span> -->
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
                </li>
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
                            <a href="update-counter-info.php"><i class="fa fa-edit"></i> Company Information
                               <!--  <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span> -->
                            </a>
                        </li> 
                        <li>
                            <a href="recover-password.php"><i class="fa fa-edit"></i> Recover Password
                            </a>
                        </li> 
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
                            <a href="counter-bus-list.php"><i class="fa fa-list"></i> 
                                All Bus
                            </a>
                        </li> 
                        <li>
                            <a href="bus-pending.php"><i class="fa fa-list"></i> Pending Bus
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
                            <a href="counter-search-bus.php"><i class="fa fa-search"></i>Search Bus
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
                            <a href="counter-all-passenger.php"><i class="fa fa-circle-o"></i> All History</a>
                        </li>
                        <li>
                            <a href="book-tickets.php"><i class="fa fa-list"></i> Booked Tickets
                            </a>
                        </li>
                         

                    </ul>
                </li>
                 
                <li><a href="booking-history"><i class="fa fa-circle-o"></i>Payment</a></li>
                
             
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-edit"></i> <span>Counter</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                          
                        <li>
                            <a href="add-assestant.php"><i class="fa fa-plus"></i>Add Assestant
                               <!--  <span class="pull-right-container">
                                    <span class="label label-info pull-right">2</span>
                                </span> -->
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
                </li>
                <li class="header">ASSESTANT VIEW</li>
                <li>
                    <a href="passengers-on-my-bus.php"><i class="fa fa-users"></i> Passengers</a>
                </li>

                
                <li class="treeview">
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
        <!-- /.sidebar -->
    </aside>