<?php

use App\Events\Notification;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', 'PagesController@index');

    Route::auth();

    Route::get('/home', 'DashboardController@index');

    //User Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', array('uses' => 'ProfileController@index'));
        Route::get('edit', array('uses' => 'ProfileController@edit'));
        Route::patch('edit', array('uses' => 'ProfileController@update'));
    });

    //Confirmations
    Route::group(['prefix' => 'confirmation'], function () {
        Route::get('/', array('uses' => 'Auth\ConfirmationController@index'));
        Route::get('send/{type}', array('uses' => 'Auth\ConfirmationController@send'));
        Route::get('phone', array('uses' => 'Auth\ConfirmationController@submitPhoneCode'));
        Route::post('phone', array('uses' => 'Auth\ConfirmationController@handlePhoneCode'));
        Route::get('mail/{code}', array('uses' => 'Auth\ConfirmationController@confirmMailCode'));
    });

    //Organization
    Route::group(['prefix' => 'organization'], function () {
        Route::get('/', array('uses' => 'OrganizationController@index'));
        Route::get('/create', array('uses' => 'OrganizationController@create'));
        Route::post('/', array('uses' => 'OrganizationController@store'));
        Route::get('edit', array('uses' => 'OrganizationController@edit'));
        Route::patch('edit', array('uses' => 'OrganizationController@update'));

        Route::get('/subscriptions', array('uses' => 'OrganizationController@subscriptions'));

    });

    //Organization
    Route::group(['prefix' => 'virtualdesktop'], function () {

        Route::get('users', array('uses' => 'OsjsUsersController@index'));
        Route::get('users/create', array('uses' => 'OsjsUsersController@create'));
        Route::post('users', array('uses' => 'OsjsUsersController@store'));
        Route::get('users/{id}', array('uses' => 'OsjsUsersController@show'));
        Route::get('users/{id}/edit', array('uses' => 'OsjsUsersController@edit'));
        Route::patch('users/{id}/edit', array('uses' => 'OsjsUsersController@update'));
        Route::delete('users/{id}', array('uses' => 'OsjsUsersController@destroy'));

        Route::get('groups', array('uses' => 'OsjsGroupsController@index'));
        Route::get('groups/create', array('uses' => 'OsjsGroupsController@create'));
        Route::post('groups', array('uses' => 'OsjsGroupsController@store'));
        Route::get('groups/{id}', array('uses' => 'OsjsGroupsController@show'));
        Route::get('groups/{id}/edit', array('uses' => 'OsjsGroupsController@edit'));
        Route::patch('groups/{id}/edit', array('uses' => 'OsjsGroupsController@update'));
        Route::delete('groups/{id}', array('uses' => 'OsjsGroupsController@destroy'));

        Route::get('manage/groups', array('uses' => 'OsjsUserGroupsController@index'));
        Route::post('manage/groups/add/{idUser}/group/{groupId}', array('uses' => 'OsjsUserGroupsController@addUserToGroup'));
        Route::post('manage/groups/remove/{userId}/group/{groupId}', array('uses' => 'OsjsUserGroupsController@removeUserFromGroup'));

    });

});
