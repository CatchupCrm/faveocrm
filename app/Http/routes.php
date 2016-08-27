<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {
  Route::auth();
});

Route::group(['middleware' => ['web', 'auth']], function () {

  Route::get('dashboard', 'PagesController@dashboard')->name('dashboard');

  //  Get Data for the jsons for the DataTables
  Route::get('relations/data', 'RelationsController@anyData')->name('relations.data');
  Route::get('tickets/data', 'TicketsController@anyData')->name('tickets.data');
  Route::get('leads/data', 'LeadsController@anyData')->name('leads.data');
  Route::get('invoices/data', 'LeadsController@anyData')->name('invoices.data');
  Route::get('documents/data', 'LeadsController@anyData')->name('documents.data');

  Route::get('notifications/data', 'LeadsController@anyData')->name('notifications.data');
  Route::get('mailboxes/data', 'LeadsController@anyData')->name('mailboxes.data');
  Route::get('emails/data', 'LeadsController@anyData')->name('emails.data');
  Route::get('roles/data', 'LeadsController@anyData')->name('roles.data');
  Route::get('departments/data', 'LeadsController@anyData')->name('departments.data');
  Route::get('users/data', 'LeadsController@anyData')->name('users.data');
  Route::get('permissions/data', 'LeadsController@anyData')->name('permissions.data');

  Route::resource('relations', 'RelationsController');
  Route::post('relations/create/cvrapi', 'RelationsController@cvrapiStart');
  Route::post('relations/upload/{id}', 'DocumentsController@upload');

  Route::resource('leads', 'LeadsController');
  Route::patch('leads/updateassign/{id}', 'LeadsController@updateAssign');
  Route::post('leads/notes/{id}', 'NotesController@store');
  Route::patch('leads/updatestatus/{id}', 'LeadsController@updateStatus');
  Route::patch('leads/updatefollowup/{id}', 'LeadsController@updateFollowup')->name('leads.followup');

  Route::resource('tickets', 'TicketsController');
  Route::patch('tickets/updatestatus/{id}', 'TicketsController@updateStatus');
  Route::patch('tickets/updateassign/{id}', 'TicketsController@updateAssign');
  Route::post('tickets/updatetime/{id}', 'TicketsController@updateTime');
  Route::post('tickets/invoice/{id}', 'TicketsController@invoice');
  Route::post('tickets/comments/{id}', 'CommentController@store');

  //Notifications
  Route::get('notifications/getall', 'NotificationsController@getAll')->name('notifications.get');
  Route::post('notifications/markread', 'NotificationsController@markRead');
  Route::get('notifications/markall', 'NotificationsController@markAll');

  Route::get('settings', 'SettingsController@index')->name('settings.index');
  Route::patch('settings/permissionsUpdate', 'SettingsController@permissionsUpdate');
  Route::post('settings/stripe', 'SettingsController@stripe');
  Route::patch('settings/overall', 'SettingsController@updateOverall');

  Route::resource('departments', 'DepartmentsController');

  Route::resource('roles', 'RolesController');

  Route::resource('integrations', 'IntegrationsController');

  Route::resource('invoices', 'InvoicesController');

  Route::post('invoice/updatepayment/{id}', 'InvoicesController@updatePayment')->name('invoice.payment.date');
  Route::post('invoice/reopenpayment/{id}', 'InvoicesController@reopenPayment')->name('invoice.payment.reopen');
  Route::post('invoice/sentinvoice/{id}', 'InvoicesController@updateSentStatus')->name('invoice.sent');
  Route::post('invoice/reopensentinvoice/{id}', 'InvoicesController@updateSentReopen')->name('invoice.sent.reopen');
  Route::post('invoice/newitem/{id}', 'InvoicesController@newItem')->name('invoice.new.item');

  Route::get('documents/import', 'DocumentsController@import');

  Route::resource('users', 'UsersController');
  Route::get('users/data', 'UsersController@anyData')->name('users.data');
  Route::get('users/ticketdata/{id}', 'UsersController@ticketData')->name('users.ticketdata');
  Route::get('users/closedticketdata/{id}', 'UsersController@closedTaskData')->name('users.closedticketdata');
  Route::get('users/relationdata/{id}', 'UsersController@relationData')->name('users.relationdata');


  Route::get('/', 'PagesController@dashboard');
});
