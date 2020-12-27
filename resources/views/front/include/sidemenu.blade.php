<?php
$route_name = Route::currentRouteName();

?>
<div class="nav user-side-menu flex-column nav-pills font_14" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	<a class="nav-link {{$route_name=='account'?'active':''}}" id="v-pills-home-tab" href="{{route('account')}}" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
	<a class="nav-link {{$route_name=='profile'?'active':''}}" id="v-pills-home-tab"  href="{{route('profile')}}" aria-controls="v-pills-home" aria-selected="false"><i class="fa fa-user"></i> Profile</a>

	<a class="nav-link {{$route_name=='ticketHistory'?'active':''}}" id="v-pills-profile-tab"  href="{{route('ticketHistory')}}" aria-controls="v-pills-profile" aria-selected="false">
		<i class="fa fa-clipboard"></i> Tickets History
	</a>
	<a class="nav-link" id="v-pills-profile-tab"  href="#" aria-controls="v-pills-profile" aria-selected="false">
	<i class="fa fa-commenting-o" aria-hidden="true"></i> Messages
		<span class="btn btn-info ticket_notice float-right font_weight600">2</span>
	</a>
	<a class="nav-link {{$route_name=='bookingHistory'?'active':''}}" id="v-pills-profile-tab"  href="{{route('bookingHistory')}}" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-clipboard"></i> booking History</a>

	<a class="nav-link {{$route_name=='userSearchBusView'?'active':''}}" id="v-pills-profile-tab"  href="{{route('userSearchBusView')}}" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-search"></i> Search Bus</a>
		
	<a class="nav-link" id="v-pills-settings-tab"  href="{{route('clientLogout')}}" aria-controls="v-pills-settings" aria-selected="false"> <i class="fa fa-power-off"></i> Logout</a>
</div>