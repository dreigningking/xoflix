@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('breadcrumb')
<div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap">
        @php
            $urls = ['dashboard'=> route('dashboard'),'transactions' => route('transactions') ,'notifications'=> route('notifications'),'referrals' => route('referrals'),'withdrawals'=> route('withdrawals'),'freetrials' => route('freetrials')];
            $current = explode('/',url()->full());
            $page = $current[count($current) -1];
            // $page = Object.keys(urls).find(k=>urls[k]===current);
        @endphp
    <div class="page-title d-flex flex-column">
        <!--begin::Title-->
        <h1 class="d-flex text-white fw-bold fs-2qx my-1 me-5">
            @if($page != 'dashboard')
                {{ucwords($page)}} 
                @else
                Dashboard
            @endif
        </h1>
        
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-white opacity-75">
                <a href="{{route('dashboard')}}" class="text-white text-hover-primary">
                    Home 
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            
            <li class="breadcrumb-item">
                <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-white opacity-75">
                {{ucwords($page)}} 
            </li>
           
            <!--end::Item-->
            
            

        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->

    <!--begin::Actions-->
    
    <!--end::Actions-->
</div>
@endsection
@section('main')
<div class="content flex-row-fluid" id="kt_content">

    @if(Route::is('dashboard'))
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            @include('user.header')
            <!--end::Details-->

            <!--begin::Navs-->
            @include('layouts.menu.user_desktop')
            <!--begin::Navs-->
        </div>
    </div>
    @endif
    <!--end::Navbar-->
    <!--begin::Referral program-->
    <div class="tab-content">
        <div id="dashboard" class="tab-pane fade @if(Route::is('dashboard')) active show @endif" role="tabpanel" aria-labelledby="dashboard_tab">
           <div class="card mb-5 mb-xl-10">
                <div class="card-body">
                    <div class="row gy-5 g-xl-8">
                        <div class="col-xxl-12">
                            <!--begin::Table Widget 1-->
                            @include('layouts.current_subscription')
                            <!--end::Table Widget 1-->
                        </div>
                    </div>  
                </div>
            </div> 
           
              
        </div>

        <div id="transactions" class="tab-pane fade @if(Route::is('transactions')) active show @endif" role="tabpanel" aria-labelledby="transactions_tab">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3>Transactions</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                            </i>                
                            <input type="text" id="searchTransaction" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                        </div>

                    </div>
        
                    
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered align-middle gy-6" id="transactionTable">
                            <!--begin::Thead-->
                            <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten" >
                                <tr>
                                    <th class="min-w-125px ps-9">Date</th>
                                    <th class="min-w-125px">Reference</th>
                                    <th class="min-w-125px px-0">Method</th>
                                    <th class="min-w-125px">Amount</th>
                                    <th class="min-w-125px ps-0">Status</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
        
                            <!--begin::Tbody-->
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @foreach ($user->payments->whereIn('status',['success','paid']) as $payment)
                                    <tr>
                                        <td class="ps-9">{{$payment->created_at->format('M d, Y')}}</td>
                                        <td class="">{{$payment->reference}}</td>
                                        <td class="ps-0">{{$payment->method}}  </td>
                                        <td>₦{{$payment->amount}}</td>
                                        <td class="text-success">{{ucwords($payment->status)}}</td>
                                    </tr>
                                
                                @endforeach
                                
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
        
            </div>
            
        </div>

        <div id="notifications" class="tab-pane fade @if(Route::is('notifications')) active show @endif" role="tabpanel" aria-labelledby="notifications_tab">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3>Notifications</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                            </i>                
                            <input type="text" id="searchNotification" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                        </div>

                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered align-middle gy-6" id="notificationTable">
                            <!--begin::Thead-->
                            <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten" >
                                <tr>
                                    <th class="min-w-125px ps-9">Date</th>
                                    <th class="min-w-125px px-0">Subject</th>
                                    <th class="min-w-125px">Body</th>
                                    <th class="min-w-125px ps-0">Status</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
        
                            <!--begin::Tbody-->
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @foreach ($user->unreadNotifications->sortByDesc('created_at') as $notification)
                                    <tr>
                                        <td class="ps-9">{{$notification->created_at->calendar()}}</td>
                                        <td class="ps-0">{{$notification->data['subject']}} </td>
                                        <td>{{$notification->data['body']}}</td>
                                        <td> @if($notification->read_at) <span class="text-success">Read</span>  @else <span class="text-warning">Unread</span>  @endif </td>
                                    </tr>
                                    
                                @endforeach

                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
        
            </div>
            
        </div>

        <div id="referrals" class="tab-pane fade @if(Route::is('referrals')) active show @endif" role="tabpanel" aria-labelledby="referrals_tab">
            <div class="card mb-5 mb-xl-10">
                <!--begin::Body-->
                <div class="card-body">
                    <h2 class="mb-9">
                        Referral Program
                    </h2>
        
                    <!--begin::Overview-->
                    <div class="row mb-10">
                        <!--begin::Col-->
                        <div class="col-xl-6 mb-15 mb-xl-0 pe-5 d-md-none">
                            <div class="d-flex  flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                    <div class="d-flex">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <span class="fs-4 fw-semibold text-info pb-1 px-2">Subscriptions</span>
                                            <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                                                <span data-kt-countup="true" data-kt-countup-value="{{$user->activeSubscriptions->count()}}">0</span>
                                            </span>
                                        </div>
                    
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <span class="fs-4 fw-semibold text-primary pb-1 px-2">Referral </span>
                                            <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                                                <span data-kt-countup="true" data-kt-countup-value="{{$user->referrals->count()}}">0</span>
                                            </span>
                                            <!--end::Label-->
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex">
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <span class="fs-4 fw-semibold text-info pb-1 px-2">Earnings</span>
                                            <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                                                ₦<span data-kt-countup="true" data-kt-countup-value="{{$user->earnings->sum('amount')}}">0</span>
                                            </span>
                                        </div>
                                        <!--end::Stat-->
                    
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            
                                            <span class="fs-4 fw-semibold text-success pb-1 px-2">Balance</span>
                                            <span class="fs-lg-2qx fw-bold d-flex justify-content-center">
                                                ₦<span data-kt-countup="true" data-kt-countup-value="{{$user->balance}}">0</span>
                                            </span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                    
                                        <!--begin::Stat-->
                                        
                                        <!--end::Stat-->
                                    </div></div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                    
                                <!--begin::Progress-->
                                
                                <!--end::Progress-->
                            </div>
                        </div>
                        <!--end::Col-->
        
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <h4 class="text-gray-800 mb-0">
                                Your Referral Link
                            </h4>
        
                            <p class="fs-6 fw-semibold text-gray-600 py-4 m-0">
                                We believe in the power of word-of-mouth. That's why we're excited to introduce our Referral Program, designed to reward you for spreading the love of our products and services to your friends and family.
                            </p>
        
                            <div class="d-flex">
                                <input id="kt_referral_link_input" type="text"
                                    class="form-control form-control-solid me-3 flex-grow-1" name="search"
                                    value="{{route('referrer',$user)}}">
                                <span class="clipboard_value d-none">{{route('referrer',$user)}}</span>
                                <button class="copy_button btn btn-light btn-active-light-primary fw-bold flex-shrink-0">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span>  
                                    <i class="bi bi-check fs-2x p-0 check_icon" style="display: none"></i>    
                                </button>
                                
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Overview-->
        
                    
        
                    <!--begin::Info-->
                    <p class="fs-5 fw-semibold text-gray-600 py-6">
                        Joining our Referral Program is simple, rewarding, and fun. You not only get to enjoy our top-notch products and services but also get paid for sharing them with your network.
                    </p>
                    <!--end::Info-->
        
        
                    
                </div>
                <!--end::Body-->
            </div>
            <div class="card mb-5 mb-xl-10">
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3>Referred Users</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                            </i>                
                            <input type="text" id="searchReferral" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                        </div>

                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered align-middle gy-6" id="referralTable">
                            <!--begin::Thead-->
                            <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten" >
                                <tr>
                                    <th class="min-w-125px ps-9">User</th>
                                    <th class="min-w-125px px-0">Join Date</th>
                                    <th class="min-w-125px">Subscription</th>
                                    <th class="min-w-125px">Bonus</th>
                                    <th class="min-w-125px ps-0">Status</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
        
                            <!--begin::Tbody-->
                            <tbody class="fs-6 fw-semibold text-gray-600">
                            @foreach ($user->referrals as $referral)
                                <tr>
                                    <td class="ps-9">
                                        <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals"
                                            class="text-gray-600 text-hover-primary">{{$referral->name}}</a>
                                            
                                    </td>
                                    <td class="ps-0">
                                        {{$referral->created_at->format('M d, Y')}}
                                    </td>
                                    <td>{{$referral->subscriptions->count()}}</td>
                                    <td>{{$user->earnings->where('referred_id',$referral->id)->sum('amount')}}</td>
                                    <td class="text-success">
                                        @if($user->earnings && $user->earnings->firstWhere('referred_id',$referral->id) && $user->earnings->firstWhere('referred_id',$referral->id)->status)
                                            Paid
                                        @else Pending
                                        @endif
                                    </td>
                                </tr>
                               
                            @endforeach
                               
        
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
        
            </div>
            
        </div>

        <div id="withdrawals" class="tab-pane fade @if(Route::is('withdrawals')) active show @endif" role="tabpanel" aria-labelledby="withdrawals_tab">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3>Withdrawals</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                            </i>                
                            <input type="text" id="searchWithdrawal" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                        </div>

                    </div>
        
                    
                </div>
                <div class="card-body">
                    <!--begin::Notice-->
                    @if($user->account_name)
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  m-6 p-6">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-bank fs-2tx text-primary me-4"><span
                                class="path1"></span><span class="path2"></span></i> <!--end::Icon-->
        
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <!--begin::Content-->
                            <div class="mb-3 mb-md-0 fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Withdraw Your Money to a Bank Account</h4>
        
                                <div class="fs-6 text-gray-700 pe-7">Withdraw money securily to your bank
                                    account. Minimum withdrawal amount is ₦{{$minimum}} per transaction and maximum of ₦{{$maximum}} per transaction.</div>
                            </div>
                            <!--end::Content-->
        
                            <!--begin::Action-->
                            <a href="#" data-bs-target="#withdraw_money" data-bs-toggle="modal"
                                class="btn btn-primary px-6 align-self-center text-nowrap">
                                Withdraw Money </a>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    @else 
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  m-6 p-6">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-bank fs-2tx text-primary me-4"><span
                                class="path1"></span><span class="path2"></span></i> <!--end::Icon-->
        
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <!--begin::Content-->
                            <div class="mb-3 mb-md-0 fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Withdraw Your Money to a Bank Account</h4>
        
                                <div class="fs-6 text-gray-700 pe-7">You need to setup your bank account to withdraw bonus. You can complete this from your profile</div>
                            </div>
                            <!--end::Content-->
        
                            <!--begin::Action-->
                            <a href="{{route('profile')}}" class="btn btn-primary px-6 align-self-center text-nowrap"> Setup Bank Details </a>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    @endif
                    <!--end::Notice-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered align-middle gy-6" id="withdrawalTable">
                            <!--begin::Thead-->
                            <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten" >
                                <tr>
                                    <th class="min-w-125px ps-0">Date Requested </th>
                                    <th class="min-w-125px px-0">Reference</th>
                                    <th class="min-w-125px">Amount</th>
                                    <th class="min-w-125px">Account</th>
                                    <th class="min-w-125px ps-0">Status</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
        
                            <!--begin::Tbody-->
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @foreach ($user->withdrawals as $withdrawal)
                                <tr>
                                    <td class="ps-9">{{$withdrawal->created_at->format('M d, Y')}}</td>
                                    <td class="ps-0"> {{$withdrawal->reference}} </td>
                                    <td>{{$withdrawal->amount}}</td>
                                    <td>{{$user->bank_name.':'.$user->account_number}}</td>
                                    <td @if($withdrawal->status == 'pending') class="text-warning" @else class="text-success" @endif>{{$withdrawal->status}}</td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
        
            </div>
            
        </div>

        <div id="freetrials" class="tab-pane fade @if(Route::is('freetrials')) active show @endif" role="tabpanel" aria-labelledby="freetrials_tab">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3>Free Trials</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                            </i>                
                            <input type="text" id="searchTrial" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                        </div>

                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered align-middle gy-6" id="trialTable">
                            <!--begin::Thead-->
                            <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten">
                                <tr>
                                    <th class="min-w-125px ps-9">Details</th>
                                    <th class="min-w-125px px-0 text-center">Assign</th>
                                    <th class="min-w-125px px-0">Assigned at</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
        
                            <!--begin::Tbody-->
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @foreach ($user->affiliateTrials as $trial)
                                    <tr>
                                        <!--begin::Author=-->
                                        <td class="ps-9">
                                            
                                            <div class="d-flex flex-column">
                                                
                                                <p class="mb-0">
                                                <span class="ps-3 mb-0">
                                                    <span class="text-primary fw-bold fs-5  mb-1">USERNAME: </span> 
                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->username}}</span>
                                                    
                                                    
                                                </span>
                                                <span class="ps-3 mb-0">
                                                    <span class="text-primary fw-bold fs-5  mb-1">PASSWORD: </span> 
                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->password}}</span>
                                                </span>
                                                </p>
                                                
                                                <p class="ps-3 mb-0">
                                                    <span class="text-primary fw-bold fs-5  mb-1">Xtream Url: </span> 
                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->panel->xtream_url}}</span>
                                                </p>

                                                <p class="ps-3 mb-0">
                                                    <span class="text-primary fw-bold fs-5  mb-1">Smart Tv Url: </span> 
                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->panel->smart_url}}</span>
                                                </p>
                                            </div>
                                        </td>
                                        
                                        <td class="text-center px-0">
                                            @if($trial->user_id)
                                            Assigned
                                            @else
                                            <button type="button" class="btn btn-light btn-sm btn-active-light-primary selectuser" data-trial="{{$trial->id}}">Select
                                                User</button>
                                            @endif
                                        </td>
                                        <!--end::Author=-->
                                        <!--begin::Progress=-->
                                        <td>
                                            @if($trial->user_id)
                                            <span class="me-2 fw-boldest mb-2">{{$trial->updated_at->format('d M Y h:i A')}}  </span>  
                                            @endif
                                        </td>
                                    
                                    </tr>
                                @endforeach
        
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
        
            </div>
            
        </div>
    </div>
    
    
</div>
@endsection
@section('modals')
    <div class="modal fade" id="withdraw_money" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Withdraw Bonus</h2>
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body mx-5 mx-xl-15">
                    <!--begin::Form-->
                    <form method="POST" action="{{route('withdrawals.store')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

                        
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Amount <span class="small text-muted">(Balance: ₦{{$user->balance}})</span></label>
                            <!--end::Label-->

                            <input type="number" id="amount" name="amount" max="{{$maximum > $user->balance ? $user->balance : $maximum}}" min="{{$minimum}}" class="form-control form-control-solid" placeholder="Amount">
                            <div class="form-text">
                                Minimum Withdrawal: {{$minimum}}, Maximum Withdrawal: {{$maximum > $user->balance ? $user->balance : $maximum}}
                            </div>
                        </div>
                        
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3">
                                Discard
                            </button>

                            <button type="submit" id="withdrawal_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <div class="modal fade" id="selectuser" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Select Referree</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body mx-5 mx-xl-15">
                    <!--begin::Form-->
                    <form id="kt_selectuser_form" method="POST" action="{{route('update_trial')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

                        <input type="hidden" name="trial_id" id="trial_id">
                        
                        <div class="mb-10 row">
                            <label class="form-label">User</label>
                            <select name="user_id" id="user_id" class="form-select form-select-solid" data-control="select2"  data-dropdown-parent="#selectuser" data-placeholder="Select an option" data-allow-clear="true">
                                <option></option>
                                @foreach ($user->referrals as $referral)
                                    <option value="{{$referral->id}}">{{$referral->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset"  class="btn btn-light me-3">
                                Discard
                            </button>

                            <button type="submit" name="action" value="update" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <div class="modal fade" id="extendSubscription" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Extend Subscription</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body mx-5 mx-xl-15">
                    <!--begin::Form-->
                    <form id="kt_selectuser_form" method="POST" action="{{route('update_trial')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

                        <input type="hidden" name="subscription_id" id="extend_subscription_id">
                        <div class="form-group">
                            <label for="">Number of Months</label>
                            <input type="text" name="months" class="form-control">
                        </div>
                        
                        
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset"  class="btn btn-light me-3">
                                Discard
                            </button>

                            <button type="submit" name="action" value="update" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    
@endsection
@push('scripts')
<script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    var subscriptionTable = $("#subscriptionTable").DataTable({});
    var transactionTable = $("#transactionTable").DataTable({});
    var notificationTable = $("#notificationTable").DataTable({});
    var referralTable = $("#referralTable").DataTable({});
    var withdrawalTable = $("#withdrawalTable").DataTable({});
    var trialTable = $("#trialTable").DataTable({});

    $('#searchSubscription').on('keyup',function(){
        subscriptionTable.search($(this).val()).draw();
    });
    $('#searchTransaction').on('keyup',function(){
        transactionTable.search($(this).val()).draw();
    });
    $('#searchNotification').on('keyup',function(){
        notificationTable.search($(this).val()).draw();
    });
    $('#searchReferral').on('keyup',function(){
        referralTable.search($(this).val()).draw();
    });
    $('#searchWithdrawal').on('keyup',function(){
        withdrawalTable.search($(this).val()).draw();
    });
    $('#searchTrial').on('keyup',function(){
        trialTable.search($(this).val()).draw();
    });
    
</script>
<script>
    $('.selectuser').on('click',function(){
        $('#trial_id').val($(this).attr('data-trial'))
        $('#selectuser').modal('show')
    })
    $(document).ready(function ($) {
        let urls = {dashboard:"{{route('dashboard')}}",transactions:"{{route('transactions')}}",notifications:"{{route('notifications')}}",referrals:"{{route('referrals')}}",withdrawals:"{{route('withdrawals')}}",freetrials:"{{route('freetrials')}}"}
        let current = window.location.href;
        let key = Object.keys(urls).find(k=>urls[k]===current);
        // console.log(key)
        $('.nav-link[href="#' + key + '"]' ).trigger('click');
        $('.nav-link[href="#' + key + '"]' ).addClass('active');
    })
</script>
<script>
    $(document).on('click','.buy',function(){
        $(this).closest('.action').find('.quantity').first().val(1)
        $(this).closest('.action').find('.amount').first().val($(this).closest('.action').find('.price').first().val())
        $(this).closest('.action').find('.buyvalues').fadeIn();
        // let name = $(this).closest('.action').find('.plan_name').val();
        // $('#selected_plans').append(`<p>${name} x 1 </p>`)
        $(this).hide();

        getAmount();
    })

    $(document).on('click','.buy_plus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let price = $(this).closest('.action').find('.price').first().val()
        let amount = $(this).closest('.action').find('.amount').first()
        let new_quantity = parseInt(input.val()) + 1
        input.val(new_quantity)
        amount.val(new_quantity * parseInt(price))
        getAmount();
    })

    $(document).on('click','.buy_minus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let price = $(this).closest('.action').find('.price').first().val()
        let amount = $(this).closest('.action').find('.amount').first()
        let new_quantity = parseInt(input.val()) - 1
        input.val(new_quantity)
        amount.val(new_quantity * parseInt(price))
        if(input.val() < 1){
            $(this).closest('.action').find('.buy').fadeIn();
            $(this).closest('.action').find('.buyvalues').hide()
        }
        getAmount();
        
    })
    function getAmount(){
        let amount = 0;
        $('.amount').each(function(index,vals){
            amount += parseInt(vals.value)
        })
        if(amount > 0){
            $('.total_area').show()
            $('#grandtotal').text(amount);
        }else{
            $('.total_area').hide()
        }
        
    }
</script>
<script>
    var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

    if (elements && elements.length > 0) {
        elements.forEach((element) => {
            if (element.getAttribute("data-kt-initialized") === "1") {
                return;
            }

            element.setAttribute("data-kt-initialized", "1");

            element.addEventListener("click", function(e) {
                e.preventDefault();

                const modalEl = document.querySelector(this.getAttribute("data-bs-stacked-modal"));

                if (modalEl) {
                    const modal = new bootstrap.Modal(modalEl);
                    modal.show();
                }
            });
        });
    }
</script>
@endpush
