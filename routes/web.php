<?php


//Frontend Route File
Route::get('/', 'Frontend\HomeController@index')->name('index');
Route::get('/expire-booking', 'Frontend\HomeController@ServiceBookingList')->name('BookingList');
//Route::post('/SMSData', 'SmsController@getUserNumber')->name('smsdata');
Route::get('/about-us', 'Frontend\HomeController@about')->name('about-us');
Route::get('/about', 'Frontend\HomeController@kib_about_complex')->name('about');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');
Route::post('/contact/store', 'Frontend\HomeController@ContactStore')->name('contact-store');
Route::get('/service/{id}', 'Frontend\HomeController@Service')->name('service');
Route::get('/service/booking/{id}', 'Frontend\ServiceBookingController@ServiceBooking')->name('service-booking');
Route::post('/Booking/Cancel/{id}', 'Frontend\HomeController@BookingCancel')->name('CancelBooking');


//User Dashboard Controller Route File
Route::get('/user/dashboard', 'Frontend\UserDashboardController@Dashboard')->name('dashboard');
Route::get('/user/dashboard/edit/{id}', 'Frontend\UserDashboardController@edit')->name('dashboard-edit');
Route::post('/user/dashboard/update/{id}', 'Frontend\UserDashboardController@update')->name('dashboard-update');
Route::post('/service/booking/store/','Frontend\ServiceBookingController@store')->name('service-booking.store');

Auth::routes();
//Backend Route File
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	//Home Controller 
	Route::get('/', 'HomeController@index')->name('index');
	Route::get('setting', 'HomeController@Setting')->name('setting');
	Route::get('contact', 'HomeController@Contact')->name('Contact');
	Route::delete('contact/delete/{id}', 'HomeController@ContactDelete')->name('Contact-Delete');
	Route::post('setting/store', 'HomeController@SettingStore')->name('setting-store');
	//Service Type Controller
	Route::resource('ServiceType', 'ServiceTypeController');
	//Event Type Controller
	Route::resource('Event', 'EventController');
	//Service Controller
	Route::resource('Service', 'ServiceController');
	//Service Booking Controller
	Route::get('Booking/Report', 'ServiceBookingController@Report')->name('Report');
	Route::get('Booking/Published/{id}', 'ServiceBookingController@Published')->name('Published');
	Route::post('Booking/Published/{id}', 'ServiceBookingController@PublishedUpdate')->name('Published-Update');
	Route::get('Booking/Pdf/{id}', 'ServiceBookingController@LodePDF')->name('data');
	Route::get('Booking/Report/show', 'ServiceBookingController@Reportlist')->name('Reportshow');
	Route::get('Booking/Payment/{id}', 'ServiceBookingController@Payment')->name('Payment');
	Route::post('Booking/Payment/Update/{id}', 'ServiceBookingController@PaymentUpdate')->name('Payment-Update');
	Route::get('Booking/Payment/log/{id}', 'ServiceBookingController@PaymentLog')->name('PaymentLog');
	
	/*
	Route::get('get-booking-service','ServiceBookingController@ServiceName');
	Route::get('get-service-cost','ServiceBookingController@ServiceCost');
	Route::get('get-booking-configure','ServiceBookingController@ServiceConfigureBooking');
	*/
	Route::resource('Booking', 'ServiceBookingController');
	Route::resource('Slider', 'SliderController');
	
	//Service Configure Controller
	Route::resource('ServiceConfigure', 'ServiceConfigureController');
	Route::post('User/Status/{id}', 'UserController@StatusEdit')->name('StatusEdit');
	//Route::post('User/Status/{id}', 'UserController@StatusUpdate')->name('StatusUpdate');
	Route::resource('User', 'UserController');
	Route::resource('Pages', 'PagesController');
	Route::resource('Payment', 'PaymentController');
	Route::resource('Role', 'RoleController');
	Route::resource('Permission', 'PermissionController');
	Route::get('get-service','ServiceConfigureController@service');
	Route::get('service-type','ServiceController@ServiceType');
});