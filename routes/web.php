<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $doctors = Doctor::all();
    return view('home')->with('doctors', $doctors);
});

Route::get('/development', function () {
    return view('development');
});
// Change Language
Route::get('language/{locale}', [LangController::class, 'setLanguage'])->name('setLocale');

Route::get('/about', function () {
    $doctors = Doctor::all();
    return view('/about/about')->with('doctors', $doctors);
});

Route::get('/our-story', function () {
    $doctors = Doctor::all();
    return view('/about/our-story')->with('doctors', $doctors);
});
Route::get('/services', function () {
    return view('/services/services');
});

Route::get('/health-support-management', function () {
    return view('services/health-support-management');
});

Route::get('/life-support-training', function () {
    return view('services/life-support-training');
});

Route::get('patient-guide', function () {
    return view('patientGuide');
});


// Doctors
Route::get('/doctors', [DoctorController::class, 'showDoctors'])->name('doctors');

Route::get('doctor/{doctorId}', [DoctorController::class, 'showSingleDoctor']);

// Contact Form
Route::get('contact', [ContactFormController::class, 'showForm'])->name('contact');
Route::post('contact', [ContactFormController::class, 'submitForm'])->name('contact');
Route::get('admin/messages', [ContactFormController::class, 'showMessages'])->name('admin/messages');
Route::get('admin/message/{id}', [ContactFormController::class, 'viewMessage'])->name('admin/message/{id}');


// User Auth Routes
Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('user/register');
Route::post('user/register', [UserController::class, 'Registration'])->name('user/register.post');
Route::get('user/login', [UserController::class, 'showLoginForm'])->name('user/login');
Route::post('user/login', [UserController::class, 'Login'])->name('user/login.post');
Route::get('user/talk', [UserController::class, 'showTalkToDoctor'])->name('user/talk');
Route::post('user/talk', [UserController::class, 'talkToDoctor'])->name('user/talk.post');

// Doctor Auth Routes
Route::get('doctor', function () {
    if (!Auth::guard('doctor')->check()) {
        return redirect('doctor-login');
    } else {
        return redirect('doctor-dashboard');
    }
});
Route::get('doctor-login', [DoctorController::class, 'doctorLoginForm'])->name('doctor-login');
Route::post('doctor-login', [DoctorController::class, 'doctorLogin'])->name('doctor-login.post');
Route::get('doctor-dashboard', [DoctorController::class, 'doctorDashboard'])->name('doctor-dashboard');
Route::get('doctor-profile', [DoctorController::class, 'doctorProfile'])->name('doctor-profile');
Route::get('update-doctor-profile/{id}', [DoctorController::class, 'showUpdateDoctorProfile'])->name('update-doctor-profile/{id}');
Route::put('update-doctor-profile/{id}', [DoctorController::class, 'updateDoctorProfile'])->name('update-doctor-profile.post');

// User Dashboard
Route::get('/dashboard', [UserController::class, 'showUserDashboard'])->name('dashboard');

//Admin Auth Routes
Route::get('admin', function () {
    if (!Auth::guard('admin')->check()) {
        return redirect('admin/login');
    } else {
        return redirect('admin/dashboard');
    }
});

Route::get('admin/register', [AdminController::class, 'showAdminRegistrationForm'])->name('admin/register');
Route::post('admin/register', [AdminController::class, 'adminRegistration'])->name('admin/register.post');
Route::get('admin/login', [AdminController::class, 'showAdminLoginForm'])->name('admin/login');
Route::post('admin/login', [AdminController::class, 'adminLogin'])->name('admin/login.post');
Route::get('admin/dashboard', [AdminController::class, 'showAdminDashboard'])->name('admin/dashboard');


// Admin Routes
// Managing Doctors
Route::get('admin/manage-doctors', [DoctorController::class, 'showManageDoctors'])->name('admin/manage-doctors');
Route::post('admin/delete-doctor/{id}', [DoctorController::class, 'deleteDoctor'])->name('admin/delete-doctor.post');
Route::get('admin/delete-doctor/{id}', [DoctorController::class, 'showDeleteDoctor'])->name('admin/delete-doctor');
Route::put('admin/edit-doctor/{id}', [DoctorController::class, 'editDoctor'])->name('admin/edit-doctor.post');
Route::get('admin/edit-doctor/{id}', [DoctorController::class, 'showEditDoctor'])->name('admin/edit-doctor');
Route::get('admin/add-doctor', [DoctorController::class, 'showAddDoctor'])->name('admin/add-doctor');
Route::post('admin/add-doctor', [DoctorController::class, 'AddDoctor'])->name('admin/add-doctor.post');

// Appointment Routes
Route::get('/appointment', [AppointmentsController::class, 'showAppointmentForm'])->name('appointment');
Route::get('/appointment/{doctor_id}', [AppointmentsController::class, 'showDoctorAppointmentForm'])->name('appointment');
Route::post('/appointment', [AppointmentsController::class, 'bookAppointment'])->name('appointment.post');
Route::get('admin/manage-appointments', [AppointmentsController::class, 'manageAppointments'])->name('admin/manage-appointments');
Route::get('admin/appointment/{id}', [AppointmentsController::class, 'viewAppointment'])->name('admin/appointment/{id}');
Route::get('doctors/manage-appointments', [AppointmentsController::class, 'manageAppointmentsDoctors'])->name('doctors/manage-appointments');
Route::get('doctors/appointment/{id}', [AppointmentsController::class, 'viewAppointmentDoctors'])->name('doctors/appointment/{id}');

// Image Upload
Route::post('/upload/{id}', [ImageController::class, 'upload'])->name('upload');

// Patient Routes
Route::get('dashboard', [PatientController::class, 'showDashboard'])->name('dashboard');
Route::get('register', [PatientController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [PatientController::class, 'registration'])->name('register.post');
Route::get('login', [PatientController::class, 'showLoginForm'])->name('login');
Route::post('login', [PatientController::class, 'login'])->name('login.post');
Route::get('profile', [PatientController::class, 'profile'])->name('profile');
Route::get('update-profile/{id}', [PatientController::class, 'updateProfileForm'])->name('update-profile');
Route::put('update-profile/{id}', [PatientController::class, 'updateProfile'])->name('update-profile.post');
Route::get('user/appointment/{id}', [PatientController::class, 'viewAppointment'])->name('user/appointment/{id}');
Route::get('appointments', [PatientController::class, 'appointments'])->name('appointments');

// Search Filter
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'search'])->name('search.search');


// Logout users
Route::get('doctors/logout', function () {
    Auth::guard('doctor')->logout();
    return redirect('/doctor-login');
})->name('doctors/logout');

Route::get('/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('/admin');
})->name('/logout');

Route::get('patient/logout', function () {
    Auth::guard('patient')->logout();
    return redirect('/login');
})->name('patient/logout');


Route::fallback(function () {
    return view('404');
});