<?php

use App\Models\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentsController;


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
//Landing Page
Route::get('/', [DepartmentsController::class, 'index'])->name('HomePage');


//testimonial routes
Route::get('/userprofile/testimonial/{id}', [UserController::class, 'testimonial'])->name('testimonial')->middleware('auth');
Route::post('/userprofile/testimonial/post/{id}', [UserController::class, 'testimonialpost'])->name('testimonialpost');


//user profile routes
Route::get('/userprofile/{id}', [UserController::class, 'showuserpage'])->middleware('can:User');
Route::get('/adminprofile/{id}', [UserController::class, 'showuserpage'])->middleware('can:Admin');
Route::get('/userprofile/edit/{id}', [UserController::class, 'edituserinfo'])->name('editProfile')->middleware('auth');
Route::put('/userprofile/edit/update/{id}', [UserController::class, 'updateuserinfo'])->name('updateProfile');


//Doctor Profile routes
Route::get('/doctorprofile/{id}', [DoctorController::class, 'showdoctorpage'])->middleware('can:Doctor');
Route::get('/doctorprofile/edit/{id}', [DoctorController::class, 'editdoctorinfo'])->name('editDocProfile')->middleware('can:Doctor');
Route::put('/doctorprofile/edit/update/{id}', [DoctorController::class, 'updateDoctorProfile'])->name('updateDoctorProfile');


// abou page
Route::get('/about', function () {
    return view('about');
});


// contact page
Route::get('/Contact', function () {
    return view('Contact');

});
Route::post('/Contact' , [contactController::class, 'store']);

// landing page
//Route::get('/index', function () {
//
//});

// appointment

Route::get('/appointment/{id}', [AppointmentController::class, 'appointmentPage'])->name('appointmentPage')->middleware('auth');
Route::post('/appointment/store/{id}', [AppointmentController::class, 'appointmentStore'])->name('appointmentStore');


// login register
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__ . '/auth.php';


// order
Route::get('/product', [ProductController::class, 'index']);
Route::get('order/{id}', [OrderController::class, 'indexO'])->middleware(['auth', 'verified']);
Route::get('/orderSave/{names}/{inputId}/{inputCity}/{inputPhone}/{inputAddress}/{product_id}', [OrderController::class, 'store']);


// admin dashboard

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/admin/editUser/{id}', [AdminController::class, 'editUser'])->middleware('can:Admin');
Route::post('/admin/storeEdit/{id}', [AdminController::class, 'storeEdit']);


Route::get('/admin/editDoctor/{id}', [AdminController::class, 'editDoctor'])->middleware('can:Admin');
Route::post('/admin/storeEditDoctor/{id}', [AdminController::class, 'storeEditDoctor']);

Route::get('/admin/editOrder/{id}', [AdminController::class, 'editOrder'])->middleware('can:Admin');
Route::post('/admin/storeEditOrder/{id}', [AdminController::class, 'storeEditOrder']);

Route::get('/admin/delete/{id}', [AdminController::class, 'destroy'])->middleware('can:Admin');
Route::get('/admin/deleteDoctor/{id}', [AdminController::class, 'deleteDoctor'])->middleware('can:Admin');
Route::get('/admin/deleteOrder/{id}', [AdminController::class, 'deleteOrder'])->middleware('can:Admin');

Route::get('/admin/allDoctor', [AdminController::class, 'allDoctor'])->middleware('can:Admin');
Route::get('/admin/allUsers', [AdminController::class, 'allUsers'])->middleware('can:Admin');


Route::get('/admin/allProduct', [AdminController::class, 'allProduct'])->middleware('can:Admin');
Route::post('/admin/addProduct', [AdminController::class, 'addProduct']);
Route::get('/admin/allOrder', [AdminController::class, 'allOrder'])->middleware('can:Admin');
Route::get('/admin/editProduct/{id}', [AdminController::class, 'editProduct'])->middleware('can:Admin');
Route::post('/admin/storeEditProduct/{id}', [AdminController::class, 'storeEditProduct']);
Route::get('/admin/deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->middleware('can:Admin');


Route::get('/admin/allAppointment', [AdminController::class, 'allAppointment'])->middleware('can:Admin');
Route::get('/admin/deleteAppointment/{id}', [AdminController::class, 'deleteAppointment'])->middleware('can:Admin');
Route::get('/admin/editAppointment/{id}', [AdminController::class, 'editAppointment'])->middleware('can:Admin');


Route::get('/admin/allDepartments',[AdminController::class,'allDepartments'])->middleware('can:Admin');
Route::post('/admin/allDepartments',[AdminController::class,'allDepartmentspost']);
Route::post('/admin/deleteDepartment/{id}',[AdminController::class,'deleteDepartment']);
Route::get('/admin/editDepartment/{id}',[AdminController::class,'editDepartment'])->middleware('can:Admin');
Route::put('/admin/storeEditDepartment/{id}',[AdminController::class,'storeEditDepartment']);


Route::get('/admin/allDonations',[AdminController::class,'allDonations'])->middleware('can:Admin');






// contact page
Route::get('/test', function () {
    return view('test');
});




//Newsletter
Route::get('/Newsletter' , [UserController::class, 'Newsletter'])->name('Newsletter');


//Donation Page
Route::post('donationForm', [DonationController::class, 'store']);
Route::get('/donation', [DonationController::class, 'index']);

