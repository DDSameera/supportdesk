<?php

use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendEmailJob;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SupportTicketReplyController;

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


Route::get('/', [IndexController::class, 'index'])->name('index');

/*Support Admin Login*/
Auth::routes();
/*Support Admin Login*/


/*Support Ticket*/
Route::prefix('ticket')->group(function () {
    Route::get('/', [SupportTicketController::class, 'index'])->name('ticket.index')->middleware(['auth']);
    Route::get('create', [SupportTicketController::class, 'create'])->name('ticket.create');
    Route::post('store', [SupportTicketController::class, 'store'])->name('ticket.store');
    Route::get('check', [SupportTicketController::class, 'check'])->name('ticket.check');

});
/*Support Ticket*/

/*Support Ticket Reply*/
Route::prefix('reply')->group(function () {
    Route::get('ticketid/{ticketid}', [SupportTicketReplyController::class, 'index'])->name('reply.index')->middleware(['auth']);
    Route::get('ticketid/{ticketid?}/all', [SupportTicketReplyController::class, 'showAll'])->name('reply.all')->middleware(['auth']);
    Route::post('create', [SupportTicketReplyController::class, 'create'])->name('reply.create')->middleware(['auth']);
});
/*Support Ticket Reply*/
