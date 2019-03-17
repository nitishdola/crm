<?php
Route::get('/home', [
    'as' => 'home',
    'middleware' => ['admin'],
    'uses' => 'Admin\AdminController@home'
]);

Route::group(['prefix'=>'agents'], function() {
  Route::get('/', [
      'as' => 'agents.all',
      'middleware' => ['admin'],
      'uses' => 'Agents\AgentUserController@index'
  ]);

  Route::get('/create', [
      'as' => 'agent.create',
      'middleware' => ['admin'],
      'uses' => 'Agents\AgentUserController@create'
  ]);
  Route::post('/store', [
      'as' => 'agent.store',
      'middleware' => ['admin'],
      'uses' => 'Agents\AgentUserController@store'
  ]);
});


Route::group(['prefix'=>'lead'], function() {
  Route::get('/', [
      'as' => 'contacts.all',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@index'
  ]);

  Route::get('/create', [
      'as' => 'contact.create',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@create'
  ]);
  Route::post('/store', [
      'as' => 'contact.store',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@store'
  ]);

  Route::get('/info/{id}', [
      'as' => 'contacts.info',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@getContactInfo'
  ]);

  Route::get('/delete/{id}', [
      'as' => 'contact.delete',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@deleteContact'
  ]);

  Route::get('/edit/{id}', [
      'as' => 'contact.edit',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@editContact'
  ]);

  Route::post('/update/{id}', [
      'as' => 'contact.update',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@updateContact'
  ]);

  Route::get('/trash', [
      'as' => 'contact.trash',
      'middleware' => ['admin'],
      'uses' => 'Contact\ContactsController@viewTrash'
  ]);
});


Route::group(['prefix'=>'api'], function() {
  Route::get('/assign', [
      'as' => 'api.assign.contact',
      'middleware' => ['admin'],
      'uses' => 'REST\APIController@assignContact'
  ]);

  Route::get('/recent-items', [
      'as' => 'api.recent_items',
      'middleware' => ['admin'],
      'uses' => 'REST\APIController@recentItems'
  ]);
});
