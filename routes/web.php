<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RecentDonationsController;
use App\Http\Controllers\DonationProcessController;
use App\Http\Controllers\DonationHistoryController;
use App\Http\Controllers\DownloadCertificateController;
use App\Http\Controllers\DownloadReceiptController;

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


Route::group(['prefix' => 'covid'], function(){ 
    Route::get('/', [App\Http\Controllers\CovidController::class, 'infoPage'])->name('covid');
    Route::get('/center-locator', [App\Http\Controllers\CovidController::class, 'centerLocatorPage'])->name('covid-center-locator');
    Route::get('/slot-booking', [App\Http\Controllers\CovidController::class, 'slotBookingPage'])->name('covid-slot-booking');
});





Route::get('/', function () {
    return view('home');
})->name('/');

Route::get('/curl-ip', function () {
    $ip = $_SERVER['REMOTE_ADDR'];
    $ip_server = $_SERVER['SERVER_ADDR'];
  
    echo $ip.'<br>'.$ip_server;
});

Route::get('/projects', function () {
    return redirect('/#projects_section');
})->name('/projects');

Route::get('/team', function () {
    return redirect('/#meet_the_team_section');
})->name('/team');

Route::get('/about', function () {
    return redirect('/#about_us_section');
})->name('/about');

Route::get('/contact', function () {
    return view('contact');
})->name('/contact');

Route::get('/join', function () {
    return view('join.join');
})->name('/join');

Route::get('/gallery', function () {
    return view('gallery');
})->name('/gallery');

Route::get('/terms-of-use', function () {
    return view('terms-of-use');
})->name('/terms-of-use');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('/privacy-policy');

Route::get('/join/teacher', function () {
    return view('join.teacher-t&c');
})->name('/join/teacher');



Route::get('/join/teacher/form',[JoinController::class, 'Teacher'])->name('/join/teacher/form');

Route::post('/join/teacher/submit',[JoinController::class, 'TeacherSubmit'])->name('/join/teacher/submit');

Route::post('/contact',[TicketController::class, 'RaiseTicket'])->name('/contact');



Route::group(['prefix' => 'donate'], function(){
    // Donation Routes
    Route::get('/', [App\Http\Controllers\RecentDonationsController::class, 'show'])->name('/donate');
   
    Route::get('/download', function () {
        return view('donate.download');
    })->name('/donate/download');
    
    Route::post('/ProcessDonation', [App\Http\Controllers\DonationProcessController::class, 'saveDonation'])->name('/ProcessDonation');

    Route::post('/payment/response/paytm', [App\Http\Controllers\PaymentResponseController::class, 'PaytmResponse']);
    Route::post('/payment/response/payu', [App\Http\Controllers\PaymentResponseController::class, 'PayuResponse']);
    
    Route::post('/download',[DonationHistoryController::class, 'EmailDonationHistory'])->name('/donate/download');

    Route::get('/download/acknowledgement/{id}/{key}' , [DownloadReceiptController::class, 'ReceiptDownload']);
    Route::get('/download/certificate/{id}/{key}' , [DownloadCertificateController::class, 'CertificateDownload']);

});




//  /donate/download







Route::group(['prefix' => 'admin'], function() {
    // Authentication Routes...
    Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
        
    // Password Reset Routes...
    Route::get('password/confirm', 'App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'App\Http\Controllers\Auth\ConfirmPasswordController@confirm');
    Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token?}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');

    //Basic User Routes
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/DPupdate', [App\Http\Controllers\DPupdateController::class, 'DPupdate'])->name('/DPupdate');

    // Manage Donations Routes
    Route::get('/donations', [App\Http\Controllers\RecentDonationsController::class, 'ShowAdminDonationTable'])->name('donations')->middleware('permission:Manage Donations|Admin');
    Route::post('/donations/send-mail', [App\Http\Controllers\AdminSendMailController::class, 'SendDonationMail'])->name('donations.send-mail')->middleware('permission:Manage Donations|Admin');

    // Manage Users Routes...
    Route::get('/permissions', [App\Http\Controllers\PermissionsController::class, 'Index'])->name('manage-permissions')->middleware('permission:Manage Users|Admin');
    Route::get('user-management', 'App\Http\Controllers\Auth\RegisterController@UserManagement')->name('user-management')->middleware('permission:Manage Users|Admin');
    Route::post('user-management', 'App\Http\Controllers\Auth\RegisterController@register')->middleware('permission:Manage Users|Admin');
    Route::get('/remove-user/{email}', [App\Http\Controllers\ManageUsersController::class, 'RemoveUser'])->middleware('permission:Manage Users|Admin');
    Route::post('/remove-user', [App\Http\Controllers\ManageUsersController::class, 'RemoveUserConfirmed'])->middleware('permission:Manage Users|Admin');
    Route::get('/user-management/{email}/edit', [App\Http\Controllers\ManageUsersController::class, 'Edit'])->middleware('permission:Manage Users|Admin');
    Route::post('/user-management/{email}/edit/submit', [App\Http\Controllers\ManageUsersController::class, 'store'])->middleware('permission:Manage Users|Admin');

    Route::get('/teacher-applications', [App\Http\Controllers\TeacherApplicationController::class, 'index'])->name('teacher-applications')->middleware('permission:Manage Teacher Applications|Admin');
    Route::get('/teacher-applications/id/{application_id}', [App\Http\Controllers\TeacherApplicationController::class, 'manage'])->middleware('permission:Manage Teacher Applications|Admin');
    Route::get('/teacher-applications/id/{application_id}/approve', [App\Http\Controllers\TeacherApplicationController::class, 'approve'])->middleware('permission:Manage Teacher Applications|Admin');
    Route::get('/teacher-applications/id/{application_id}/reject', [App\Http\Controllers\TeacherApplicationController::class, 'reject'])->middleware('permission:Manage Teacher Applications|Admin');

    Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets')->middleware('permission:Manage Tickets|Admin');
    Route::get('/tickets/id/{ticket_id}', [App\Http\Controllers\TicketController::class, 'manage'])->middleware('permission:Manage Tickets|Admin');
    Route::post('/tickets/AddReply', [App\Http\Controllers\TicketController::class, 'AdminAddReply'])->name('AdminAddReply')->middleware('permission:Manage Tickets|Admin');
    Route::get('/tickets/id/{ticket_id}/change-status/resolved', [App\Http\Controllers\TicketController::class, 'UpdateResolved'])->middleware('permission:Manage Tickets|Admin');
    
    Route::post('/tickets/add-reply', [App\Http\Controllers\TicketController::class, 'AdminTicketReply'])->name('AdminTicketReply')->middleware('permission:Manage Tickets|Admin');
});



