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
        <div class=" pe-md-10 mb-10 mb-md-0">
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
                            
                            <p class="fw-bold text-primary text-center mt-3">NAME: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="XOFLIX" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">XOFLIX</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                            <p class="fw-bold text-primary text-center mt-3">USERNAME: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$subscription->username}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$subscription->username}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                            <p class="fw-bold text-primary text-center mt-3">PASSWORD: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$subscription->password}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$subscription->password}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                        
                            
                            <p class="fw-bold text-primary text-center mt-3">XTREAM URL: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$subscription->link->url}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$subscription->link->url}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                            <p class="fw-bold text-primary text-center mt-3">SMART TV URL: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$subscription->m3u_link}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$subscription->m3u_link}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                            
                            <table class="table">
                                <tr>
                                    <td><span class="fw-bold text-primary">Connections: </span> </td>
                                    <td>{{$subscription->connections}} Device</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-bold text-primary">EXPIRY: </span> 
                                    </td>
                                    <td class="">
                                        @if($subscription->end_at->diffInDays(now()) > 7 )
                                        <span>{{$subscription->end_at->format('d M Y h:i A')}}</span> 
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#premium_details" class="btn btn-sm btn-primary ml-2">Extend</button>
                                        <div class="modal fade" id="premium_details" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <!--begin::Modal content-->
                                                
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bolder" data-kt-calendar="title">Extend</h2>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('subscription.renew')}}" method="post">@csrf
                                                            <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                                                            <input type="hidden" name="description" value="extend">
                                                            <div class=" mb-6">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6">Number of Months</label>
                                                                <!--end::Label-->
                            
                                                                <!--begin::Col-->
                                                                <div class="fv-row fv-plugins-icon-container">
                                                                    <input type="number" value="1" name="duration" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                                placeholder="Number of Months" >
                                                                    <div
                                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <div class=" flex-center">
                                                                <!--begin::Button-->
                                                                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger me-3">Cancel</button>
                                                                <!--end::Button-->
                                                                <!--begin::Button-->
                                                                <button type="submit" class="btn btn-primary">
                                                                    <span class="indicator-label">Continue</span>
                                                                </button>
                                                                <!--end::Button-->
                                                            </div>
                                                        </form>
                                                        
                                                    </div>
                                                   
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        @else 
                                        <form action="{{route('subscription.renew')}}" method="post">@csrf
                                            <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                                            <input type="hidden" name="description" value="renew">
                                            <input type="hidden" name="duration" value="{{$subscription->duration}}">
                                            <span>{{$subscription->end_at->format('d M Y h:i A')}}</span> <button type="submit" class="btn btn-sm btn-primary">Renew</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-bold text-primary">REMAINING: </span> 
                                    </td>
                                    <td class="">
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
                            
                            
                            <p class="fw-bold text-primary text-center mt-3">NAME: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="XOFLIX" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">XOFLIX</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                            <p class="fw-bold text-primary text-center mt-3">USERNAME: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$trial->username}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$trial->username}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                            <p class="fw-bold text-primary text-center mt-3">PASSWORD: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$trial->password}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$trial->password}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>

                            <p class="fw-bold text-primary text-center mt-3">XTREAM URL: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$trial->link->url}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$subscription->link->url}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>

                            <p class="fw-bold text-primary text-center mt-3">SMART TV URL: </p>
                            <div class="input-group input-group-lg">
                                <input type="text" value="{{$trial->m3u_link}}" class="form-control form-control-solid"/>
                                <span class="clipboard_value" style="display: none">{{$subscription->m3u_link}}</span>
                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                    <span class="svg-icon svg-icon-2 copy_icon">
                                        Copy
                                    </span> 
                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                </button>
                            </div>
                            
                            
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="fw-bold text-primary">EXPIRY: </span> 
                                    </td>
                                    <td class="">
                                        <span>{{$trial->created_at->addHours(6)->format('d M Y h:i A')}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw-bold text-primary">REMAINING: </span> 
                                    </td>
                                    <td class="">
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
        

      
        
    </div>
    
    <!--end::Body-->
</div>