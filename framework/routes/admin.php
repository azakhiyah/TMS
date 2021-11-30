<?php
Auth::routes();
Route::namespace ('Admin')->group(function () {
    // Route::get('export-events', 'HomeController@export_calendar');

    Route::get("/clear_cache", function () {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
    });

    Route::get("/", 'HomeController@index')->middleware(['lang_check', 'auth']);
    Route::group(['middleware' => ['lang_check', 'auth', 'officeadmin']], function () {
        // Route::get('test', function () {
        //     return view('geocode');
        // });
        Route::post('clear-database', 'SettingsController@clear_database')->middleware('userpermission:S');
        Route::post('cancel-booking', 'BookingsController@cancel_booking');
        Route::resource('team', 'TeamController');
        Route::resource('company-services', 'CompanyServicesController')->middleware('userpermission:S');
        Route::get('parts-used/{id}', 'WorkOrdersController@parts_used')->middleware('userpermission:7');
        Route::get('remove-part/{id}', 'WorkOrdersController@remove_part')->middleware('userpermission:7');
        Route::get('parts-used/{id}', 'OrderPlanController@parts_used')->middleware('userpermission:7');
        Route::get('remove-part/{id}', 'OrderPlanController@remove_part')->middleware('userpermission:7');
        Route::post('add-stock', 'PartsController@add_stock');
        Route::resource('booking-quotation', 'BookingQuotationController')->middleware('userpermission:3');
        Route::post('add-booking', 'BookingQuotationController@add_booking');
        Route::get('booking-quotation/invoice/{id}', 'BookingQuotationController@invoice')->middleware('userpermission:3');
        Route::get('print-quote/{id}', 'BookingQuotationController@print')->middleware('userpermission:3');
        Route::get('booking-quotation/approve/{id}', 'BookingQuotationController@approve')->middleware('userpermission:3');
        Route::post('import-vehicles', 'VehiclesController@importVehicles');
        Route::post('import-drivers', 'DriversController@importDrivers');
        Route::post('import-income', 'IncomeCategories@importIncome');
        Route::post('import-expense', 'ExpenseCategories@importExpense');
        //Route::post('import-customers', 'CustomersController@importCutomers');
        Route::post('import-clocation', 'CustomerLocationController@importCustomerLocation');
        Route::post('import-trailers', 'TrailersController@importTrailers');
        Route::post('import-transporter', 'TransporterController@importTransporter');
        Route::post('import-trucks', 'TrucksController@importTrucks');
        Route::post('import-product', 'ProductController@importProduct');
        Route::post('import-customers', 'CustomersController@importCustomers');
        Route::post('import-depo', 'DepoController@importDepo');
        Route::post('import-warehouse', 'WarehouseController@importWarehouse');
        Route::post('import-vendors', 'VendorController@importVendors');
        Route::get('frontend-settings', 'SettingsController@frontend')->middleware('userpermission:S');
        Route::post('frontend-settings', 'SettingsController@store_frontend');
        Route::resource('testimonials', 'TestimonialController')->middleware('userpermission:15');
        // routes for bulk delete action
        Route::post('delete-team', 'TeamController@bulk_delete');
        Route::post('delete-company-services', 'CompanyServicesController@bulk_delete');
        Route::post('delete-testimonials', 'TestimonialController@bulk_delete');
        Route::post('delete-reasons', 'ReasonController@bulk_delete');
        Route::post('delete-income', 'Income@bulk_delete');
        Route::post('delete-expense', 'ExpenseController@bulk_delete');
        Route::post('delete-reminders', 'ServiceReminderController@bulk_delete');
        Route::post('delete-service-items', 'ServiceItemsController@bulk_delete');
        Route::post('delete-parts', 'PartsController@bulk_delete');
        Route::post('delete-work-orders', 'WorkOrdersController@bulk_delete');
        Route::post('delete-order_plan2', 'OrderPlanController@bulk_delete');
        Route::post('delete-order_plan', 'OrderPlanController@bulk_delete');
        Route::post('delete-pickup_bytransport', 'PickupbyTransportController@bulk_delete');
        Route::post('delete-delivery_order', 'DeliveryOrderController@bulk_delete');
        Route::post('delete-parts-category', 'PartsCategoryController@bulk_delete');
        Route::post('delete-users', 'CustomersController@bulk_delete');
        Route::post('delete-drivers', 'DriversController@bulk_delete');
        Route::post('delete-vehicles', 'VehiclesController@bulk_delete');
        Route::post('delete-fuel', 'FuelController@bulk_delete');
        Route::post('delete-vendors', 'VendorController@bulk_delete');
        Route::post('delete-clocation', 'CustomerLocationController@bulk_delete');
        Route::post('delete-trailers', 'TrailersController@bulk_delete');
        Route::post('delete-transporter', 'TransporterController@bulk_delete');
        Route::post('delete-trucks', 'TrucksController@bulk_delete');
        Route::post('delete-product', 'ProductController@bulk_delete');
        Route::post('delete-customers', 'CustomersController@bulk_delete');
        Route::post('delete-depo', 'DepoController@bulk_delete');
        Route::post('delete-warehouse', 'WarehouseController@bulk_delete');
        Route::post('delete-bookings', 'BookingsController@bulk_delete');
        Route::post('delete-quotes', 'BookingQuotationController@bulk_delete');
        Route::post('delete-vehicle-types', 'VehicleTypeController@bulk_delete');
        Route::post('delete-truck-types', 'TruckTypeController@bulk_delete');
        Route::post('delete-vehicle-groups', 'VehicleGroupController@bulk_delete');
        Route::post('delete-vehicle-reviews', 'VehiclesController@bulk_delete_reviews');

        Route::get('reports/income', 'ReportsController@income')->middleware('userpermission:4');
        Route::post('reports/income', 'ReportsController@income_post')->middleware('userpermission:4');
        Route::post('print-income', 'ReportsController@income_print');

        Route::get('reports/expense', 'ReportsController@expense')->middleware('userpermission:4');
        Route::post('reports/expense', 'ReportsController@expense_post')->middleware('userpermission:4');
        Route::post('print-expense', 'ReportsController@expense_print');

        Route::get('work_order/logs', 'WorkOrdersController@logs')->middleware('userpermission:7');
        Route::get('order_plan2/logs', 'OrderPlanController@logs')->middleware('userpermission:7');
        Route::get('order_plan/logs', 'OrderPlanController@logs')->middleware('userpermission:7');

        //Route::get('pickup_bytransport/get-orderSO', 'PickupbyTransportController@get_orderSO')->middleware('userpermission:7');
        Route::post('pickup_bytransport/get_orderSO', 'PickupbyTransportController@get_orderSO')->middleware('userpermission:7');
        Route::post('trucks/get_buntut', 'TrucksController@get_buntut')->middleware('userpermission:7');
        Route::post('pickup_bytransport/get_plate', 'PickupbyTransportController@get_plate')->middleware('userpermission:7');
        Route::post('pickup_bytransport/logs', 'PickupbyTransportController@logs')->middleware('userpermission:7');
        Route::get('/pickup_bytransport/print/{id}', 'PickupbyTransportController@print')->middleware('userpermission:7');
        Route::get('/pickup_bytransport/viewcetak/{id}', 'PickupbyTransportController@viewcetak')->middleware('userpermission:7');
        Route::get('pickup_bytransport/event/{id}', 'PickupbyTransportController@view_event')->middleware('userpermission:7');

        Route::post('delivery_order/get_orderSO', 'DeliveryOrderController@get_orderSO')->middleware('userpermission:7');
        Route::post('delivery_order/get_plate', 'DeliveryOrderController@get_plate')->middleware('userpermission:7');
        Route::post('delivery_order/logs', 'DeliveryOrderController@logs')->middleware('userpermission:7');
        Route::get('delivery_order/event/{id}', 'DeliveryOrderController@view_event')->middleware('userpermission:7');
        Route::resource('parts-category', 'PartsCategoryController')->middleware('userpermission:14');

        Route::get('driver-logs', 'VehiclesController@driver_logs')->middleware('userpermission:1');
        Route::resource('/vehicle-types', 'VehicleTypeController')->middleware('userpermission:1');\
        Route::resource('/truck-types', 'TruckTypeController')->middleware('userpermission:1');
        Route::get('print-vehicle-review/{id}', 'VehiclesController@print_vehicle_review')->middleware('userpermission:1');
        Route::get('view-vehicle-review/{id}', 'VehiclesController@view_vehicle_review')->middleware('userpermission:1');
        Route::get('vehicle-reviews-create', 'VehiclesController@vehicle_review')->middleware('userpermission:1');
        Route::get('vehicle-reviews', 'VehiclesController@vehicle_review_index')->name('vehicle_reviews')->middleware('userpermission:1');
        Route::get('vehicle-review/{id}/edit', 'VehiclesController@review_edit')->middleware('userpermission:1');
        Route::post('vehicle-review-update', 'VehiclesController@update_vehicle_review')->middleware('userpermission:1');
        Route::post('store-vehicle-review', 'VehiclesController@store_vehicle_review')->middleware('userpermission:1');
        Route::delete('delete-vehicle-review/{id}', 'VehiclesController@destroy_vehicle_review')->middleware('userpermission:1');
        //maps
        Route::get('single-driver/{id}', 'DriversController@single_driver');
        Route::get('driver-maps/', 'DriversController@driver_maps')->middleware('userpermission:12');
        Route::get('markers/', 'DriversController@markers');
        Route::get('track-driver/{id}', 'DriversController@track_driver');

        Route::post('print-users-report', 'ReportsController@print_users');
        Route::post('print-customer-report', 'ReportsController@print_customer');
        Route::get('print-vendor-report', 'ReportsController@print_vendor');
        Route::post('print-driver-report', 'ReportsController@print_driver');
        Route::post('print-yearly-report', 'ReportsController@print_yearly');
        Route::post('print-fuel-report', 'ReportsController@print_fuel');
        Route::post('print-booking-report', 'ReportsController@print_booking');
        Route::post('print-deliquent-report', 'ReportsController@print_deliquent');
        Route::post('print-monthly-report', 'ReportsController@print_monthly');
        // Route::get('print-bookings', 'BookingsController@print_bookings');
        Route::get('reviews', 'ReviewRatings@index')->middleware('userpermission:10');
        Route::get('messages', 'ContactUs@index');
        Route::get('api-settings', 'SettingsController@api_settings')->middleware('userpermission:S');
        Route::post('api-settings', 'SettingsController@store_settings')->middleware('userpermission:S');

        Route::get('fb', 'SettingsController@fb_create')->name('fb');
        Route::post('firebase-settings', 'SettingsController@firebase')->middleware('userpermission:S');
        Route::get('fare-settings', 'SettingsController@fare_settings')->middleware('userpermission:S');
        Route::post('fare-settings', 'SettingsController@store_fareSettings')->middleware('userpermission:S');
        Route::post('store-key', 'SettingsController@store_key')->middleware('userpermission:S');
        Route::get('test-key', 'SettingsController@test_key')->middleware('userpermission:S');
        Route::post('store-api', 'SettingsController@store_api')->middleware('userpermission:S');
        Route::resource('service-reminder', 'ServiceReminderController')->middleware('userpermission:9');
        Route::resource('service-item', 'ServiceItemsController')->middleware('userpermission:9');
        Route::resource('/vehicle_group', 'VehicleGroupController')->middleware('userpermission:1');
        Route::post('/income_records', 'Income@income_records')->middleware('userpermission:2');
        Route::post('/expense_records', 'ExpenseController@expense_records')->middleware('userpermission:2');
        Route::post('/store_insurance', 'VehiclesController@store_insurance');
        Route::get('vehicle/event/{id}', 'VehiclesController@view_event')->middleware('userpermission:1');
        Route::get('clocation/event/{id}', 'CustomerLocationController@view_event')->middleware('userpermission:1');
        Route::get('trailers/event/{id}', 'TrailersController@view_event')->middleware('userpermission:1');
        Route::get('transporter/event/{id}', 'TransporterController@view_event')->middleware('userpermission:1');
        Route::get('trucks/event/{id}', 'TrucksController@view_event')->middleware('userpermission:1');
        Route::get('order_plan/event/{id}', 'OrderPlanController@view_event')->middleware('userpermission:1');
        Route::get('product/event/{id}', 'ProductController@view_event')->middleware('userpermission:1');
        Route::get('customers/event/{id}', 'CustomersController@view_event')->middleware('userpermission:1');
        Route::get('depo/event/{id}', 'DepoController@view_event')->middleware('userpermission:1');
        Route::get('drivers/event/{id}', 'DriversController@view_event')->middleware('userpermission:1');
        Route::get('warehouse/event/{id}', 'WarehouseController@view_event')->middleware('userpermission:1');
        //Route::get('order_plan/create','OrderPlanController@getAddress');
        //Route::get('order_plan/edit','OrderPlanController@getAddress');
        Route::get('order_plan/create/{id}','OrderPlanController@getAddress');
        Route::post('get_address','OrderPlanController@getAddress');
        Route::post('get_address','OrderPlanController@get_address');
        Route::post('assignDriver', 'VehiclesController@assign_driver');
        Route::resource('/work_order', 'WorkOrdersController')->middleware('userpermission:7');
        Route::resource('/order_plan', 'OrderPlanController')->middleware('userpermission:0');
        Route::resource('/pickup_bytransport', 'PickupbyTransportController')->middleware('userpermission:7');
        Route::resource('/delivery_order', 'DeliveryOrderController')->middleware('userpermission:7');
        //Route::resource('/order_plan2', 'OrderPlanController')->middleware('userpermission:7');
        Route::resource('/vendors', 'VendorController')->middleware('userpermission:6');
        Route::resource('/fuel', 'FuelController')->middleware('userpermission:5');
        Route::resource('/drivers', 'DriversController')->middleware('userpermission:0');
        Route::resource('/parts', 'PartsController')->middleware('userpermission:14');
        Route::resource('/vehicles', 'VehiclesController')->middleware('userpermission:1');
        Route::resource('/bookings', 'BookingsController')->middleware('userpermission:3');
        Route::post('/prev-address', 'BookingsController@prev_address');
        Route::get('print/{id}', 'BookingsController@print')->middleware('userpermission:3');
        Route::resource('/acquisition', 'AcquisitionController');
        Route::resource('/income', 'Income')->middleware('userpermission:2');
        Route::resource('/settings', 'SettingsController')->middleware('userpermission:S');
        Route::resource('/customers', 'CustomersController')->middleware('userpermission:0');
        Route::resource('/clocation', 'CustomerLocationController')->middleware('userpermission:0');
        Route::resource('/trailers', 'TrailersController')->middleware('userpermission:0');
        Route::resource('/transporter', 'TransporterController')->middleware('userpermission:0');
        Route::resource('/trucks', 'TrucksController')->middleware('userpermission:0');
        Route::resource('/product', 'ProductController')->middleware('userpermission:0');
        Route::resource('/customers', 'CustomersController')->middleware('userpermission:0');
        Route::resource('/depo', 'DepoController')->middleware('userpermission:0');
        Route::resource('/warehouse', 'WarehouseController')->middleware('userpermission:0');
        Route::resource('/expense', 'ExpenseController')->middleware('userpermission:2');
        Route::resource('/expensecategories', 'ExpenseCategories')->middleware('userpermission:S');
        Route::resource('/incomecategories', 'IncomeCategories')->middleware('userpermission:S');
        Route::get('/bookings/complete/{id}', 'BookingsController@complete')->middleware('userpermission:3');
        Route::get('/bookings/receipt/{id}', 'BookingsController@receipt')->middleware('userpermission:3');
        Route::get('/bookings/payment/{id}', 'BookingsController@payment')->middleware('userpermission:3');
        Route::get("/reports/monthly", "ReportsController@monthly")->name("reports.monthly")->middleware('userpermission:4');
        Route::get("/reports/vendors", "ReportsController@vendors")->name("reports.vendors")->middleware('userpermission:4');
        Route::post("/reports/vendors", "ReportsController@vendors_post")->name("reports.vendors")->middleware('userpermission:4');
        Route::get("reports/drivers", "ReportsController@drivers")->name("reports.drivers")->middleware('userpermission:4');
        Route::post("reports/drivers", "ReportsController@drivers_post")->name("reports.drivers")->middleware('userpermission:4');
        Route::get("reports/customers", "ReportsController@customers")->name("reports.customers")->middleware('userpermission:4');
        Route::post("reports/customers", "ReportsController@customers_post")->name("reports.customers")->middleware('userpermission:4');
        Route::get("/reports/booking", "ReportsController@booking")->name("reports.booking")->middleware('userpermission:4');
        Route::get("/reports/delinquent", "ReportsController@delinquent")->name("reports.delinquent")->middleware('userpermission:4');
        Route::get("/reports/users", "ReportsController@users")->name("reports.users")->middleware('userpermission:4');
        Route::post("/reports/users", "ReportsController@users_post")->name("reports.users")->middleware('userpermission:4');
        Route::get('/calendar', 'BookingsController@calendar');
        Route::get('/calendar/event/{id}', 'BookingsController@calendar_event');
        Route::get("/drivers/enable/{id}", 'DriversController@enable');
        Route::get("/drivers/disable/{id}", 'DriversController@disable');
        Route::get("/reports/vehicle", "ReportsController@vehicle")->name("reports.vehicle");
        Route::post("/reports/booking", "ReportsController@booking_post")->name("reports.booking")->middleware('userpermission:4');
        Route::post("/reports/fuel", "ReportsController@fuel_post")->name("reports.fuel")->middleware('userpermission:4');
        Route::get("/reports/fuel", "ReportsController@fuel")->name("reports.fuel")->middleware('userpermission:4');
        Route::get("/reports/yearly", "ReportsController@yearly")->name("reports.yearly")->middleware('userpermission:4');
        Route::post("/reports/yearly", "ReportsController@yearly_post")->name("reports.yearly")->middleware('userpermission:4');

        Route::post('/customer/ajax_save', 'CustomersController@ajax_store')->name('customers.ajax_store');
        Route::get("/bookings_calendar", 'BookingsController@calendar_view')->name("bookings.calendar")->middleware('userpermission:3');
        Route::get('/calendar/event/calendar/{id}', 'BookingsController@calendar_event');
        Route::get('/calendar/event/service/{id}', 'BookingsController@service_view');
        Route::get('/calendar', 'BookingsController@calendar');
        Route::post('/get_driver', 'BookingsController@get_driver');
        Route::post('/get_vehicle', 'BookingsController@get_vehicle');
        Route::post('/bookings/complete', 'BookingsController@complete_post')->name("bookings.complete");
        Route::get('/bookings/complete', 'BookingsController@complete_post')->name("bookings.complete")->middleware('userpermission:3');

        Route::post("/reports/monthly", "ReportsController@monthly_post")->name("reports.monthly")->middleware('userpermission:4');
        Route::post("/reports/booking", "ReportsController@booking_post")->name("reports.booking")->middleware('userpermission:4');
        Route::post("/reports/delinquent", "ReportsController@delinquent_post")->name("reports.delinquent")->middleware('userpermission:4');
        Route::get("/send-email", "SettingsController@send_email")->middleware('userpermission:S');
        Route::post("/email-settings", "SettingsController@email_settings")->middleware('userpermission:S');
        Route::post('enable-mail', 'SettingsController@enable_mail')->middleware('userpermission:S');
        Route::get("/set-email", "SettingsController@set_email")->middleware('userpermission:S');
        Route::post("/set-content/{type}", "SettingsController@set_content")->middleware('userpermission:S');

        Route::get('ajax-api-store/{api}', 'SettingsController@ajax_api_store');

        Route::get('payment-settings', 'SettingsController@payment_settings');
        Route::post('payment-settings', 'SettingsController@payment_settings_post');
    });

    Route::group(['middleware' => ['lang_check', 'auth']], function () {
        Route::post('delete-notes', 'NotesController@bulk_delete');
        Route::get('changepassword/{id}', 'UtilityController@change');
        Route::post('changepassword/{id}', 'UtilityController@change_post');
        Route::get('/change-details/{id}', 'UtilityController@changepass')->name("changepass");
        Route::post('/change-details/{id}', 'UtilityController@changepassword')->name("changepass");
        Route::post('/change_password', 'UtilityController@password_change');
        Route::get('/vehicle_notification/{type}', 'NotificationController@vehicle_notification');
        Route::resource('/notes', 'NotesController')->middleware('userpermission:8');
        Route::get('driver_notification/{type}', 'NotificationController@driver_notification');
        Route::get('/reminder/{type}', 'NotificationController@service_reminder');
        Route::get('/my_bookings', 'DriversController@my_bookings')->name('my_bookings');

// driver reports
        Route::get("/driver-reports/yearly", "DriversController@yearly")->name("dreports.yearly");
        Route::post("/driver-reports/yearly", "DriversController@yearly_post")->name("dreports.yearly");
        Route::get("/driver-reports/monthly", "DriversController@monthly")->name("dreports.monthly");
        Route::post("/driver-reports/monthly", "DriversController@monthly_post")->name("dreports.monthly");
        Route::get('/addresses', 'AddressController@index');

        Route::resource('/cancel-reason', 'ReasonController')->middleware('userpermission:3');
    });

    Route::group(['middleware' => ['lang_check', 'auth', 'superadmin']], function () {
        Route::resource('/users', 'UsersController')->middleware('userpermission:0');
    });
});
