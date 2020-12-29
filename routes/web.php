<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Admin'],function(){
	Route::get('login','LoginController@login')->name('login');
	// Route::get('counter-register','LoginController@registerView')->name('registerView');
	Route::post('postLogin','LoginController@postLogin')->name('postLogin');
	Route::post('postRegister','LoginController@register')->name('postRegister');
});

Route::group(['namespace'=>'User'],function(){
  Route::post('client-register','UserLoginController@register')->name('client-register');
  Route::post('client-login','UserLoginController@login')->name('clientLogin');
  // Route::get('account','UserLoginController@account')->name('account');
  Route::get('client-logout','UserLoginController@logout')->name('clientLogout');
});
Route::get('account','RegisterController@account')->name('account');
Route::get('profile','RegisterController@profile')->name('profile');
Route::get('edit-profile','RegisterController@editProfile')->name('editProfile');
Route::post('updateprofile','RegisterController@updateProfile')->name('updateProfile');
Route::get('user-search-bus','RegisterController@searchBus')->name('userSearchBusView')->middleware('PreventReturn');
Route::post('user-saerch-bus-by-category','RegisterController@userSelectBusByCategory')->name('userSelectBusByCategory');
Route::post('user-save-session','RegisterController@userSaveSession')->name('userSaveSession');
Route::post('user-remove-session','RegisterController@userRemoveSession')->name('userRemoveSession');
Route::get('user-bus-search','RegisterController@userBusSearch')->name('userBusSearch')->middleware('PreventReturn');
Route::get('booking-history','RegisterController@bookingHistory')->name('bookingHistory');
Route::get('ticket-history','RegisterController@ticketHistory')->name('ticketHistory');

Route::group(['namespace'=>'Admin','middleware'=>['auth'],'prefix'=>'admin'],function(){
	//admin
	Route::resource('dashboard','DashboardController');
	Route::get('logout','LoginController@Logout')->name('logout');
	Route::post('mark-as-paid','ReportController@markAsPaid')->name('markAsPaid');
	Route::group(['middleware'=>['Admin']],function(){
		
		Route::resource('user','UserController');
		Route::resource('destination','DestinationController');
		Route::get('counters','AdminController@allCounters')->name('adminCounter');
		Route::get('new-buses','AdminController@newBuses')->name('newBuses');
		Route::get('approve-bus/{id}','AdminController@approveBus')->name('approveBus');
		Route::get('reject-bus/{id}','AdminController@rejectBus')->name('rejectBus');
		Route::get('bus-detail/{id}','AdminController@busDetail')->name('busDetail');
		Route::get('approved-buses','AdminController@approvedBuses')->name('approvedBuses');
		Route::get('approved-bus-tickets/{id}','ReportController@approvedBusTickets')->name('approvedBusTicket');
		Route::post('individual-bus-tickets','ReportController@individualBusTickets')->name('individualBustickets');
		Route::get('advertisement/{bus_id}','AdminController@busAdvertisement')->name('busAdvertisemet');
		Route::post('save-advertisement','AdminController@saveAdvertisement')->name('saveAdvertisemet');
		Route::get('edit-advertisement/{advert_id}','AdminController@editAdvertisement')->name('editAdvertisement');
		Route::post('update-advertisement/{advert_id}','AdminController@updateAdvertisement')->name('updateAdvertisement');	
		Route::get('advertisement-list/{bus_id}','AdminController@advertisementList')->name('advertisementList');
		Route::delete('delete-advertisement/{bus_id}','AdminController@advertisementList')->name('deleteAdvertisement');
		Route::get('rejected-bus','AdminController@rejectedBus')->name('rejectedBus');
		Route::get('suspended-bus','AdminController@suspendedBus')->name('suspendedBus');
		Route::get('bus/{id}/ticketHistory','AdminController@busTicketHistory')->name('bus.ticketHistory');
		Route::get('counter-tickets-issued/{id}','AdminController@counterTicketIssued')->name('counterTicketsIssued');
		Route::get('counter-detail/{id}','AdminController@counterDetail')->name('counterDetail');
		Route::get('assistants','AdminController@allAssistants')->name('adminAssistant');
		Route::get('all-passenger','AdminController@allPassengers')->name('allPassenger');
		Route::resource('bus-type','BusCategoryController');
		Route::get('pending','VendorController@pendingVendor')->name('pendingVendor');
		Route::get('pending-counter','VendorController@pendingCounter')->name('pendingCounter');
		Route::post('approve-vendor-request','VendorController@approveVendorRequest')->name('approveVendorRequest');
		Route::post('reject-vendor-request','VendorController@rejectVendorRequest')->name('rejectVendorRequest');

		//report
		Route::get('passenger-report','ReportController@passengerReport')->name('passengerReport');
		Route::get('ticket-report','ReportController@ticketReport')->name('ticketReport');
		Route::get('vendor-report','ReportController@vendorReport')->name('vendorReport');
		Route::get('income-report','ReportController@incomeReport')->name('incomeReport');
		Route::get('pay-to-vendor','ReportController@payToVendor')->name('payToVendor');
		Route::post('pay-to-vendor','ReportController@paymentToVendor')->name('paymentToVendor');
		Route::get('vehicle-report','ReportController@vehicleReport')->name('vehicleReport');
		Route::get('booking-reports','ReportController@bookingReports')->name('bookingReport');
		Route::get('registered-vehicles','ReportController@registeredVehicles')->name('registeredVehicles');
		Route::get('category-report','ReportController@categoryReport')->name('categoryReport');
		Route::get('bus-list-report/{id}','ReportController@busListReport')->name('busListReport');
		Route::get('counter-booked-seat','ReportController@counterBookedSeats')->name('counterBookedSeats');
		Route::get('online-booked-seat','ReportController@onlineBookedSeats')->name('onlineBookedSeats');
		Route::get('counters-of-vendor/{id}','ReportController@counter_of_vendor')->name('counterOfVendor');
		Route::get('vendor-buses/{id}','ReportController@vendorBuses')->name('vendorBusesReport');
		Route::get('vendor-bus-tickets/{id}','ReportController@vendorBusTickets')->name('vendorBusTickets');
		Route::get('vendor-asistants/{id}','ReportController@vendorsAssistant')->name('vendorsAssistant');
		Route::get('vendors-tickets/{id}','ReportController@vendorTickets')->name('vendorsTickets');
		Route::post('search-passenger-by-date','ReportController@searchPassengerByDate')->name('searchPassengerByDate');
		Route::post('search-passenger-by-bus','ReportController@searchPassengerByBus')->name('searchPassengerByBus');
		Route::post('vendor-online-ticket','ReportController@vendorOnlineTicket')->name('vendorOnlineTicket');
		Route::get('vendor-of-counter/{id}','ReportController@vendor_of_counters')->name('vendorOfCounter');
		Route::get('counter-bus-list/{id}','ReportController@counter_bus_list')->name('counterBusList');
		Route::get('counter-bus-tickets/{id}','ReportController@counterBusTickets')->name('counterBusTickets');
		Route::get('client','ClientController@allClients')->name('client.index');
		Route::get('client/{id}/edit','ClientController@editClient')->name('client.edit');
		Route::delete('client/{id}/delete','ClientController@deleteClient')->name('client.delete');
		Route::get('client/{id}/show/booking','ClientController@showBookings')->name('client.show.booking');
		
	});
	
	//vendor
	Route::resource('vendor','VendorController');
	Route::group(['middleware'=>['Vendor']],function(){
		Route::get('vendor-dashboard','VendorController@vendorDashboard')->name('vendorDashboard');
		Route::get('edit-vendor-info','VendorController@editVendorInfo')->name('editVendorInfo');
		Route::post('update-vendor-info','VendorController@updateVendorInfo')->name('updateVendorInfo');
		Route::get('edit-personal-info','VendorController@editPersonalInfo')->name('editPersonalInfo');
		Route::post('vendro-info-add','VendorController@vendorInfoAdd')->name('vendorInfoAdd');
		Route::post('accept-request','VendorController@acceptRequest')->name('acceptRequest');
		Route::post('change-seat-name','BusController@changeSeatName')->name('changeSeatName');
		Route::get('bus-booking-detail/{id}','BusController@bookingDetail')->name('busBookingDetail');
		Route::get('booking-detail-by-date/{id}','BusController@bookingDetailByDate')->name('bookingDetailByDate');
		Route::get('approved-bus/{id}','VendorController@approvedBus')->name('approvedBus');
		Route::get('request-sender-view/{id}','VendorController@requestSenderView')->name('requestSenderView');
		Route::get('vendor-booking-history/{id}','VendorController@bookingHistory')->name('vendorBookingHistory');
		
		
		Route::resource('bus','BusController');
		
		Route::get('bus-routine/{id}','BusRoutineController@busRoutine')->name('busRoutine');
		Route::get('add-routine/{busid}','BusRoutineController@addRoutine')->name('addRoutine');
		Route::get('sms-view/{id}','BusRoutineController@smsView')->name('smsView');
		Route::post('save-sms','BusRoutineController@saveSms')->name('saveSms');
		Route::get('sendSms/{id}','BusRoutineController@sendSms')->name('sendSms');
		Route::post('save-routine','BusRoutineController@saveRoutine')->name('saveRoutine');
		Route::get('edit-bus-routine/{id}','BusRoutineController@editBusRoutine')->name('editBusRoutine');
		Route::post('update-routine/{id}','BusRoutineController@updateRoutine')->name('updateRoutine');
		Route::get('delete-routine/{id}','BusRoutineController@deleteRoutine')->name('deleteRoutine');
		Route::post('remove-sub-destination','BusRoutineController@removeSubDestination')->name('removeSubDestination');
		Route::get('bus-request','BusController@busRequest')->name('busRequest');
		Route::get('rejected-bus-list','BusController@rejectedBusList')->name('rejectedBusList');
		Route::post('reject-request','VendorController@rejectRequest')->name('rejectRequest');
		Route::get('all-counters','VendorController@allCounters')->name('allCounters');
		
		Route::get('ticket-sale/{id}','VendorController@ticketSale')->name('ticketSale');
		Route::post('update-vendor-info/{id}','VendorController@updateInfo')->name('updateVendorInfo');
		Route::get('approved-bus-layout/{id}','VendorController@approvedBuslayout')->name('approvedBuslayout');
		Route::get('add-assistant','VendorController@addAssistant')->name('addAssistant');
		Route::post('save-assistant','VendorController@saveAssistant')->name('saveAssistant');
		Route::get('vendor-assistant','VendorController@allAssistant')->name('allAssistant');
		Route::delete('delete-assistant/{id}','VendorController@deleteAssistant')->name('deleteAssistant');
		Route::get('edit-assistant/{id}','VendorController@editAssistant')->name('editAssistant');
		Route::post('update-assistant/{id}','VendorController@updateAssistant')->name('updateAssistant');
		Route::get('assistant-detail/{id}','VendorController@assistantDetail')->name('assistantDetail');
		Route::get('counter-of-vendor/{id}','VendorController@vendors_counter_view')->name('vendors_counter_view');


	});
	
	
	//counter
	Route::group(['middleware'=>['Counter']],function(){
		Route::get('counter-dashboard','CounterController@counterDashboard')->name('counterDashboard');
		Route::get('passenger-list-by-bus/{id}','CounterController@passengerListByBus')->name('passengerListByBus');
		Route::get('booking-history-by-bus/{id}','CounterController@bookingHistoryByBus')->name('bookinghistoryByBus');
		Route::get('booked-view/{id}','CounterController@bookedView')->name('bookedView');
		Route::get('bookSeat','CounterController@bookSeat')->name('bookSeat');
		Route::get('counterBusSearch','CounterController@counterBusSearch')->name('counterBusSearch');
		Route::post('counterSelectBusByCategory','CounterController@counterSelectBusByCategory')->name('counterSelectBusByCategory');

		Route::get('book-now/{id}','CounterController@book_now')->name('counterbookNow');

		Route::post('seat-booking','CounterController@seatBooking')->name('counterseatBooking');
		Route::get('my-vendor-detail/{id}','CounterController@myVendorsDetail')->name('myVendorDetail');

		Route::get('bus-search','CounterController@busSearchView')->name('searchViewBus');
		Route::post('search-bus','CounterController@searchBus')->name('searchBus');
		Route::post('search-bus-by-number','CounterController@searchBusByNumber')->name('searchBusByNumber');
		Route::get('bus-view/{id}','CounterController@busView')->name('busView');
		
		Route::get('booked-tickets','CounterController@bookedTicketsView')->name('bookedTicketsView');
		Route::get('booking-list/{id}','CounterController@bookingList')->name('bookingList');
		Route::get('booking-to-vendors/{id}','CounterController@bookingToVendors')->name('bookingTovendors');
		Route::get('searchBookingPaymentDetail','CounterController@searchBookingPaymentDetail')->name('searchBookingPaymentDetail');
		Route::get('booked-bus-layout/{id}','CounterController@bookedbusLayout')->name('bookedBusLayout');
		Route::get('bus-search-counter','CounterController@busSearchCounter')->name('busSearchCounter');
		Route::get('histroy','CounterController@allhistory')->name('history');
		Route::post('send-bus-request','CounterController@sendBusRequest')->name('sendBusRequest');
		Route::get('edit-counter-info','CounterController@editInfo')->name('editCounterInfo');
		Route::post('update-counter-info/{id}','CounterController@updateInfo')->name('updateCounterInfo');
		Route::post('add-counter-info','CounterController@addCounterInfo')->name('addCounterInfo');
		Route::get('bus-list','CounterController@busList')->name('busList');
		Route::get('pending-bus-list','CounterController@pendingBusList')->name('pendingbusList');
		Route::get('bus-layout/{id}','CounterController@busLayout')->name('busLayout');
		Route::post('searchbookedlayouts','CounterController@searchBookedSeatLayout')->name('searchBookedSeatLayout');
		Route::post('searchBookingListByDate','CounterController@searchBookingListByDate')->name('searchBookingListByDate');
		Route::get('my-vendors','CounterController@myVendors')->name('myVendors');
		Route::get('vendor-bus/{id}','CounterController@vendorBuses')->name('vendorBuses');
		Route::get('counter/paid-bookings','CounterController@paidBookings')->name('paidBookings');
		Route::get('counter/pending-bookings-payment','CounterController@pendingBookings')->name('pendingBookings');
		Route::get('payment-by-bus','CounterController@paymentBasedOnBus')->name('paymentBasedOnBus');
		Route::get('counter/payment/{id}','CounterController@paymentBasedOnIndividualBus')->name('paymentBasedOnIndividualBus');
		Route::post('counter-payment-to-vendor','CounterController@counterPaymentToVendor')->name('counterPaymentToVendor');

	});

	Route::group(['middleware'=>['Assistant'],'prefix'=>'assistant'],function(){
		Route::get('passenger-list','AssistantController@index')->name('passengerList');
		Route::get('booking-view','AssistantController@busview')->name('assistantBookingView');
		Route::get('change-detail','AssistantController@changeDetail')->name('changeDetail');
		Route::post('update-detail/{id}','AssistantController@updateBusDetail')->name('updateBusDetail');

		Route::get('add-routine/{busid}','AssistantController@addRoutine')->name('addAsistantRoutine');
		Route::post('save-routine','AssistantController@saveRoutine')->name('saveAssistantRoutine');
		Route::get('edit-bus-routine/{id}','AssistantController@editBusRoutine')->name('editAssistantBusRoutine');
		Route::post('update-routine/{id}','AssistantController@updateRoutine')->name('updateAssistantRoutine');
		Route::get('delete-routine/{id}','AssistantController@deleteRoutine')->name('deleteAsistantRoutine');
		Route::get('sms-view/{id}','AssistantController@smsView')->name('smsViewAssistant');
		Route::post('save-sms','AssistantController@saveSms')->name('saveSmsAssistant');
		Route::get('sendSms/{id}','AssistantController@sendSms')->name('sendSmsAssistant');
	});
});

Route::group(['namespace'=>'Front'],function(){

	Route::post('test','DefaultController@test')->name('khaltiTesting');
	Route::post('test2', 'DefaultController@test2')->name('test2');
	Route::post('verify', 'DefaultController@verify')->name('verify');
	Route::get('payment','ImeController@index')->name('payment')->middleware('PreventReturn');
	Route::get('/','DefaultController@index')->name('home');
	Route::get('bus-search','DefaultController@busSearch')->name('busSearch')->middleware('PreventReturn');
	Route::post('select-bus-by-category','DefaultController@selectBusByCategory')->name('selectBusByCategory');
	Route::post('save-session','DefaultController@saveSession')->name('saveSession');
	Route::post('saave-sub-destination-price','DefaultController@saveSubDestinationPrice')->name('saveSubDestinationPrice');
	Route::get('book-now/{id}','DefaultController@book_now')->name('bookNow');
	Route::post('seat-booking','DefaultController@seatBooking')->name('seatBooking');
	Route::post('remove-session','DefaultController@removeSession')->name('removeSession');
	Route::get('check','DefaultController@checkSession');
	Route::get('register','DefaultController@userRegister')->name('userRegister');
	Route::get('counter-register','DefaultController@counterRegister')->name('counterRegister');
	Route::get('vendor-register','DefaultController@vendorRegister')->name('vendorRegister');
	Route::post('register-counter','DefaultController@registerCounter')->name('registerCounter');
	Route::post('register-vendor','DefaultController@registerVendor')->name('registerVendor');
	Route::get('client-login','DefaultController@loginView')->name('userLogin');
	Route::get('success','DefaultController@success')->name('success');


	Route::post('imepay', 'DefaultController@imepay')->name('imepay');
	Route::post('imepay-verify','ImeController@imepay_verify')->name('imepay-verify');
});


 