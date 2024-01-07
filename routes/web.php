<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User\User;
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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Route::get('admin/login','Admin\AdminController@showloginform')->name('admin.login');
    //Route::post('admin/login','Admin\AdminController@login')->name('admin.login.submit');
    //Route::post('admin/logout','Admin\AdminController@logout')->name('admin.logout');

//  ---------------------------------
// | ADMIN PANEL ROUTES              |
//  ---------------------------------
//
//Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => 'adminAuth:admin','as' => 'admin.'], function () {
//
//    Route::get('/','AdminController@index')->name('index');
//
//    //  ---------------------------------
//    // | ADMINS MANAGEMENT               |
//    //  ---------------------------------
//
//    Route::group(['prefix' => 'admins','namespace' => 'Admins','as' => 'admins.'], function () {
//
//        // ----- Admins Management -----
//        Route::group(['prefix' => 'management','as' => 'management.'], function () {
//            Route::get('/', 'ManagementController@index')->name('index');
//            Route::post('/save', 'ManagementController@save')->name('save');
//            Route::put('/save', 'ManagementController@save')->name('save');
//            Route::delete('/destroy/{id}', 'ManagementController@destroy')->name('destroy');
//        });
//
//        // ----- Admins Roles -----
//        Route::group(['prefix' => 'roles','as' => 'roles.'], function () {
//            Route::get('/', 'AdminRoleController@index')->name('index');
//            Route::post('/save', 'AdminRoleController@save')->name('save');
//            Route::put('/save', 'AdminRoleController@save')->name('save');
//            Route::delete('/destroy/{id}', 'AdminRoleController@destroy')->name('destroy');
//        });
//
//        // ----- Admins Permissions -----
//        Route::group(['prefix' => 'permissions','as' => 'permissions.'], function () {
//            Route::get('/', 'AdminPermissionController@index')->name('index');
//            Route::post('/save', 'AdminPermissionController@save')->name('save');
//            Route::put('/save', 'AdminPermissionController@save')->name('save');
//            Route::delete('/destroy/{id}', 'AdminPermissionController@destroy')->name('destroy');
//        });
//    });
//
//    //  ---------------------------------
//    // | USERS MANAGEMENT               |
//    //  ---------------------------------
//
//    Route::group(['prefix' => 'users','namespace' => 'Users','as' => 'users.'], function () {
//
//        // ----- Admins Management -----
//        Route::group(['prefix' => 'management','as' => 'management.'], function () {
//            Route::get('/', 'ManagementController@index')->name('index');
//            Route::post('/save', 'ManagementController@save')->name('save');
//            Route::put('/save', 'ManagementController@save')->name('save');
//            Route::delete('/destroy/{id}', 'ManagementController@destroy')->name('destroy');
//        });
//
//        // ----- Admins Roles -----
//        Route::group(['prefix' => 'roles','as' => 'roles.'], function () {
//            Route::get('/', 'UserRoleController@index')->name('index');
//            Route::post('/save', 'UserRoleController@save')->name('save');
//            Route::put('/save', 'UserRoleController@save')->name('save');
//            Route::delete('/destroy/{id}', 'UserRoleController@destroy')->name('destroy');
//        });
//
//        // ----- Admins Permissions -----
//        Route::group(['prefix' => 'permissions','as' => 'permissions.'], function () {
//            Route::get('/', 'UserPermissionController@index')->name('index');
//            Route::post('/save', 'UserPermissionController@save')->name('save');
//            Route::put('/save', 'UserPermissionController@save')->name('save');
//            Route::delete('/destroy/{id}', 'UserPermissionController@destroy')->name('destroy');
//        });
//    });
//
//    //  ---------------------------------
//    // | SERVICES MANAGEMENT            |
//    //  ---------------------------------
//
//    Route::group(['prefix' => 'services','namespace' => 'Services','as' => 'services.'], function () {
//
//        // ----- Services Management -----
//        Route::group(['prefix' => 'management','as' => 'management.'], function () {
//            Route::get('/', 'ManagementController@index')->name('index');
//            Route::post('/save', 'ManagementController@save')->name('save');
//            Route::put('/save', 'ManagementController@save')->name('save');
//            Route::delete('/destroy/{id}', 'ManagementController@destroy')->name('destroy');
//        });
//
//        // ----- Categories Roles -----
//        Route::group(['prefix' => 'categories','as' => 'categories.'], function () {
//            Route::get('/', 'CategoryController@index')->name('index');
//            Route::post('/save', 'CategoryController@save')->name('save');
//            Route::put('/save', 'CategoryController@save')->name('save');
//            Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('destroy');
//        });
//    });
//
//
//});

Route::group(['prefix' => 'frontend', 'middleware' => 'auth', 'as' => 'frontend.'],function() {
    Route::get('/', function() {
        return redirect()->route('frontend.dashboard');
    });
    Route::get('/dashboard', 'Frontend\User\DashboardController@index')->name('dashboard');
    // ----- services control -----
    Route::group(['prefix' => 'services', 'as' => 'service.'], function() {
        Route::get('/','Frontend\User\ServiceController@index')->name('index'); // show add service form
        Route::get('/create','Frontend\User\ServiceController@create')->name('create'); // show add service form
        Route::post('/create','Frontend\User\ServiceController@store')->name('store'); // POST submit storing service
        Route::get('/edit/{id}','Frontend\User\ServiceController@edit')->name('edit'); // show edit service form
        Route::put('/edit/{id}','Frontend\User\ServiceController@update')->name('update'); // POST submit updating service
        Route::delete('/delete/{id}','Frontend\User\ServiceController@destroy')->name('destroy'); // DELETE request Deletes service
        Route::post('/image/upload', 'Frontend\User\ServiceController@uploadImage')->name('image.upload'); // Post request that uploads one image for a service
    });

    // ----- orders control -----
    Route::group(['prefix' => 'orders', 'as' => 'order.'], function() {
        $orderControllerPath = 'Frontend\User\Order';
        Route::get('/', $orderControllerPath . '\OrderController@index')->name('index'); // list of received orders
        Route::get('/{id}/show',$orderControllerPath . '\OrderController@show')->name('show'); // show order
        Route::post('/{id}/respond',$orderControllerPath . '\OrderController@respond')->name('respond'); // service provider's response to the order
        Route::get('/{id}/deliver',$orderControllerPath . '\OrderController@showDelivery')->name('deliver'); // show order
        Route::post('/{id}/delivery/start',$orderControllerPath . '\OrderController@startDelivery')->name('delivery.start'); // show order
        Route::post('/delivery/upload',$orderControllerPath . '\OrderFileController@store')->name('delivery.upload'); // upload delivery files for the order
        Route::post('/{id}/delivery/uploads-confirm',$orderControllerPath . '\OrderController@confirmDeliveryFiles')->name('delivery.upload.confirm'); // confirm upload delivery files for the order
        Route::post('/{id}/feedback',$orderControllerPath . '\OrderController@feedbackAsClient')->name('feedback-as-client');
        Route::post('/{id}/delivery/feedback',$orderControllerPath . '\OrderController@feedbackAsProvider')->name('feedback-as-provider');
        Route::get('/{id}/resubmission-request',$orderControllerPath . '\OrderController@askForFileResubmission')->name('resubmission-request');
    });

    // ----- payment control -----
    Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function() {
        Route::get('/','Frontend\User\WalletController@index')->name('index'); // list of received orders
        Route::get('/deposit/amount','Frontend\User\WalletController@showDepositAmount')->name('deposit.amount'); // show deposit page
        Route::post('/deposit/payment','Frontend\User\WalletController@showDepositPayment')->name('deposit.payment'); // show payment methods
        Route::post('/deposit/payment/paypal','Frontend\User\PaypalPaymentController@pay')->name('deposit.payment.paypal'); // pay with paypal
        Route::get('/deposit/confirm','Frontend\User\PaypalPaymentController@confirm')->name('deposit.payment.paypal.confirm'); // show deposit page
        Route::get('/withdraw','Frontend\User\WalletController@showWithdraw')->name('withdraw.show'); // show withdraw page
    });

    // ----- messages control -----
    Route::group(['prefix' => 'messages', 'as' => 'message.'], function() {
        Route::get('/','Frontend\User\MessageController@index')->name('index'); // list of contacts.
        Route::get('/contact/{username}','Frontend\User\MessageController@contact')->name('contact'); // list of contacts.
    });

    // ----- User Profile Routes --------
    Route::group(['prefix' => 'profile', 'as' => 'profile.'],function() {
        // ----- frontend profile control -----
        Route::get('/edit','Frontend\User\Profile\UserProfileController@edit')->name('edit');  // show profile edit form
        Route::put('/edit','Frontend\User\Profile\UserProfileController@update')->name('update'); // PUT frontend profile update
        Route::put('/account/edit', 'Frontend\User\Profile\UserProfileController@updateAccount')->name('account');
        // ----- frontend sliders -----
        Route::post('/slide/add','Frontend\User\Profile\UserSlidesController@store')->name('slide.add'); // POST add frontend slide
        Route::put('/slide/edit/{id}','Frontend\User\Profile\UserSlidesController@update')->name('slide.edit'); //PUT edit frontend slide
        Route::delete('/slide/delete/{id}','Frontend\User\Profile\UserSlidesController@delete')->name('slide.delete'); // DELETE frontend slide
        // ----- frontend languages -----
        Route::post('/language/add','Frontend\User\Profile\UserLanguagesController@store')->name('language.add'); // POST add frontend language
        Route::put('/language/edit/{id}','Frontend\User\Profile\UserLanguagesController@update')->name('language.edit'); // PUT edit frontend language
        Route::delete('/language/delete/{id}','Frontend\User\Profile\UserLanguagesController@delete')->name('language.delete'); // DELETE frontend language
        // ----- frontend skills -----
        Route::post('/skill/add','Frontend\User\Profile\UserSkillsController@store')->name('skill.add'); // POST add frontend skill
        Route::put('/skill/edit/{id}','Frontend\User\Profile\UserSkillsController@update')->name('skill.edit'); // PUT edit frontend skill
        Route::delete('/skill/delete/{id}','Frontend\User\Profile\UserSkillsController@delete')->name('skill.delete'); // DELETE frontend skill

    });
});

// Home route
Route::get('/','frontend\IndexController@index')->name('home');

// User Profile View
Route::get('u/{id}/{slug}','Frontend\User\Profile\UserProfileController@show')->name('frontend.show');

// Service View
Route::get('service/{id}', 'Frontend\ServiceViewController@show')->name('service.show');

// Support View
Route::get('support/', 'Frontend\SupportController@index')->name('support');
Route::get('support/', 'Frontend\SupportController@create')->name('create-ticket.');

// Service Package View
Route::get('service/{id}/{package}/information', 'frontend\ServiceViewController@viewOrderInformation')->name('service.order.information');
Route::get('service/{id}/{package}/payment', 'frontend\ServiceViewController@viewOrderPayment')->name('service.order.payment');
Route::post('service/{id}/{package}/payment', 'frontend\ServiceViewController@viewOrderPayment')->name('service.order.pay');
Route::get('service/order/{id}/complete', 'frontend\ServiceViewController@viewOrderComplete')->name('service.order.complete');

Auth::routes();

Route::get('languages/{lang}', function ($lang) {
    if(in_array($lang,['ar','en'])){
        session()->put('locale', $lang);
    }
    return redirect()->back();
});
