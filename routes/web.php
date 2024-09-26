<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketThreadController;
use App\Models\Ticket;
use App\Models\User;
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

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('ticket')->name('ticket.')->group(function () {
        Route::get('create', [TicketController::class, 'create'])->name('create')->can('create', Ticket::class);
        Route::post('/', [TicketController::class, 'store'])->name('store')->can('create', Ticket::class);

        Route::prefix('{ticket}')->group(function () {
            Route::put('close', [TicketController::class, 'close'])->name('close');
            Route::get('thread', [TicketController::class, 'thread'])->name('thread');
            Route::post('thread', [TicketController::class, 'storeThread'])->name('store-thread');
        });
    });
});


Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy')->middleware('user.type:'.User::TYPE_CUSTOMER);
});

require __DIR__.'/auth.php';
