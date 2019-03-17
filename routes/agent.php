<?php

Route::get('/home', [
    'as' => 'home',
    'middleware' => ['agent'],
    'uses' => 'Agents\HomeController@home'
]);


Route::get('/calendar', [
    'as' => 'calendar',
    'middleware' => ['agent'],
    'uses' => 'Agents\HomeController@showCalendar'
]);

Route::group(['prefix'=>'contact'], function() {
  Route::get('/info/{id}', [
      'as' => 'contacts.info',
      'middleware' => ['agent'],
      'uses' => 'Agents\ContactsController@details'
  ]);

  Route::get('/create', [
      'as' => 'contacts.create',
      'middleware' => ['agent'],
      'uses' => 'Agents\ContactsController@create'
  ]);


  Route::post('/store', [
      'as' => 'contacts.save',
      'middleware' => ['agent'],
      'uses' => 'Agents\ContactsController@store'
  ]);

  Route::get('/assigned-leads', [
      'as' => 'contacts.assigned',
      'middleware' => ['agent'],
      'uses' => 'Agents\ContactsController@viewAllAssigned'
  ]);

  Route::get('/', [
      'as' => 'contacts.index',
      'middleware' => ['agent'],
      'uses' => 'Agents\ContactsController@viewAllLeadsCreated'
  ]);

});



Route::group(['prefix'=>'referral'], function() {
  Route::get('/info/{id}', [
      'as' => 'referral.info',
      'middleware' => ['agent'],
      'uses' => 'Agents\ReferralsController@details'
  ]);

  Route::get('/create', [
      'as' => 'referral.create',
      'middleware' => ['agent'],
      'uses' => 'Agents\ReferralsController@create'
  ]);

  Route::get('/', [
      'as' => 'referral.index',
      'middleware' => ['agent'],
      'uses' => 'Agents\ReferralsController@index'
  ]);

  Route::post('/store', [
      'as' => 'referral.save',
      'middleware' => ['agent'],
      'uses' => 'Agents\ReferralsController@store'
  ]);

});

Route::group(['prefix'=>'api'], function() {
  Route::get('/recent-items', [
      'as' => 'api.recent_items',
      'middleware' => ['agent'],
      'uses' => 'REST\APIController@recentItemsAgent'
  ]);

  Route::get('/all-events', [
      'as' => 'api.all_events',
      'middleware' => ['agent'],
      'uses' => 'REST\APIController@allEvents'
  ]);
});

Route::group(['prefix'=>'report'], function() {
  Route::get('/all-leads', [
      'as' => 'report.all_leads',
      'middleware' => ['agent'],
      'uses' => 'Agents\ReportsController@allLeads'
  ]);
});
