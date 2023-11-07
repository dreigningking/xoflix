@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('breadcrumb')
<div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap">
        
    <div class="page-title d-flex flex-column">
        <!--begin::Title-->
        <h1 class="d-flex text-white fw-bold fs-2qx my-1 me-5">
            Subscriptions
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
                Subscriptions
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
    
    <div class="card mb-5 mb-xl-10">
        <!--begin::Body-->
        <div class="card-body">
            <div class="row gy-5 g-xl-8">

                <div class="col-xxl-12">
                    <!--begin::Table Widget 1-->
                    <div class="card card-xxl-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5 pb-3">
                            <!--begin::Card title-->
                            <h3 class="card-title fw-bolder text-gray-800 fs-2">Current Subscription Summary</h3>
                            <div class="card-toolbar">
                                <a href="{{route('subscription.purchase')}}" class="btn btn-primary">Purchase Subscription</a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body px-0 px-md-9">
                            <!--begin::Table-->
                            <div class=" pe-md-10 mb-10 mb-md-0 d-md-none">
                                @if($user->activeSubscriptions->isNotEmpty())
                                    @foreach ($user->activeSubscriptions as $subscription)
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_{{$subscription->id}}">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                        <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                <span class="svg-icon toggle-off svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">Subscription: {{$subscription->username}}</h4>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div id="kt_job_{{$subscription->id}}" class="collapse fs-6 ms-1">
                                            <!--begin::Text-->
                                            <div class="mb-4 text-gray-600 fw-bold fs-6">
                                                {{-- <p class="fw-bold text-primary text-center mt-3">LINK: </p>
                                                <p class="d-flex justify-content-between border-bottom border-dark pb-2">
                                                    <span class="clipboard_value">{{$subscription->link->url}}</span>
                                                    <button class="copy_button ms-1 px-2 py-1 btn btn-light border border-dark btn-sm">
                                                        <span class="svg-icon svg-icon-2 copy_icon">
                                                            Copy
                                                        </span> 
                                                        <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                    </button>
                                                    
                                                </p> --}}
                                                <p class="fw-bold text-primary text-center mt-3">NAME: </p>
                                                <p class="d-flex justify-content-between border-bottom border-dark pb-2">
                                                    <span class="clipboard_value">XOFLIX</span>
                                                    <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                        <span class="svg-icon svg-icon-2 copy_icon">
                                                            Copy
                                                        </span> 
                                                        <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                    </button>
                                                    
                                                </p>
                                                <p class="fw-bold text-primary text-center mt-3">USERNAME: </p>
                                                <p class="d-flex justify-content-between border-bottom border-dark pb-2">
                                                    <span class="clipboard_value">{{$subscription->username}}</span>
                                                    <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                        <span class="svg-icon svg-icon-2 copy_icon">
                                                            Copy
                                                        </span> 
                                                        <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                    </button>
                                                    
                                                </p>
                                                <p class="fw-bold text-primary text-center mt-3">PASSWORD: </p>
                                                <p class="d-flex justify-content-between border-bottom border-dark pb-2">
                                                    <span class="clipboard_value">{{$subscription->password}}</span>
                                                    <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                        <span class="svg-icon svg-icon-2 copy_icon">
                                                            Copy
                                                        </span> 
                                                        <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                    </button>
                                                    
                                                </p>
                                            
                                                
                                                <p class="fw-bold text-primary text-center mt-3">SMART TV URL: </p>
                                                <p class="d-flex justify-content-between  pb-2">
                                                    <div class="clipboard_value"> {{$subscription->m3u_link}}</div>
                                                    <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                        <span class="svg-icon svg-icon-2 copy_icon">
                                                            Copy
                                                        </span> 
                                                        <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                    </button>
                                                </p>
                                                <p class="border-bottom border-dark"></p>
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">EXPIRY: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            @if($subscription->end_at->diffInDays(now()) > 7 )
                                                            <span>{{$subscription->end_at->format('d M Y h:i A')}}</span>
                                                            @else 
                                                            <form action="{{route('subscription.renew')}}" method="post">@csrf
                                                                <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                                                                <button type="submit" class="btn btn-sm btn-primary">Renew</button>
                                                            </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">REMAINING: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            <span>{{$subscription->end_at->diffInDays(now())}} days</span>
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    </div>
                                    @endforeach
                                @endif
                                @if($user->activeTrials->isNotEmpty())
                                    @foreach ($user->activeTrials as $trial)
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_trial_{{$trial->id}}">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                        <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                <span class="svg-icon toggle-off svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <h4 class="text-gray-700 fw-bolder cursor-pointer mb-0">Trial</h4>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div id="kt_trial_{{$trial->id}}" class="collapse fs-6 ms-1">
                                            <!--begin::Text-->
                                            <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">
                                                
                                                
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">NAME: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="clipboard_value">XOFLIX</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span> 
                                                                <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">USERNAME: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="clipboard_value">{{$trial->username}}</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span> 
                                                                <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">PASSWORD: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="clipboard_value">{{$trial->password}}</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span> 
                                                                <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">SMART TV URL: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="clipboard_value">{{$trial->link->url}}</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span> 
                                                                <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                                
                                                
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">EXPIRY: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            <span>{{$trial->created_at->addHours(6)->format('d M Y h:i A')}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold text-primary">REMAINING: </span> 
                                                        </td>
                                                        <td class="text-end">
                                                            <span>{{$trial->created_at->addHours(6)->diffInHours(now())}} hours</span>
                                                        </td>
                                                        
                                                    
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                    </div>
                                    @endforeach
                                @endif
                                @if($user->activeSubscriptions->isEmpty() && $user->activeTrials->isEmpty()) 
                                    <p class="text-center fw-bold">No Subscription</p>
                                @endif
                                
                            </div>
                            

                            <div class="table-responsive d-none d-md-block">
                                <table class="table align-middle table-bordered table-row-dashed gy-5" id="kt_table_widget_1">
                                    <!--begin::Table body-->
                                    <tbody>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                            <th class="min-w-150px">DETAILS</th>
                                            
                                            <th class="min-w-150px">Start</th>
                                            <th class="min-w-150px">Expiry</th> 
                                        </tr>
                                        @foreach ($user->activeSubscriptions as $subscription)
                                            <tr>
                                                <!--begin::Author=-->
                                                <td class="">
                                                    <div class="d-flex flex-column">
                                                        <div class="d-flex align-items-top">
                                                            <!--begin::Logo-->
                                                            <div class="symbol symbol-50px me-2">
                                                                <span class="symbol-label">
                                                                    <img alt="" class="w-25px" src="{{asset('media/svg/brand-logos/aven.svg')}}" />
                                                                </span>
                                                            </div>
                                                            <!--end::Logo-->
                                                            <div class="ps-3">
                                                                <p class="ps-3 mb-0 d-flex justify-content-between">
                                                                    <span class="text-primary fw-bold fs-5">NAME: 
                                                                        <span class="text-gray-400 fw-bold clipboard_value">XOFLIX</span>
                                                                        <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                            <span class="svg-icon svg-icon-2 copy_icon">
                                                                                Copy
                                                                            </span> 
                                                                            <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                                        </button>
                                                                    </span> 
                                                                    <span class="text-primary fw-bold fs-5">USERNAME: 
                                                                        <span class="text-gray-400 fw-bold clipboard_value">{{$subscription->username}}</span>
                                                                        <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                            <span class="svg-icon svg-icon-2 copy_icon">
                                                                                Copy
                                                                            </span> 
                                                                            <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                                        </button>
                                                                    </span> 
                                                                    <span class="text-primary fw-bold fs-5"> PASSWORD: 
                                                                        <span class="text-gray-400 fw-bold d-inline clipboard_value">{{$subscription->password}}</span>
                                                                        <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                            <span class="svg-icon svg-icon-2 copy_icon">
                                                                                Copy
                                                                            </span>  
                                                                            <i class="bi bi-check p-0 check_icon" style="display: none"></i>   
                                                                        </button>
                                                                    </span> 
                                                                    <span class="text-primary fw-bold fs-5">Smart Tv Url:
                                                                        <span class="text-gray-400 fw-bold d-inline clipboard_value">{{$subscription->link->url}} </span> 
                                                                        <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                            <span class="svg-icon svg-icon-2 copy_icon">
                                                                                Copy
                                                                            </span>     
                                                                        </button>
                                                                        <i class="bi bi-check p-0 check_icon" style="display: none"></i>
                                                                    </span>
                                                                </p>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center my-5">
                                                            <div class="symbol symbol-50px me-2">
                                                                <span class="symbol-label">
                                                                    <img alt="" class="w-25px" src="{{asset('media/svg/brand-logos/atica.svg')}}" />
                                                                </span>
                                                            </div>
                                                            
                                                            <div class="ps-3">
                                                                <span class="text-primary fw-bold fs-5">Smart Tv Url:
                                                                    <span class="text-gray-400 fw-bold d-inline clipboard_value"> {{$subscription->m3u_link}}</span>
                                                                    <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                        <span class="svg-icon svg-icon-2 copy_icon">
                                                                            Copy
                                                                        </span>   
                                                                        <i class="bi bi-check p-0 check_icon" style="display: none"></i>  
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    <div>

                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </td>
                                                <!--end::Author=-->
                                                <!--begin::Progress=-->
                                                <td>
                                                    <div class="d-flex flex-column me-2 mt-2">
                                                        <span class="me-2 fw-boldest mb-2">{{$subscription->start_at->format('d M Y h:i A')}}  </span>
                                                        
                                                        
                                                    </div>
                                                </td>
                                                <td class="pe-0">
                                                    <span class="me-2 fw-boldest mb-2">{{$subscription->end_at->format('d M Y h:i A')}}</span>
                                                    <span class="me-2 fw-lightest d-block">{{$subscription->end_at->diffInDays(now())}} days remaining</span>  
                                                </td>
                                                
                                                
                                            </tr> 
                                            <!--end::Table row-->
                                        @endforeach
                                        @foreach ($user->activeTrials as $trial)
                                            <tr>
                                                <!--begin::Author=-->
                                                <td class="">
                                                    
                                                    <div class="d-flex flex-column">
                                                        
                                                        <p class="ps-3 mb-0 d-flex flex-nowrap">
                                                            <span class="text-primary fw-bold fs-5">NAME: 
                                                                <span class="text-gray-400 fw-bold clipboard_value">XOFLIX</span>
                                                                <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                                        Copy
                                                                    </span> 
                                                                    <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                                </button>
                                                            </span> 
                                                            <span class="text-primary fw-bold fs-5">USERNAME: 
                                                                <span class="text-gray-400 fw-bold clipboard_value">{{$trial->username}}</span>
                                                                <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                                        Copy
                                                                    </span> 
                                                                    <i class="bi bi-check p-0 check_icon" style="display: none"></i>     
                                                                </button>
                                                            </span> 
                                                            <span class="text-primary fw-bold fs-5">PASSWORD: 
                                                                <span class="text-gray-400 fw-bold d-inline clipboard_value">{{$trial->password}}</span>
                                                                <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                                        Copy
                                                                    </span>  
                                                                    <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                                </button>
                                                            </span> 
                                                        </p>
                                                        
                                                        <p class="ps-3 mb-0">
                                                            <span class="text-primary fw-bold fs-5  mb-1">Smart Tv Url: </span> 
                                                            <span class="text-gray-400 fw-bold d-inline clipboard_value">{{$trial->link->url}}</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span>  
                                                                <i class="bi bi-check p-0 check_icon" style="display: none"></i>    
                                                            </button>
                                                        </p>
                                                    </div>
                                                </td>
                                                <!--end::Author=-->
                                                <!--begin::Progress=-->
                                                <td>
                                                    <div class="d-flex flex-column me-2 mt-2">
                                                        <span class="me-2 fw-boldest mb-2">{{$trial->created_at->format('d M Y h:i A')}}  </span>
                                                        
                                                        
                                                    </div>
                                                </td>
                                                <td class="pe-0">
                                                    <span class="me-2 fw-boldest mb-2">{{$trial->created_at->addHours(6)->format('d M Y h:i A')}}</span>
                                                    <span class="me-2 fw-lightest d-block">{{$trial->created_at->addHours(6)->diffInHours(now())}} hours remaining</span>
                                                    
                                                </td>
                                            
                                            </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            
                        </div>
                        <div class="card-body border">
                            <h2 class="mb-9 d-flex flex-column flex-md-row justify-content-between">
                                <span>History</span>
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                          </svg>
                                    </i>                
                                    <input type="text" id="searchSubscription" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                                </div>
                            </h2>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="subscriptionTable">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-100px">Status</th>
                                            <th class="min-w-125px">Start</th>
                                            <th class="min-w-125px">Expiry</th>
                                            <th class="min-w-125px">XTREAM</th>
                                            <th class="min-w-125px">SMART TV URL</th>
                                            
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($user->subscriptions->where('start_at','!=',null) as $subscription)
                                        <tr>

                                            <td class="d-flex align-items-center">
                                                @if($subscription->end_at > now()) Ongoing @else Expired @endif
                                            </td>
                                            <td>
                                                {{$subscription->start_at->format('d M Y h:i A')}}
                                            </td>
                                            <td>
                                                @if($subscription->end_at->diffInDays(now()) > 7 )
                                                    <span>{{$subscription->end_at->format('d M Y h:i A')}}</span>
                                                @else 
                                                    <form action="{{route('subscription.renew')}}" method="post">@csrf
                                                        <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                                                        <button type="submit" class="btn btn-sm btn-primary">Renew</button>
                                                    </form>
                                                @endif
                                                
                                            </td>
                                            <td>
                                                    <span>USERNAME:{{$subscription->username}} | PASSWORD: {{$subscription->password}}</span>
                                                    <span class="d-block"> {{$subscription->link->url}}</span>
                                            </td>
                                            <td>{{$subscription->m3u_link}}</td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                   
                </div>
                
            </div>
            

            
        </div>
        <!--end::Body-->
    </div>
    
</div>
@endsection

@push('scripts')
<script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    var subscriptionTable = $("#subscriptionTable").DataTable({});
    $('#searchSubscription').on('keyup',function(){
        subscriptionTable.search($(this).val()).draw();
    });
    
</script>
<script>
    $('.selectuser').on('click',function(){
        $('#trial_id').val($(this).attr('data-trial'))
        $('#selectuser').modal('show')
    })
    
</script>

@endpush
