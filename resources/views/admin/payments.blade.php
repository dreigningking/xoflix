@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            <div class="d-none d-md-flex flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
                <!--begin::Card-->
                @include('layouts.menu.admin_desktop')
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-10">

                <!--begin::Referral program-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Body-->
                    <div class="card-body py-10">
                        <h2 class="mb-9">
                            Payment Statistics
                        </h2>


                        <!--begin::Stats-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                    <span class="fs-4 fw-semibold text-info pb-1 px-2">Today</span>
                                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                        ₦<span data-kt-countup="true"
                                            data-kt-countup-value="{{ number_format($thisToday) }}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                    <span class="fs-4 fw-semibold text-success pb-1 px-2">This Week</span>
                                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                        ₦<span data-kt-countup="true"
                                            data-kt-countup-value="{{ number_format($thisWeek) }}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                    <span class="fs-4 fw-semibold text-danger pb-1 px-2">This Month</span>
                                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                        ₦<span data-kt-countup="true"
                                            data-kt-countup-value="{{ number_format($thisMonth) }}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                    <span class="fs-4 fw-semibold text-primary pb-1 px-2">This Year </span>
                                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                        ₦<span data-kt-countup="true"
                                            data-kt-countup-value="{{ number_format($thisYear) }}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Stats-->

                    </div>
                    <!--end::Body-->
                </div>

                <div class="card">
                    <div class="card-header card-header-stretch">
                        <div class="card-title">
                            <h3>Payments </h3>
                        </div>
                        <div class="card-toolbar m-0">
                            
                            <div class="">
                                <span class="fw-bold">{{$payments->where('status','paid')->count()}} Pending Confirmation, {{$payments->where('sub_status',false)->count()}} Pending Subscription</span>
                                <button type="button" class="btn btn-light-primary me-3 mt-4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    Filter
                                </button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->

                                    <!--begin::Content-->
                                    <div class="px-7 py-3" data-kt-user-table-filter="form">
                                        <form action="#" method="get">
                                            <div class="mb-3">
                                                <label class="form-label fs-6 fw-semibold d-block">User: </label>
                                                <div class="">
                                                    <input class="form-control" value="{{$name}}" type="text" name="name">
                                                </div>
                                            </div>

                                            <!--begin::Input group-->
                                            <div class="mb-3">
                                                <label class="form-label fs-6 fw-semibold mr-4">Status: </label>
                                                <select name="status" id="" class="form-select">
                                                    <option value="" @if(!$status) selected @endif>All</option>
                                                    <option value="paid" @if($status == 'paid') selected @endif>Paid</option>
                                                    <option value="pending" @if($status == 'pending') selected @endif>Pending</option>
                                                    <option value="success" @if($status == 'success') selected @endif>Success</option>
                                                    <option value="failed" @if($status == 'failed') selected @endif>Failed</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fs-6 fw-semibold mr-4">Sort Date: </label>
                                                <select name="sortBy" id="" class="form-select">
                                                    <option value="date_desc" @if($sortBy == 'date_desc') selected @endif>Descending</option>
                                                    <option value="date_asc" @if($sortBy == 'date_asc') selected @endif>Ascending</option>
                                                </select>
                                            </div>

                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                    </div>
                                    <!--end::Content-->
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-row-bordered align-middle gy-6">
                            <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten">
                                <tr>
                                    <th class="min-w-125px ps-9">Reference</th>
                                    <th class="min-w-125px">User</th>
                                    <th class="min-w-125px ps-0">Amount</th>
                                    <th class="min-w-125px px-0">Subscription Status</th>
                                    <th class="min-w-125px ps-0">Payment Status</th> 
                                </tr>
                            </thead>
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @forelse ($payments as $payment)
                                    <tr>
                                        <td class="ps-9">
                                            <a @if($payment->proof) href="{{$payment->proof}}"  target="_blank" @endif>{{ $payment->reference }}</a> <br>
                                            {{ $payment->created_at->format('M d, Y') }}
                                            
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#paiduser{{$payment->id}}">{{ $payment->user->name }}</a>
                                            
                                        </td>
                                        
                                        <td> ₦{{ $payment->amount }}</td>
                                        <td class="ps-0">
                                            
                                            @if($payment->status == 'success')
                                                @if(!$payment->sub_status)
                                                     
                                                    <button type="button" class="btn btn-info btn-sm sub_details"
                                                        data_subscription="{{$payment->subscription_id}}" data_username="{{$payment->subscription->username}}" 
                                                        data_password="{{$payment->subscription->password}}" data_link_id="{{$payment->subscription->link_id}}" 
                                                        data_m3u_link="{{$payment->subscription->m3u_link}}" data_panel_id="{{$payment->subscription->panel_id}}" 
                                                        data_user_id="{{$payment->subscription->user_id}}" data_start="{{$payment->subscription->start_at}}"
                                                        data_expiry="{{$payment->subscription->end_at}}" data_plan="{{$payment->subscription->plan->id}}">{{ucwords($payment->description)}} <i class="fa fa-arrow-right"></i> Pending
                                                    </button>
                                                @else 
                                                {{ucwords($payment->description)}} <i class="fa fa-arrow-right"></i> Completed
                                                @endif
                                            @else
                                                Awaiting Confirmation
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if ($payment->status == 'success') 
                                                    <span class="text-success"> {{ ucwords($payment->status) }} </span>
                                                @elseif($payment->status == 'paid') 
                                                    <form action="{{route('admin.payments.confirmation')}}" method="POST" onsubmit="return confirm('Are you sure you want to confirm payment?')">@csrf
                                                        <input type="hidden" name="payment_id" value="{{$payment->id}}">
                                                        <button class="btn btn-sm btn-primary">Confirm</button>
                                                    </form>
                                                @elseif($payment->status == 'failed') 
                                                    <span class="text-danger mx-2"> {{ ucwords($payment->status) }}  </span>
                                                @else 
                                                    <span class="text-warning mr-2"> {{ ucwords($payment->status) }}  </span>
                                                @endif
                                                <form action="{{route('admin.payments.delete')}}" method="POST" onsubmit="return confirm('Are you sure you want to delete payment?')">@csrf
                                                    <input type="hidden" name="payment_id" value="{{$payment->id}}">
                                                    <button class="btn btn-sm btn-danger ms-2 px-2 text-center"> <i class="fa fs-2 ps-1 fa-trash"></i> </button>
                                                </form>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="paiduser{{$payment->id}}" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bolder" data-kt-calendar="title">Details</h2>
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
                                                    
                                                    <div class="modal-body py-10 px-lg-17">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-5">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold required mb-2">User</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <div class="input-group input-group-lg">
                                                                <input type="text" value="{{$payment->user->name}}" class="form-control form-control-solid"/>
                                                                <span class="clipboard_value" style="display: none">{{$payment->user->name}}</span>
                                                                <button type="button" class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                                        Copy
                                                                    </span> 
                                                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                                </button>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-5">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold mb-2">User Email</label>
                                                            <div class="input-group input-group-lg">
                                                                <input type="text" value="{{$payment->user->email}}" class="form-control form-control-solid"/>
                                                                <span class="clipboard_value" style="display: none">{{$payment->user->email}}</span>
                                                                <button type="button" class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                                        Copy
                                                                    </span> 
                                                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-5">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold mb-2">User Phone</label>
                                                            <div class="input-group input-group-lg">
                                                                <input type="text" value="{{$payment->user->phone }}" class="form-control form-control-solid"/>
                                                                <span class="clipboard_value" style="display: none">{{$payment->user->phone }}</span>
                                                                <button type="button" class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                    <span class="svg-icon svg-icon-2 copy_icon">
                                                                        Copy
                                                                    </span> 
                                                                    <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <div class="d-flex w-100">
                                                                <div class="border p-2 w-50"> Subscription </div>
                                                                <div class="border p-2 w-50"> Duration </div>
                                                            </div>
                                                            
                                                            <div class="d-flex w-100">
                                                                <div  class="border p-2 w-50"> {{$payment->subscription->plan->name}} </div>
                                                                <div  class="border p-2 w-50"> {{$payment->duration}} Month</div>
                                                            </div>
                                                            
                                                            
                                                        </div>   
                                                    </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No Payments Yet
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <div class="row my-5">
                        <div class="col-sm-12 d-flex align-items-center justify-content-center">
                            @include('layouts.pagination',['data'=> $payments])
                            
                        </div>
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Referred users-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="sub_details" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <form id="kt_selectuser_form" method="POST" action="{{route('admin.subscription')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

                            <input type="hidden" name="subscription_id" value="" id="subscription_id">
                            
                            <div class="mb-10 row">
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-3 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Username</span>
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" value="" id="edit_username" placeholder="username" name="username" class="form-control form-control-solid clipboard_value" placeholder="Username" aria-label="Sizing example input" aria-describedby="paste_url"/>
                                            <span class="input-group-text paste_button">Paste</span>
                                        </div>
                
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-3 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Password</span>
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" placeholder="password" value="" id="edit_password" name="password" class="form-control form-control-solid clipboard_value" placeholder="Password" aria-label="Sizing example input" aria-describedby="Password"/>
                                            <span class="input-group-text paste_button">Paste</span>
                                        </div>
                
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">URL</span>
                                        </label>

                                        <select name="link_id" id="edit_link_id" class="form-control form-control-solid" data-control="select2" data-placeholder="Select URL" required>
                                            <option value=""></option>
                                            @foreach ($links as $link)
                                                <option value="{{$link->id}}">{{$link->url}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Panel</span>
                                        </label>

                                        <select name="panel_id" id="edit_panel_id" class="form-control form-control-solid" data-control="select2" data-placeholder="Select Panel" required>
                                            <option value=""></option>
                                            @foreach ($panels as $panel)
                                                <option value="{{$panel->id}}">{{$panel->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-2 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Smart TV Link</span>
                                        </label>
                                        <!--end::Label-->
                                        <div class="input-group input-group-lg">
                                            <input type="url" id="edit_m3u_link" name="m3u_link" class="form-control form-control-solid" aria-label="Sizing example input" aria-describedby="paste_url"/>
                                            <span class="input-group-text paste_button">Paste</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <label class="required fs-6 fw-semibold form-label mb-2">Days</label>
                                        <input type="number" value="" name="days" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="" >
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        </div>

                                    </div>
                                    
                                </div>
                                
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Plan</span>
                                        </label>

                                        <select name="plan_id" id="edit_plan" class="form-control form-control-solid" data-control="select2" data-placeholder="Select Plan" required>
                                            <option value=""></option>
                                            <option value="1">Premium Plan</option>
                                            <option value="2">Special Plan</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            
                            
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="submit" name="action" value="update" class="btn btn-primary me-4">
                                    <span class="indicator-label">
                                        Update
                                    </span>
                                </button>
                                <button type="button" class="close btn btn-danger me-3" data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                </button>
                                

                                
                            </div>
                            <!--end::Actions-->
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('click','.sub_details',function(e){
            
            $('#subscription_id').val($(this).attr('data_subscription'))
            $('#edit_username').val($(this).attr('data_username'))
            $('#edit_password').val($(this).attr('data_password'))
            $('#edit_link_id').val($(this).attr('data_link_id')).trigger("change")
            $('#edit_m3u_link').val($(this).attr('data_m3u_link'))
            $('#edit_panel_id').val($(this).attr('data_panel_id')).trigger("change")
            $('#edit_user_id').val($(this).attr('data_user_id'))
            
            $('#kt_td_picker_basic_input').val($(this).attr('data_start'))
            $('#kt_td_picker_basic_input2').val($(this).attr('data_expiry'))
            $('#edit_plan').val($(this).attr('data_plan')).trigger("change")
            

            $('#sub_details').modal('show')
            
        })
    </script>
@endpush
