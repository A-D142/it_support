<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// @@@@@@@@@@@@@@@@@@@@@@@@@@@ START OF ADMIN ROUTS
Route::get('/admin', [AdminController::class, 'index'])->name('users');
Route::get('/departments', [AdminController::class, 'departments'])->name('departments');
Route::get('/tickets', [AdminController::class, 'tickets'])->name('tickets');


Route::get('/CreateUser', [AdminController::class, 'createUserPage'])->name('createUserPage');
Route::get('/CreateEmployee', [AdminController::class, 'createEmployeePage'])->name('createEmployeePage');
Route::post('/CreateUser', [AdminController::class, 'createUser']);
Route::post('/CreateEmployee', [AdminController::class, 'createEmployee']);



Route::delete('/admin/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');
Route::delete('/admin/{id}', [AdminController::class, 'destroyEmployee'])->name('destroyEmployee');
// @@@@@@@@@@@@@@@@@@@@@@@@@@@ END
Route::get('/admin', function () {
    return view('admin.dashboard');
});

//Testing routs 
Route::get('/dashboard_test', function () {
    return view('dashboard');
});

//@@@@@@@@@ New routes
//Main page, all user tickets
Route::get('/user_test', [TicketController::class, 'index']);
//Ticket page
Route::get('/user/ticket', function () {
    return view('ticket');
})->name('ticket');
//post a new ticket
Route::post('/user/ticket', [TicketController::class, 'store']);
//Edit user ticket
Route::get('user_test/{ticket}/edit', [TicketController::class, 'edit']);
Route::patch('user_test/{ticket}/edit', [TicketController::class, 'update']);
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ end

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web-emp', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::middleware('auth:web-emp')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



require __DIR__.'/auth.php';
