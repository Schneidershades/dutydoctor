<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::group(['prefix' => 'user', 'namespace' => 'Api\User'], function () {
        Route::post('register', 'UserController@register')->name('user-register');
        Route::post('login', 'UserController@login')->name('user-login');
        Route::post('logout', 'UserController@logout')->name('user-logout');
        Route::post('profile', 'UserController@update')->name('user-update');
        Route::get('profile', 'UserController@profile')->name('user-profile');

        // Route::get('check-email/{email}', 'UserController@checkEmail')->name('user-check-email');
        // Route::get('check-phone/{phone}', 'UserController@checkPhone')->name('user-check-phone');

        // Route::get('reset-email/{email}', 'UserController@resetEmail')->name('user-reset-email');
        // Route::get('reset-phone/{phone}', 'UserController@resetPhone')->name('user-reset-phone');

        // Route::get('wallet', 'WalletController')->name('user-wallet');
        // Route::get('payment-transactions', 'PaymentTransactionController')->name('user-payment-transactions');

        // Route::get('referral', 'PaymentTransactionController')->name('user-payment-transactions');
    });

    // Route::group(['namespace' => 'Api\Consultation'], function () {
    //     Route::get('consultations', 'ConsultationController')->name('consultations');
    //     Route::get('consultations/{id}/start', 'ConsultationController')->name('consultations.start');
    //     Route::get('consultations/{id}/end', 'ConsultationController')->name('consultations.end');
    // });

    // Route::group(['namespace' => 'Api\Professional'], function () {
    //     Route::get('professional/{id}/reviews', 'ProfessionalController');
    //     Route::get('professional/{id}/review/{review-id}', 'ProfessionalController');

    //     Route::get('professional/{id}/appointments', 'ProfessionalController');
    //     Route::get('professional/{id}/patients', 'ProfessionalController');

    //     Route::get('professional/{id}/appointment/{appointment-id}', 'ProfessionalController');
    //     Route::post('professional/{id}/appointment/{appointment-id}', 'ProfessionalController');
    //     Route::delete('professional/{id}/appointment/{appointment-id}', 'ProfessionalController');
    // });

    Route::group(['prefix' => 'general', 'namespace' => 'Api\General'], function () {
        Route::Resource('general-accreditations', 'AccreditationController');
        Route::Resource('general-facilities', 'FacilityController');
        Route::Resource('general-offerings', 'OfferingController');
        Route::Resource('general-offerings-in-category', 'OfferingInCategoryController');
        Route::Resource('general-product-offerings', 'ProductOfferingController');
        Route::Resource('general-service-offerings', 'ServiceOfferingController');
    });

    Route::group(['prefix' => 'customer', 'namespace' => 'Api\General'], function () {
        Route::Resource('customer-profile', 'CustomerController');
        Route::Resource('customer-service-requests', 'ServiceRequestController');
        Route::Resource('customer-depandants', 'DependantController');
        Route::Resource('customer-invoices', 'InvoiceController');
    });

    Route::group(['prefix' => 'facility', 'namespace' => 'Api\Facility'], function () {
        Route::Resource('facility-profile', 'FacilityController');
        Route::Resource('facility-location', 'FacilityLocationController');
        Route::Resource('facility-product-offerings', 'FacilityProductOfferingController');
        Route::Resource('facility-professionals', 'FacilityProfessionalController');
        Route::Resource('facility-service-availability', 'FacilityServiceAvailabilityController');
        Route::Resource('facility-service-offerings', 'FacilityServiceOfferingController');
        Route::Resource('facility-user', 'FacilityUserController');
    });

    Route::group(['prefix' => 'professional', 'namespace' => 'Api\Professional'], function () {
        Route::Resource('professional-profile', 'ProfessionalContoller');
        Route::Resource('professional-facility-location', 'ProfessionalServiceAvailabilityController');
        Route::Resource('professional-service-offerings', 'ProfessionalServiceOfferingController');
    });

    Route::group(['prefix' => 'general', 'namespace' => 'Api\Content'], function () {
        Route::Resource('news', 'NewsController');
        Route::Resource('faqs', 'FaqController');
    });

});