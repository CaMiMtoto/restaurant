<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\Categories\Index;
use App\Http\Livewire\Admin\Items\ItemList;
use App\Http\Livewire\Admin\Orders\AllOrders;
use App\Http\Livewire\Admin\Orders\Orders;
use App\Http\Livewire\Admin\Reservations;
use App\Http\Livewire\MyList;
use App\Http\Livewire\PlaceOrder;
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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/place-order', PlaceOrder::class)->name('place-order');
Route::get('/order-details', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/categories', Index::class)->name('categories.index');
    Route::get('/items', ItemList::class)->name('items.index');

    Route::get('/reservations', Reservations::class)->name('reservations.index');
    Route::get('/orders', AllOrders::class)->name('orders.index');

});

require __DIR__ . '/auth.php';
