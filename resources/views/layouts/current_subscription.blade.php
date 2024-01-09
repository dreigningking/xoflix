<div class="card card-xxl-stretch">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5 pb-3">
        <!--begin::Card title-->
        <h3 class="card-title fw-bolder text-gray-800 fs-2">Current Subscription Summary</h3>
        @if($user->activeSubscriptions->isEmpty())
        <div class="card-toolbar">
            <a href="{{route('subscription.purchase')}}" class="btn btn-info">Purchase Subscription</a>
        </div>
        @elseif(Route::is('subscription'))
        <div class="card-toolbar">
            <a href="{{route('subscription.purchase')}}" class="btn btn-info">Purchase Subscription</a>
        </div>
        @endif
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body px-0 px-md-9">
        <!--begin::Table-->
        <div class=" pe-md-10 mb-10 mb-md-0">
            @if($user->activeSubscriptions->isNotEmpty())
                <div class="py-5 d-flex flex-column justify-content-between">
                    @foreach ($user->activeSubscriptions as $subscription)
                        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_{{$subscription->id}}">
                            View Subscription
                        </button>
                        <div class="modal fade" tabindex="-1" id="kt_modal_stacked_{{$subscription->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Details</h3>
            
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
            
                                    <div class="modal-body">
                                        
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
                                                <input type="text" value="{{$subscription->panel->xtream_url}}" class="form-control form-control-solid"/>
                                                <span class="clipboard_value" style="display: none">{{$subscription->panel->xtream_url}}</span>
                                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                        Copy
                                                    </span> 
                                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                </button>
                                            </div>
                                            
                                            <p class="fw-bold text-primary text-center mt-3">SMART TV URL: </p>
                                            <div class="input-group input-group-lg">
                                                <input type="text" value="{{$subscription->panel->smart_url}}" class="form-control form-control-solid"/>
                                                <span class="clipboard_value" style="display: none">{{$subscription->panel->smart_url}}</span>
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
                                                        
                                                        <span>{{$subscription->end_at->format('d M Y h:i A')}}</span> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        @if($subscription->end_at->diffInDays(now()) > 7 )
                                                        
                                                        <button type="button" data-bs-stacked-modal="#extend{{$subscription->id}}" class="btn w-100 btn-info ml-2"> <i class="fa fa-recycle"></i>Extend</button>
                                                        <div class="modal fade" id="extend{{$subscription->id}}" tabindex="-1" aria-hidden="true">
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
                                                            <span>{{$subscription->end_at->format('d M Y h:i A')}}</span> 
                                                            <button type="submit" class="btn w-100 btn-info"><i class="fa fa-refresh"></i> Renew</button>
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
                                        
                                    </div>
            
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>

            @endif


            @if($user->activeTrials->isNotEmpty())
                <div class="py-5 d-flex flex-column justify-content-between">
                    @foreach ($user->activeTrials as $trial)
                        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#kt_modal_trial_{{$trial->id}}">
                            Subscription: {{$trial->username}}
                        </button>
                        <div class="modal fade" tabindex="-1" id="kt_modal_trial_{{$trial->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Details</h3>
            
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
            
                                    <div class="modal-body">
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
                                                <input type="text" value="{{$trial->panel->xtream_url}}" class="form-control form-control-solid"/>
                                                <span class="clipboard_value" style="display: none">{{$subscription->panel->xtream_url}}</span>
                                                <button type="button" class="copy_button px-2 py-1 btn btn-primary btn-sm">
                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                        Copy
                                                    </span> 
                                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                </button>
                                            </div>
        
                                            <p class="fw-bold text-primary text-center mt-3">SMART TV URL: </p>
                                            <div class="input-group input-group-lg">
                                                <input type="text" value="{{$trial->panel->smart_url}}" class="form-control form-control-solid"/>
                                                <span class="clipboard_value" style="display: none">{{$subscription->panel->smart_url}}</span>
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
                                        
                                        
                                    </div>
            
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                       
                    @endforeach
                </div>
            @endif
            @if($user->activeSubscriptions->isEmpty() && $user->activeTrials->isEmpty()) 
                <p class="text-center fw-bold">No Subscription</p>
            @endif
            
        </div>
        

      
        
    </div>

    @if(auth()->user()->subscriptions->whereNotNull('end_at')->where('end_at','>',now())->where('end_at','>',now()->addDays(7))->isNotEmpty())
    <div class="card-body px-0 px-md-9">    
        <div class="alert alert-warning" role="alert">
            <h3 class=" fw-bolder text-gray-800 fs-2">Subscription Expiry</h3>
            You have subscriptions that are expiring within 7 days or less. Renew your subscriptions or purchase new subscriptions to continue to have access to Xoflix TV
        </div>    
    </div>    
    @endif
    @if(auth()->user()->subscriptions->whereNotNull('end_at')->where('end_at','<',now())->isNotEmpty())
    <div class="card-body px-0 px-md-9">
        <h3 class=" fw-bolder text-gray-800 fs-2">Expired Subscriptions</h3>
        <div class="pe-md-10 my-10">
            <div class="table-responsive">
            <table class="table borderless">
                <tr>
                    <th>Start Date</th>
                    <th>Details</th>
                    <th>Renew</th>
                </tr>
                @foreach(auth()->user()->subscriptions->whereNotNull('end_at')->where('end_at','<',now()) as $subscription)
                <tr>
                    <td>
                        {{$subscription->start_at->format('d M Y h:i A')}}
                    </td>
                    <td>
                        <span class="">USERNAME:{{$subscription->username}}  | </span><span  class="d-m-block text-nowrap">PASSWORD: {{$subscription->password}}</span> <br>
                        <span class="d-block text-nowrap"> XTREAM URL {{$subscription->panel->xtream_url}} |</span> <span class="d-m-block text-nowrap"> SMART URL {{$subscription->panel->smart_url}}</span>
                    </td>
                    <td>
                        
                        <form action="{{route('subscription.renew')}}" method="post" onsubmit="return confirm('Are you sure you want to renew')">@csrf
                            <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                            <input type="hidden" name="description" value="renew">
                            <input type="hidden" name="duration" value="{{$subscription->duration}}">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i> Renew</button>
                        </form>
                        
                    </td>
                    
                </tr>
                @endforeach
            </table>
            </div>
        </div>
    </div>
    @endif
    <!--end::Body-->
</div>
