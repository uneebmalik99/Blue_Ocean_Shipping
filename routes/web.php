<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LockController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StickyController;
use App\Http\Controllers\MasterTowing;
use App\Http\Controllers\ShipmentRateController;
use App\Http\Controllers\MasterTowingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pdfController;

Auth::routes();

Route::prefix('/admin')->middleware('auth')->group(function () {
    //Home
    Route::get('/', [HomeController::class, 'index']);
    // User Routes
    Route::get('/users', [UserController::class, 'index'])->name('user.list');
    Route::post('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/edit/{id?}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/edit/{id?}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/users/delete/{id?}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/users/profile/{id?}', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/users/updateprofile', [UserController::class, 'updateprofile'])->name('user.updateprofile');
    Route::get('/users/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/users/pagination', [UserController::class, 'search'])->name('user.pagination');
    Route::get('/users/createRole', [App\Http\Controllers\UserController::class, 'createRole'])->name('user.createRole');

    Route::get('/users/createroles', [App\Http\Controllers\UserController::class, 'createroles'])->name('user.createroles');

    Route::post('/users/addRoles', [App\Http\Controllers\UserController::class, 'addRoles'])->name('user.addRole');

    Route::get('/users/deleteRole/{id?}', [App\Http\Controllers\UserController::class, 'deleteRole'])->name('delete.role');

    Route::post('/users/showupdatemodel}', [App\Http\Controllers\UserController::class, 'showUpdateRole'])->name('user.updatemodelshow');
    Route::post('/users/addUsers', [App\Http\Controllers\UserController::class, 'addUsers'])->name('user.addUser');

    Route::get('/users/editUser',[App\Http\Controllers\UserController::class,'showUpdateUser'])->name('user.edituser');
    Route::post("/users/assignRoles",[App\Http\Controllers\UserController::class,'assignRole'])->name('user.assignrole');
    Route::post("/users/dismissrole",[App\Http\Controllers\UserController::class,'dismissrole'])->name('user.dismissrole');
    Route::post("/users/assignRoute",[App\Http\Controllers\UserController::class,'assignroute'])->name('user.assignroute');
    Route::post("/users/dismissroute",[App\Http\Controllers\UserController::class,'dismissroute'])->name('user.dismissroute');
    Route::get('/users/deleteRole/{id?}', [App\Http\Controllers\UserController::class, 'deleteRole'])->name('delete.role');

    Route::post('/users/showupdatemodel}', [App\Http\Controllers\UserController::class, 'showUpdateRole'])->name('user.updatemodelshow');
    Route::get('/user/allpermissions',[App\Http\Controllers\UserController::class,'permissions'])->name('user.allpermissions');
    Route::get('/user/allroles',[App\Http\Controllers\UserController::class,'roles'])->name('user.allroles');


 Route::get('/users/createUser',[App\Http\Controllers\UserController::class,'createUser'])->name('user.createUser');

    // Customer Routes
    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.list');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customers/create/general_customer', [CustomerController::class, 'general_create'])->name('customer.general_create');
    Route::post('/customers/create/billing_customer', [CustomerController::class, 'general_create'])->name('customer.billing_create');
    Route::post('/customers/create/shipper_customer', [CustomerController::class, 'general_create'])->name('customer.shipper_create');
    Route::post('/customers/create/quotation_customer', [CustomerController::class, 'general_create'])->name('customer.quotation_create');
    Route::get('/customers/edit/{id?}',                 [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customers/edit/{id?}',                [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customers/update/{id?}',               [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customers/delete/{id?}',               [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customers/profile/{id?}',              [CustomerController::class, 'profile'])->name('customer.profile');
    Route::get('/customers/profile_tab',                [CustomerController::class, 'profile_tab'])->name('customer.profile_tab');
    Route::get('/customers/search',                     [CustomerController::class, 'search'])->name('customer.search');
    Route::get('/customers/pagination',                 [CustomerController::class, 'search'])->name('customer.pagination');
    Route::get('/customers/export',                     [CustomerController::class, 'export'])->name('customer.export');
    Route::get('/customer/changeStatus/{id?}',          [CustomerController::class, 'ChangeStatus'])->name('customer.changeStatus');
    Route::post('/customer/filterTable',                [App\Http\Controllers\CustomerController::class, 'FilterTable'])->name('customer.FilterTable');

    Route::post('/customer/changeNotification', [App\Http\Controllers\CustomerController::class, 'changeNotification'])->name('customer.changeNotification');

    Route::post('/customer/update', [App\Http\Controllers\CustomerController::class, 'customerUpdate'])->name('customers.update');

    Route::post('/customer/changeNotification', [App\Http\Controllers\CustomerController::class, 'changeNotification'])->name('customer.changeNotification');

    Route::post('/customer/update', [App\Http\Controllers\CustomerController::class, 'customerUpdate'])->name('customers.update');

    Route::get('/customers/records/{state?}', [CustomerController::class, 'serverside'])->name('customer.records');


    Route::get('/customers/changeState/{state?}', [CustomerController::class, 'changeState'])->name('customer.changeState');


    //Vehicle Routes
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle.list');
    // Route::post('/vehicles',                            [VehicleController::class, 'createPost'])->name('vehicle.listpost');
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles/create_form', [VehicleController::class, 'create_form'])->name('vehicle.form');
    // Route::get('/vehicles/attachments', [VehicleController::class, 'attachments'])->name('vehicle.attachments');
    Route::post('/vehicles/create', [VehicleController::class, 'create'])->name('vehicle.create');
    // Route::get('/vehicles/edit/{id?}',                  [VehicleController::class, 'edit'])->name('vehicle.edit');
    // Route::post('/vehicles/edit/{id?}',                 [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::get('/vehicles/delete/{id?}',                [VehicleController::class, 'delete'])->name('vehicle.delete');
    Route::get('/vehicles/update/{id?}',                [VehicleController::class, 'edit'])->name('vehicle.edit');

    Route::get('/vehicles/search',                      [VehicleController::class, 'filtering'])->name('vehicle.search');
    Route::get('/vehicles/pagination',                  [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/filtering',                   [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/warehouse',                   [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/year',                        [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/make',                        [VehicleController::class, 'filtering'])->name('vehicle.pagination');
    Route::get('/vehicles/tabs',                        [VehicleController::class, 'filtering'])->name('vehicle.tabs');
    Route::get('/vehicles/location',                    [VehicleController::class, 'filtering'])->name('vehicle.location');
    Route::post('/vehicles/attachments',                [VehicleController::class, 'store_image'])->name('vehicle.images');
    Route::get('/vehicles/export/{id?}',                      [VehicleController::class, 'export'])->name('vehicle.export');
    Route::get('/vehicles/import',                      [VehicleController::class, 'import']);
    Route::post('/vehicles/imports',                    [VehicleController::class, 'import'])->name('vehicle.import');
    Route::post('/vehicle/vehicle_changeImages',        [VehicleController::class, 'changesImages'])->name('vehicle.changeImages');
    // Route::post('/vehicle/vehicle_changeImages',        [VehicleController::class, 'changesImages'])->name('vehicle.changeImages');
    
    Route::get('/vehicle/profile/{id?}',                [VehicleController::class, 'profile'])->name('vehicle.profile');
    
    Route::get('/vehicle/pdf',                          [VehicleController::class, 'createpdf'])->name('vehicle.createpdf');

    Route::get('/vehicle/export/pdf',                   [VehicleController::class, 'exportpdf'])->name('vehicle.exportpdf');

    Route::get('/vehicle/vehicle_informationTab',       [VehicleController::class, 'profile_tab'])->name('customer.profile_tab');
    
    Route::get('/vehicle/records',       [VehicleController::class, 'serverside'])->name('vehicle.records');
    Route::post('/vehicle/fetchVehciles',       [VehicleController::class, 'fetchVehicles'])->name('vehicle.fetchVehicles');

    Route::post('/vehicle/SelectedDelete',       [VehicleController::class, 'SelectedDelete'])->name('Vehicle.SelectedDelete');


    Route::post('/vehicle/FetchModel',       [VehicleController::class, 'FetchModel'])->name('vehicle.FetchModel');

    Route::post('/vehicle/getbuyerids',       [VehicleController::class, 'getbuyersids'])->name('vehicles.get_buyerids');


    Route::post('/vehicle/assignToCustomer',       [VehicleController::class, 'assignToCustomer'])->name('vehicle.assignToCustomer');


    Route::post('/vehicle/addToCart',       [VehicleController::class, 'AddToCart'])->name('vehicle.add_to_cart');


    Route::get('/vehicle/changeState/{state?}',       [VehicleController::class, 'changeState'])->name('vehicle.changeState');



    //Sticky Notes Routes
    Route::get('/stickynotes', [StickyController::class, 'index'])->name('sticky.list');
    Route::post('/stickynotes', [StickyController::class, 'create'])->name('sticky.create');

    // Shipment Routes
    Route::get('/shipment', [ShipmentController::class, 'index'])->name('shipment.list');
    Route::get('/shipments/create', [ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipments/create', [ShipmentController::class, 'create'])->name('shipment.create');
    Route::post('/shipments/general', [ShipmentController::class, 'create_form'])->name('shipment.createform');
    Route::get('/shipments/profile/{id?}', [ShipmentController::class, 'profile'])->name('shipment.profile');
    Route::get('/shipments/delete/{id?}', [ShipmentController::class, 'delete'])->name('shipment.delete');

    Route::post('/shipments/edit', [ShipmentController::class, 'edit'])->name('shipments.edit');

    Route::post('/shipments/addtoshipment', [ShipmentController::class, 'addtoshipment'])->name('shipments.addtoshipment');


    Route::get('/shipments/filtering', [ShipmentController::class, 'filtering'])->name('shipment.filter');
    Route::get('/shipments/records/{state?}', [ShipmentController::class, 'serverside'])->name('shipments.records');

    Route::get('/shipments/FetchStatusRecords', [ShipmentController::class, 'FetchStatusRecords'])->name('shipments.FetchStatusRecords');


    Route::post('/shipment/create_images', [ShipmentController::class, 'create_images'])->name('shipments.create_images');
    Route::post('/shipments/filterShipment', [ShipmentController::class, 'filterShipmentt'])->name('shipments.filter');
    Route::post('/shipments/search_shipment', [ShipmentController::class, 'search_shipment'])->name('shipments.search_shipment');
    Route::post('/shipments/fetch_state', [ShipmentController::class, 'FetchState'])->name('shipments.FetchState');
    Route::post('/shipments/fetch_port', [ShipmentController::class, 'FetchPort'])->name('shipments.FetchPort');
    Route::post('/shipments/fetch_terminal', [ShipmentController::class, 'FetchTerminal'])->name('shipments.FetchTerminal');
    Route::post('/shipments/fetch_vehicles', [ShipmentController::class, 'add_vehicles'])->name('shipments.add_vehicles');


    Route::get('/shipment/shipment_informationTab',       [ShipmentController::class, 'profile_tab'])->name('shipment.profile_tab');



    Route::post('/shipment/vehicle_deleteFromCart',       [ShipmentController::class, 'deleteFromCart'])->name('shipment.deleteFromCart');

    Route::get('/shipment/export',                     [ShipmentController::class, 'export'])->name('shipment.export');


    Route::get('/shipment/changeState/{state?}',                     [ShipmentController::class, 'changeState'])->name('shipment.changeState');



    Route::post('/invoice/fetchShipment',                     [InvoiceController::class, 'fetchShipment'])->name('invoice.shipments');

    Route::post('/invoice/saveData',                     [InvoiceController::class, 'saveInovice'])->name('inovice.save');

    Route::get('/invoice/records', [InvoiceController::class, 'serverside'])->name('invoice.records');


    // destination countries 
    Route::post('/shipments/fetchdestinationstate', [ShipmentController::class, 'FetchDestiState'])->name('shipments.FetachDestiState');

    Route::post('/shipments/fetchdestinationport', [ShipmentController::class, 'FetchDestiPort'])->name('shipments.FetachDestiPort');

    Route::post('/shipments/fetchdestinationterminal', [ShipmentController::class, 'FetchDestiTerminal'])->name('shipments.FetachDestiTerminal');

    Route::post('/shipments/customer_details', [ShipmentController::class, 'Customer_Details'])->name('shipments.customer_details');



    Route::get('/shipment_detail/shipment_Hazard_pdf', [pdfController::class, 'shipmentview'])->name('shipment_detail.shipment_Hazard_pdf');

    Route::get('/shipment_detail/shipment_Houston_pdf', [pdfController::class, 'shipmentHouston'])->name('shipment_detail.shipment_Houston_pdf');

    Route::get('/shipment_detail/shipment_Landing_pdf', [pdfController::class, 'shipmentLanding'])->name('shipment_detail.shipment_Landing_pdf');

    Route::get('/shipment_detail/shipment_Custom_pdf', [pdfController::class, 'shipmentCustom'])->name('shipment_detail.shipment_Custom_pdf');

    Route::get('/shipment_detail/shipment_Dock_pdf', [pdfController::class, 'shipmentDock'])->name('shipment_detail.shipment_Dock_pdf');   


    //Notification Routes`
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notification.list');
    Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notification.create');
    Route::post('/notifications/create', [NotificationController::class, 'create'])->name('notification.creates');
    Route::get('/notifications/del/{id}', [NotificationController::class, 'del'])->name('notification.del');
    Route::post('/notifications/updaterecord', [NotificationController::class, 'update_record'])->name('notification_update');
    Route::post('/notifications/searchrecord', [NotificationController::class, 'search_record'])->name('notification_search');
    Route::get('/notifications/status', [NotificationController::class, 'status'])->name('notification.status');

    // Lock screen Routes
    // Route::get('/lock', [LockController::class, 'lockScreen'])->name('lock');
    // Route::post('/unlock', [LockController::class, 'unlock'])->name('unlock');

    Route::get('/lock', [App\Http\Controllers\Auth\LoginController::class, 'locked'])->name('lock');
    Route::post('/unlock', [App\Http\Controllers\Auth\LoginController::class, 'unlock'])->name('unlock');

    
    // Tickets Routes
    Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.list');

    // Master Routes
    Route::get('/importVehicles',                           [MasterController::class, 'importVehicles'])->name('importVehicles.list');


    Route::get('/master',                               [MasterController::class, 'index'])->name('master.list');
    Route::post('/make',                                [MasterController::class, 'make'])->name('make.list');
    Route::post('/add_make',                            [MasterController::class, 'add_make'])->name('add.make');
    Route::post('/delete_master',                       [MasterController::class, 'delete_master'])->name('master.delete');
    Route::post('/update_master',                       [MasterController::class, 'update_master'])->name('update.master');
    Route::post('/update_save',                         [MasterController::class, 'update_save'])->name('update.save');
    Route::post('/master_status',                       [MasterController::class, 'master_status'])->name('master.status');
    Route::post('/show/model',                          [MasterController::class, 'master_seriesadd'])->name('master.seriesadd');
    Route::post('/openpopup',                           [MasterController::class, 'showmodel'])->name('master.showmodel');
    Route::post('/save/record',                         [MasterController::class, 'save'])->name('master.save');
    Route::get('/companies',                           [MasterController::class, 'companiesshow'])->name('master.companies');
    Route::get('/color',                               [MasterController::class, 'colorshow'])->name('master.color');
    Route::get('/title',                               [MasterController::class, 'titleshow'])->name('master.title');
    Route::get('/title/types',                         [MasterController::class, 'titletypeshow'])->name('master.titletypes');
    Route::get('/key',                                 [MasterController::class, 'keyshow'])->name('master.key');
    Route::get('/vehicletype',                         [MasterController::class, 'vehicletypeshow'])->name('master.vehicletype');
    Route::get('/auction',                             [MasterController::class, 'auctionshow'])->name('master.auction');
    Route::get('/Total/Vehicles',                      [MasterController::class, 'no_ofvehicleshow'])->name('master.vehicle');
    Route::get('/shipment/status',                     [MasterController::class, 'shipmentstatusshow'])->name('master.shipmentstatus');
    Route::get('/shipping/lines',                      [MasterController::class, 'shipmentlinesshow'])->name('master.shipmentlines');
    Route::get('/container/type',                      [MasterController::class, 'containertypeshow'])->name('master.containertype');
    Route::get('/container/size',                      [MasterController::class, 'containersizeshow'])->name('master.containersize');
    Route::get('/shippername',                         [MasterController::class, 'shippernameshow'])->name('master.shippername');
    Route::get('/vehiclestatus',                       [MasterController::class, 'vehiclestatushow'])->name('master.vehiclestatus');
    Route::get('/pickuplocation',                      [MasterController::class, 'pickuplocationshow'])->name('master.pickuplocation');
    Route::get('/site',                                [MasterController::class, 'siteshow'])->name('master.site');
    Route::get('/warehouse',                           [MasterController::class, 'warehouseshow'])->name('master.warehouse');
    Route::get('/shipment/types',                      [MasterController::class, 'shipmenttypeshow'])->name('master.shipmenttype');
    Route::get('/loading/country',                     [MasterController::class, 'loadingcountryshow'])->name('master.loadingcountry');
    Route::get('/destination/country',                 [MasterController::class, 'destinationcountryshow'])->name('master.destinationcountry');
    Route::get('/vehicle',                             [MasterController::class, 'mmsshow'])->name('master.mms');






    // master towing page routes 

    Route::post('/master/towing/saveupdate',           [MasterTowingController::class, 'update_save'])->name('updatesave.towingrate');

    Route::get('/master/towing',                       [MasterTowingController::class, 'index'])->name('master.towing');
    Route::post('/master/towing/save',                 [MasterTowingController::class, 'save'])->name('save.towingrate');
    Route::post('/master/towing/delete',               [MasterTowingController::class, 'delete'])->name('delete.towingrate');
    Route::post('/master/towing/status',               [MasterTowingController::class, 'changestatus'])->name('towingrate.status');
    Route::post('/master/towing/showmodel',            [MasterTowingController::class, 'show_model'])->name('towing_rate.showmodel');

    // master shipment rate page routes
    Route::get('/shipment/rate',                       [ShipmentRateController::class, 'index'])->name('shipment.rate');

    Route::post('/shipment/rate/save',                 [ShipmentRateController::class, 'save'])->name('save.shipmentrate');
    Route::post('/master/shipment/delete',             [ShipmentRateController::class, 'delete'])->name('delete.shipmentrate');
    Route::post('/master/shipment/status',             [ShipmentRateController::class, 'changestatus'])->name('shipmentrate.status');
    Route::post('/master/shipment/showmodel',          [ShipmentRateController::class, 'show_model'])->name('shipment_rate.showmodel');
    Route::post('/master/shipment/update',             [ShipmentRateController::class, 'update_save'])->name('updatesave.shipmentrate');





    // Calendar Routes
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.list');

    //  Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.list');

    Route::get('/dashboard/changeState/{state?}', [DashboardController::class, 'changeState'])->name('dashboard.changeState');


    Route::get('/inventory',                            function(){return "Coming Soon!";});
    //Inventory
    Route::get('/invoice',                              [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoices/create',                      [InvoiceController::class, 'create_invoice'])->name('invoice.create');
    Route::get('/invoices/edit/{id?}',                      [InvoiceController::class, 'create_invoice'])->name('invoice.edit');

    Route::post('/invoices/create',                      [InvoiceController::class, 'create'])->name('invoice.post_create');

    Route::get('/invoices/update/{id?}',                      [InvoiceController::class, 'update'])->name('invoice.get_update');
    Route::post('/invoices/update/{id?}',                     [InvoiceController::class, 'update'])->name('invoice.post_update');

    Route::get('/invoices/delete/{id?}',                     [InvoiceController::class, 'delete'])->name('invoice.get_delete');
    
    // Route::get('/invoices/pdf', function(){
    //     return view('invoice/pdf');
    //     });
        Route::get('/invoices/pdf_files/{id?}',                     [pdfController::class, 'generatePDF'])->name('pdf_files');

    Route::get('/invoices/detail_data/{id?}',                     [pdfController::class, 'detail_data'])->name('invoice.detail_data');

    Route::get('/invoices/detail_page', function(){
        return view('invoice/detail_page');
        });
    Route::get('/invoices/detail_page/{id?}',                     [DetailController::class, 'detail_page'])->name('invoice.detail_page');
    Route::get('/invoices/pdf', function(){
        return view('invoice/pdf');
        });
        
    Route::get('/generate-pdf/{id?}',                     [pdfController::class, 'generatePDF'])->name('generatePDF');

    


});

Route::get('/logout', [HomeController::class, 'logout'])->middleware('auth')->name('auth.logout');
