@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

@endpush
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
                                        <a href="#kt_modal_subscription" data-bs-toggle="modal" class="btn btn-primary">Purchase Subscription</a>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body px-0 px-md-9">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
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
                                                                        <p class="ps-3 mb-0 d-flex">
                                                                            <span class="text-primary fw-bold fs-5">Username: 
                                                                                <span id="subscription_username_clipboard{{$subscription->id}}" class="text-gray-400 fw-bold">{{$subscription->xtream_username}}</span>
                                                                                <button id="_subscription_username_clipboard{{$subscription->id}}" data-clipboard-target="#subscription_username_clipboard{{$subscription->id}}" class="copybutton btn btn-active-color-primary btn-color-gray-400 pt-0  btn-sm btn-outline-light">
                                                                                    <span class="svg-icon svg-icon-2">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                                                                            <path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
                                                                                        </svg>
                                                                                    </span>     
                                                                                </button>
                                                                            </span> 
                                                                            <span class="text-primary fw-bold fs-5">Password: 
                                                                                <span id="subscription_password_clipboard{{$subscription->id}}" class="text-gray-400 fw-bold  d-inline">{{$subscription->xtream_password}}</span>
                                                                                <button id="_subscription_password_clipboard{{$subscription->id}}" data-clipboard-target="#subscription_password_clipboard{{$subscription->id}}" class="copybutton btn btn-active-color-primary btn-color-gray-400 pt-0  btn-sm btn-outline-light">
                                                                                    <span class="svg-icon svg-icon-2">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                                                                            <path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
                                                                                        </svg>
                                                                                    </span>     
                                                                                </button>
                                                                            </span> 
                                                                            <span class="text-primary fw-bold fs-5">Url:
                                                                                <span id="subscription_link1_clipboard{{$subscription->id}}" class="text-gray-400 fw-bold  d-inline">{{$subscription->xtream_link}} </span> 
                                                                                <button id="_subscription_link1_clipboard{{$subscription->id}}" data-clipboard-target="#subscription_link1_clipboard{{$subscription->id}}" class="copybutton btn btn-active-color-primary btn-color-gray-400 pt-0  btn-sm btn-outline-light">
                                                                                    <span class="svg-icon svg-icon-2">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                                                                            <path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
                                                                                        </svg>
                                                                                    </span>     
                                                                                </button>
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
                                                                        <span class="text-primary fw-bold fs-5">Url:
                                                                            <span id="subscription_link2_clipboard{{$subscription->id}}" class="text-gray-400 fw-bold  d-inline"> {{$subscription->m3u_link}}</span>
                                                                            <button id="_subscription_link2_clipboard{{$subscription->id}}" data-clipboard-target="#subscription_link2_clipboard{{$subscription->id}}" class="copybutton btn btn-active-color-primary btn-color-gray-400 pt-0  btn-sm btn-outline-light">
                                                                                <span class="svg-icon svg-icon-2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                                                                        <path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
                                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
                                                                                    </svg>
                                                                                </span>     
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
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Logo-->
                                                                <div class="symbol symbol-50px me-2">
                                                                    <span class="symbol-label">
                                                                        <img alt="" class="w-25px" @if($trial->type == 'xtream') src="{{asset('media/svg/brand-logos/aven.svg')}}" @else src="{{asset('media/svg/brand-logos/atica.svg')}}" @endif />
                                                                    </span>
                                                                </div>
                                                                <!--end::Logo-->
                                                                <div class="ps-3">
                                                                    <a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">{{$trial->type}}</a>
                                                                    <span class="text-gray-400 fw-bold d-inline">Paid</span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                @if($trial->type == 'xtream')
                                                                <p class="ps-3 mb-0 d-flex flex-nowrap">
                                                                    <span class="text-primary fw-bold fs-5">Username: 
                                                                        <span id="trial_username_clipboard{{$trial->id}}" class="text-gray-400 fw-bold">{{$trial->username}}</span>
                                                                        <button id="_trial_username_clipboard{{$trial->id}}" data-clipboard-target="#trial_username_clipboard{{$trial->id}}" class="copybutton btn btn-active-color-primary btn-color-gray-400 pt-0  btn-sm btn-outline-light">
                                                                            <span class="svg-icon svg-icon-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
                                                                                </svg>
                                                                            </span>     
                                                                        </button>
                                                                    </span> 
                                                                    <span class="text-primary fw-bold fs-5">Password: 
                                                                        <span id="trial_password_clipboard{{$trial->id}}" class="text-gray-400 fw-bold  d-inline">{{$trial->password}}</span>
                                                                        <button id="_trial_password_clipboard{{$trial->id}}" data-clipboard-target="#trial_password_clipboard{{$trial->id}}" class="copybutton btn btn-active-color-primary btn-color-gray-400 pt-0  btn-sm btn-outline-light">
                                                                            <span class="svg-icon svg-icon-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
                                                                                </svg>
                                                                            </span>     
                                                                        </button>
                                                                    </span> 
                                                                </p>
                                                                @endif
                                                                <p class="ps-3 mb-0">
                                                                    <span id="trial_link_clipboard{{$trial->id}}" class="text-primary fw-bold fs-5  mb-1">Url: </span> 
                                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->link}}</span>
                                                                    <button id="_trial_link_clipboard{{$trial->id}}" data-clipboard-target="#trial_link_clipboard{{$trial->id}}" class="copybutton btn btn-active-color-primary btn-color-gray-400 pt-0  btn-sm btn-outline-light">
                                                                        <span class="svg-icon svg-icon-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.5" d="M18 2H9C7.34315 2 6 3.34315 6 5H8C8 4.44772 8.44772 4 9 4H18C18.5523 4 19 4.44772 19 5V16C19 16.5523 18.5523 17 18 17V19C19.6569 19 21 17.6569 21 16V5C21 3.34315 19.6569 2 18 2Z" fill="black"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7857 7.125H6.21429C5.62255 7.125 5.14286 7.6007 5.14286 8.1875V18.8125C5.14286 19.3993 5.62255 19.875 6.21429 19.875H14.7857C15.3774 19.875 15.8571 19.3993 15.8571 18.8125V8.1875C15.8571 7.6007 15.3774 7.125 14.7857 7.125ZM6.21429 5C4.43908 5 3 6.42709 3 8.1875V18.8125C3 20.5729 4.43909 22 6.21429 22H14.7857C16.5609 22 18 20.5729 18 18.8125V8.1875C18 6.42709 16.5609 5 14.7857 5H6.21429Z" fill="black"></path>
                                                                            </svg>
                                                                        </span>     
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
                                    <h2 class="mb-9 d-flex justify-content-between">
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
                                                    <th class="min-w-125px">M3U</th>
                                                    
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 fw-semibold">
                                                @foreach ($user->subscriptions as $subscription)
                                                <tr>
        
                                                    <td class="d-flex align-items-center">
                                                        @if($subscription->end_at > now()) Ongoing @else Expired @endif
                                                    </td>
                                                    <td>
                                                        {{$subscription->start_at->format('d M Y h:i A')}}
                                                    </td>
                                                    <td>
                                                        {{$subscription->end_at->format('d M Y h:i A')}}
                                                    </td>
                                                    <td>
                                                            <span>Username:{{$subscription->xtream_username}} | Password: {{$subscription->xtream_password}}</span>
                                                            <span class="d-block"> {{$subscription->xtream_link}}</span>
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
                            <!--end::Table Widget 1-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        
                        <!--end::Col-->
                    </div>
                    
        
                    
                </div>
                <!--end::Body-->
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
                                @foreach ($user->payments->where('status','success') as $payment)
                                    <tr>
                                        <td class="ps-9">{{$payment->created_at->format('M d, Y')}}</td>
                                        <td class="">{{$payment->reference}}</td>
                                        <td class="ps-0">{{$payment->method}}  </td>
                                        <td>₦{{$payment->amount}}</td>
                                        <td class="text-success">Success</td>
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
                                @foreach ($user->notifications()->orderBy('created_at','desc') as $notification)
                                    <tr>
                                        <td class="ps-9">{{$notification->created_at->calendar()}}</td>
                                        <td class="ps-0">Subject </td>
                                        <td>Body</td>
                                        <td class="text-success">Read</td>
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
                        <div class="col-xl-6 mb-15 mb-xl-0 pe-5">
                            <h4 class="mb-0">How to use Referral Program</h4>
        
                            <p class="fs-6 fw-semibold text-gray-600 py-4 m-0">
                                Use images to enhance your post, improve its flow, add humor <br> and
                                explain complex topics
                            </p>
        
                            <a href="https://preview.keenthemes.com/ceres-html-pro/?page=account/referrals#"
                                class="btn btn-light btn-active-light-primary fw-bold">Get Started</a>
                        </div>
                        <!--end::Col-->
        
                        <!--begin::Col-->
                        <div class="col-xl-6">
                            <h4 class="text-gray-800 mb-0">
                                Your Referral Link
                            </h4>
        
                            <p class="fs-6 fw-semibold text-gray-600 py-4 m-0">
                                Plan your blog post by choosing a topic, creating an outline conduct <br>
                                research, and checking facts
                            </p>
        
                            <div class="d-flex">
                                <input id="kt_referral_link_input" type="text"
                                    class="form-control form-control-solid me-3 flex-grow-1" name="search"
                                    value="{{route('referring',$user)}}">
        
                                <button id="kt_referral_program_link_copy_btn"
                                    class="btn btn-light btn-active-light-primary fw-bold flex-shrink-0"
                                    data-clipboard-target="#kt_referral_link_input">Copy Link</button>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Overview-->
        
                    
        
                    <!--begin::Info-->
                    <p class="fs-5 fw-semibold text-gray-600 py-6">
                        Writing headlines for blog posts is as much an art as it is a science, and probably
                        warrants its own post,
                        but for now, all I’d advise is experimenting with what works for your audience,
                        especially if it’s not resonating with your audience
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
                                    account. Minimum withdrawal amount is ₦2,000 per transaction and maximum of ₦100,000 per transaction.</div>
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
                                            <div class="d-flex align-items-center">
                                                <!--begin::Logo-->
                                                <div class="symbol symbol-50px me-2">
                                                    <span class="symbol-label">
                                                        <img alt="" class="w-25px" @if($trial->type == 'xtream') src="{{asset('media/svg/brand-logos/aven.svg')}}" @else src="{{asset('media/svg/brand-logos/atica.svg')}}" @endif />
                                                    </span>
                                                </div>
                                                <!--end::Logo-->
                                                <div class="ps-3">
                                                    <a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">{{$trial->type}}</a>
                                                    <span class="text-gray-400 fw-bold d-inline">Trial</span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                @if($trial->type == 'xtream')
                                                <p class="mb-0">
                                                <span class="ps-3 mb-0">
                                                    <span class="text-primary fw-bold fs-5  mb-1">Username: </span> 
                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->username}}</span>
                                                    
                                                    
                                                </span>
                                                <span class="ps-3 mb-0">
                                                    <span class="text-primary fw-bold fs-5  mb-1">Password: </span> 
                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->password}}</span>
                                                </span>
                                                </p>
                                                @endif
                                                <p class="ps-3 mb-0">
                                                    <span class="text-primary fw-bold fs-5  mb-1">Url: </span> 
                                                    <span class="text-gray-400 fw-bold  d-inline">{{$trial->link}}</span>
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
                    <form id="kt_withdraw_money_form" method="POST" action="" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

                        
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                            <!--end::Label-->

                            <input type="number" id="amount" name="amount" class="form-control form-control-solid" placeholder="Amount" value="">

                        </div>
                        
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">
                                Discard
                            </button>

                            <button type="button" id="assign_submit" class="btn btn-primary">
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
                    <form id="kt_selectuser_form" method="POST" action="{{route('assign_trial')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

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
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">
                                Discard
                            </button>

                            <button type="submit" id="assign_submit" class="btn btn-primary">
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

    <div class="modal fade" id="kt_modal_subscription" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-fullscreen">
            <!--begin::Modal content-->
            <div class="modal-content shadow-none">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    @include('layouts.subscription')
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
        console.log(key)
        $('.nav-link[href="#' + key + '"]' ).trigger('click');
        $('.nav-link[href="#' + key + '"]' ).addClass('active');
    })
</script>
@endpush