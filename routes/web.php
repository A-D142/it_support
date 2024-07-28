<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordController;



    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);


    Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('/', [AuthenticatedSessionController::class, 'store']);

    Route::get('login_emp', [AuthenticatedSessionController::class, 'create_emp'])
                ->name('login_emp');

    Route::post('login_emp', [AuthenticatedSessionController::class, 'store_emp']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');

# ######################   user Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //testing
    Route::get('/dashboard_test', function () {
        return view('dashboard');
    });

    Route::get('/user_test', function () {
        return view('user');
    })->name('user_test');


    Route::get('/user/ticket', function () {
        return view('ticket');
    })->name('ticket');
    Route::post('/user/ticket', [TicketController::class, 'store']);

    Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


# ######################   admin Routes
Route::middleware(['auth:web-emp'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@ START OF ADMIN ROUTS
    Route::get('/admin', [AdminController::class, 'index'])->name('users');
    Route::get('/departments', [AdminController::class, 'departments'])->name('departments');
    Route::get('/tickets', [AdminController::class, 'tickets'])->name('tickets');


    Route::get('/CreateUser', [AdminController::class, 'createUserPage'])->name('createUserPage');
    Route::get('/CreateEmployee', [AdminController::class, 'createEmployeePage'])->name('createEmployeePage');
    Route::post('/CreateUser', [AdminController::class, 'createUser']);
    Route::post('/CreateEmployee', [AdminController::class, 'createEmployee']);
  
  
    Route::get('/EditUser/{id}', [AdminController::class, 'editUser']);
    Route::get('/EditEmployee/{id}', [AdminController::class, 'editEmployee'])->name('editEmployee');

    Route::patch('/EditUser/{id}', [AdminController::class, 'storeUser']);
    Route::patch('/EditEmployee/{id}', [AdminController::class, 'storeEmployee']);



    Route::get('/createDepartment', [AdminController::class, 'createDepartmentPage'])->name('createDepartmentPage');
    Route::post('/createDepartment', [AdminController::class, 'createDepartment'])->name('createDepartment');



    Route::delete('/admin/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');
    Route::delete('/admin/{id}', [AdminController::class, 'destroyEmployee'])->name('destroyEmployee');
    Route::delete('/departments/{id}', [AdminController::class, 'destroyDepartment'])->name('destroyDepartment');

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@ END
});



// require __DIR__.'/auth.php';
