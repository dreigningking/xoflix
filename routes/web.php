<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\SubscriptionController;


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

Auth::routes();
Route::group(['prefix'=> 'admin' ,'as'=> 'admin.','middleware'=> 'auth'],function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('notifications',[AdminController::class, 'notifications'])->name('notifications');
    Route::get('activities',[AdminController::class, 'activities'])->name('activities');
    Route::get('settings',[AdminController::class, 'settings'])->name('settings');
    Route::post('settings',[AdminController::class, 'updateSettings'])->name('settings');
    Route::get('payments',[PaymentController::class, 'index'])->name('payments');
    Route::get('users',[UserController::class, 'index'])->name('users');
    Route::get('users/paid',[UserController::class, 'paid_users'])->name('users.paid');
    Route::get('withdrawals',[WithdrawalController::class, 'index'])->name('withdrawals');
    Route::get('support',[SupportController::class, 'index'])->name('support');
    Route::get('support/chat',[SupportController::class, 'show'])->name('support.show');
    Route::get('subscriptions',[SubscriptionController::class, 'index'])->name('subscriptions');
    Route::post('subscription',[SubscriptionController::class, 'store'])->name('subscription');
    Route::get('trials',[SubscriptionController::class, 'trials'])->name('trials');
    Route::post('trials',[SubscriptionController::class, 'trials_store'])->name('trials');
    Route::post('assign_trial',[SubscriptionController::class, 'assign_trial'])->name('assign_trial');
    Route::post('share_to_affilate',[SubscriptionController::class, 'share_to_affilate'])->name('share_to_affilate');
});



Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('notifications', [HomeController::class, 'index'])->name('notifications');
Route::get('withdrawals', [HomeController::class, 'index'])->name('withdrawals');
Route::get('freetrials', [HomeController::class, 'index'])->name('freetrials');
Route::get('transactions', [HomeController::class, 'index'])->name('transactions');
Route::get('referrals', [HomeController::class, 'index'])->name('referrals');
Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::post('profile', [HomeController::class, 'profile_update'])->name('profile');
Route::post('password', [HomeController::class, 'password_update'])->name('password_update');
Route::get('referredby/{user}', [RegisterController::class, 'referrer'])->name('referrer');
Route::post('resolve/account', [PaymentController::class, 'resolve_account'])->name('resolve_account');
Route::post('assign_trial',[SubscriptionController::class, 'assign_trial'])->name('assign_trial');
Route::get('subscription',[SubscriptionController::class, 'pricing'])->name('subscription');
Route::post('subscription',[SubscriptionController::class, 'buy'])->name('subscription');
Route::get('payment/callback',[PaymentController::class, 'paymentcallback'])->name('payment.callback');