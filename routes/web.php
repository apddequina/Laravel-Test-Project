<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\TicketTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Admin Dashboard
Route::controller(AdminController::class)->group( function(){
    Route::get('/dashboard', 'AdminDashboard')->middleware(['auth', 'verified'])->name('dashboard');
});

// Admin All Route
Route::controller(AdminController::class)->group( function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

});

// Tickets
Route::controller(TicketController::class)->group( function(){
    Route::get('/support-form', 'SupportForm')->name('support-form');
    Route::get('/ticket/all', 'AllTickets')->name('all-tickets');
    Route::post('/store/ticket', 'StoreTicket')->name('store-ticket');
    Route::put('/ticket/update/{id}/{type}', 'UpdateTicket')->name('update-ticket');
    Route::delete('/ticket/delete/{id}/{type}', 'DeleteTicket')->name('delete-ticket');


});

// Ticket Type 
Route::controller(TicketTypeController::class)->group( function(){
    Route::get('/all-ticket-type', 'AllTicketType')->name('all-ticket-type');
    Route::get('/add-ticket-type', 'AddTicketType')->name('add-ticket-type');
    Route::post('/store-ticket-type', 'StoreTicketType')->name('store-ticket-type');
    Route::get('/ticket-type/edit/{id}', 'EditTicketType')->name('edit-ticket-type');
    Route::post('/ticket-type/update/{id}','UpdateTicketType' )->name('update-ticket-type');
    Route::get('/ticket-type/delete/{id}', 'DeleteTicketType')->name('delete-ticket-type');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
