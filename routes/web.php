<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Jobs\CheckExpiredSubscriptionsJob;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PlanController;

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
    Route::post('links',[AdminController::class, 'links'])->name('links');
    Route::post('panels',[AdminController::class, 'panels'])->name('panels');
    
    Route::group(['prefix'=> 'plans' ,'as'=> 'plans.'],function(){
        Route::get('/',[PlanController::class,'index'])->name('index');
        Route::get('create',[PlanController::class,'create'])->name('create');
        Route::post('store',[PlanController::class,'store'])->name('store');
        Route::get('edit/{plan}',[PlanController::class,'edit'])->name('edit');
        Route::post('update',[PlanController::class,'update'])->name('update');
        Route::post('delete',[PlanController::class,'destroy'])->name('delete');
    });
    

    Route::get('payments',[PaymentController::class, 'index'])->name('payments');
    Route::post('payments/confirmation',[PaymentController::class, 'confirmation'])->name('payments.confirmation');
    Route::post('payments/delete',[PaymentController::class, 'destroy'])->name('payments.delete');
    Route::get('users',[UserController::class, 'index'])->name('users');
    Route::get('loginAs/{id}', [UserController::class, 'loginAs'])->name('loginAs');
    Route::post('user/manage', [UserController::class, 'manage'])->name('user.manage');

    // Route::get('users/paid',[UserController::class, 'paid_users'])->name('users.paid');
    Route::get('withdrawals',[WithdrawalController::class, 'index'])->name('withdrawals');
    Route::post('withdrawals/store',[WithdrawalController::class, 'pay'])->name('withdrawals.pay');
    Route::get('support',[SupportController::class, 'index'])->name('support');
    Route::get('support/{user}',[SupportController::class, 'conversation'])->name('support.show');
    Route::post('support/chat',[SupportController::class, 'reply'])->name('support.reply');
    Route::get('subscriptions',[SubscriptionController::class, 'index'])->name('subscriptions');
    Route::post('subscription',[SubscriptionController::class, 'store'])->name('subscription');
    // Route::post('update_subscription',[SubscriptionController::class, 'update_subscription'])->name('update_subscription');
    Route::get('trials',[SubscriptionController::class, 'trials'])->name('trials');
    Route::post('trials',[SubscriptionController::class, 'trials_store'])->name('trials');
    Route::post('update_trial',[SubscriptionController::class, 'update_trial'])->name('update_trial');
    Route::post('share_to_affilate',[SubscriptionController::class, 'share_to_affilate'])->name('share_to_affilate');
});



Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('notifications', [HomeController::class, 'index'])->name('notifications');
Route::get('withdrawals', [HomeController::class, 'index'])->name('withdrawals');
Route::post('withdrawals/store', [WithdrawalController::class, 'store'])->name('withdrawals.store');
Route::get('freetrials', [HomeController::class, 'index'])->name('freetrials');
Route::get('transactions', [HomeController::class, 'index'])->name('transactions');
Route::get('referrals', [HomeController::class, 'index'])->name('referrals');
Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::post('profile', [HomeController::class, 'profile_update'])->name('profile');
Route::post('password', [HomeController::class, 'password_update'])->name('password_update');
Route::get('referredby/{user}', [RegisterController::class, 'referrer'])->name('referrer');
Route::post('resolve/account', [PaymentController::class, 'resolve_account'])->name('resolve_account');
Route::post('update_trial',[SubscriptionController::class, 'update_trial'])->name('update_trial');
Route::get('subscription/purchase',[SubscriptionController::class, 'pricing'])->name('subscription.purchase');

Route::get('subscription',[SubscriptionController::class, 'subscriptions'])->name('subscription');
Route::post('subscription',[SubscriptionController::class, 'buy'])->name('subscription');
Route::get('subscription/payment/{payment}',[SubscriptionController::class, 'payment'])->name('subscription.payment');
Route::post('subscription/renew',[SubscriptionController::class, 'renew'])->name('subscription.renew');
Route::post('payment/upload',[PaymentController::class, 'upload'])->name('payment.upload');
Route::get('payment/callback',[PaymentController::class, 'paymentcallback'])->name('payment.callback');
Route::get('support',[SupportController::class, 'user'])->name('support');
Route::post('support',[SupportController::class, 'send'])->name('support');

Route::get('check',function(){
    $plan = \App\Models\Plan::find(2);
     dd($plan->getAttributes());
    // dd($plan->features);
});