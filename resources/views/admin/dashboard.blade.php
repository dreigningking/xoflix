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
            <div class="card card-page">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <div class="col-xxl-12">
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xxl-3">
                                    <!--begin::Statistics Widget 1-->
                                    <div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body border border-4 rounded border-primary ">
                                            <!--begin::Hidden-->
                                            <div class="d-flex flex-column p-3">
                                                <!--begin::Number-->
                                                <div class="text-primary fw-boldest fs-2hx">{{$thisMonthUsers}}</div>
                                                <!--end::Number-->
                                                <!--begin::Description-->
                                                <span class="text-gray-400 fw-bold fs-6">Users</span>
                                                <span class="text-muted fw-light fs-6">This Month</span>
                                                <!--end::Description-->
                                            </div>
                                            
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <div class="col-xxl-3">
                                    <!--end::Statistics Widget 1-->
                                    <!--begin::Mixed Widget 1-->
                                    <div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body rounded bg-primary">
                                            <!--begin::Hidden-->
                                            <div class="d-flex flex-column p-3">
                                                <!--begin::Number-->
                                                <div class="text-white fw-boldest fs-2hx">{{$thisMonthSubscriptions}}</div>
                                                <!--end::Number-->
                                                <!--begin::Description-->
                                                <span class="text-white fw-bold fs-6">Subscriptions</span>
                                                <span class="text-light fw-light fs-6">This Month</span>
                                            </div>
                                            
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <div class="col-xxl-3">
                                    <!--end::Mixed Widget 1-->
                                    <div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body border border-4 rounded border-success">
                                            <!--begin::Hidden-->
                                            <div class="d-flex flex-column p-3">
                                                <!--begin::Number-->
                                                <span class="text-success fw-boldest fs-2hx">{{$thisMonthPayments}}</span>
                                                <!--end::Number-->
                                                <!--begin::Description-->
                                                <span class="text-gray-400 fw-bold fs-6">Payments</span>
                                                <span class="text-muted fw-light fs-6">This Month</span>
                                            </div>
                                            <!--end::Hidden-->
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3">
                                    
                                    <div class="card card-xxl-stretch-50 mb-5 mb-xl-8" >
                                        <div class="card-body rounded bg-success bg-gradient">
                                            <div class="d-flex flex-column p-3">
                                                <!--begin::Number-->
                                                <span class="text-white fw-boldest fs-2hx">{{$thisMonthWithdrawals}}</span>
                                                <!--end::Number-->
                                                <!--begin::Description-->
                                                <span class="text-white fw-bold fs-6">Withdrawals</span>
                                                <span class="text-light fw-light fs-6">This Month</span>
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Engage widget 1-->
                                </div>
                                <!--end::Col-->
                                
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--begin::Col-->
                        <div class="card card-xxl-stretch">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">Available Trials</span>
                                    <span class="text-muted mt-1 fw-bold fs-7">{{$availableTrials}} trials</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addtrial" class="btn btn-primary">Add New Trials</a>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            
                            <!--end::Card body-->
                        </div>
                        <div class="col-xxl-12">
                            <!--begin::Table Widget 1-->
                            <div class="card card-xxl-stretch">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5 pb-3">
                                    <!--begin::Card title-->
                                    <h3 class="card-title fw-bolder text-gray-800 fs-2">Current Subscription Summary</h3>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-0">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-bordered table-row-dashed gy-5" id="kt_table_widget_1">
                                            <!--begin::Table body-->
                                            <tbody>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                                    <th class="min-w-70px">Total</th>
                                                    <th class="min-w-70px text-end">Expiring Today</th>
                                                    <th class="min-w-70px text-end">Expiring This Week</th>
                                                    
                                                    <th class="text-end pe-2 min-w-70px">Expiring This Month</th>
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                <tr>
                                                    
                                                    <td>
                                                        <div class="d-flex flex-column w-100 me-2 mt-2">
                                                            <span class="me-2 fw-boldest mb-2">{{$totalActive}}</span>
                                                            
                                                        </div>
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="me-2 fw-boldest mb-2">{{$today}}</span>
                                                        
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="me-2 fw-boldest mb-2">{{$thisWeek}}</span>
                                                        
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        
                                                        <span class="me-2 fw-boldest mb-2">{{$thisMonth}}</span>
                                                    </td>
                                                    <!--end::Action=-->
                                                </tr>
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                {{-- <tr>
                                                    <!--begin::Author=-->
                                                    <td class="p-0">
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Logo-->
                                                            <div class="symbol symbol-50px me-2">
                                                                <span class="symbol-label">
                                                                    <img alt="" class="w-25px" src="{{asset('media/svg/brand-logos/leaf.svg')}}" />
                                                                </span>
                                                            </div>
                                                            <!--end::Logo-->
                                                            <div class="ps-3">
                                                                <a href="../dist/account/overview.html" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Xtreams</a>
                                                                <span class="text-gray-400 fw-bold d-block">Trial</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--end::Author=-->
                                                    <!--begin::Progress=-->
                                                    <td>
                                                        <div class="d-flex flex-column w-100 me-2 mt-2">
                                                            <span class="me-2 fw-boldest mb-2">{{$subscription_trial->count()}}</span>
                                                            
                                                        </div>
                                                    </td>
                                                    <td class="pe-0 text-center">
                                                        <span class="me-2 fw-boldest mb-2">{{$xtream_trial->whereBetween('end_at',[now(),now()->addDays(7)])->count()}}</span>
                                                        
                                                    </td>
                                                    <td class="pe-0 text-end">
                                                        
                                                        <span class="me-2 fw-boldest mb-2">{{$xtream_trial->whereBetween('end_at',[now(),now()->addMonth()])->count()}}</span>
                                                    </td>
                                                   
                                                </tr> --}}
                                               
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Table Widget 1-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xxl-6">
                            <!--begin::List Widget 4-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header align-items-center border-0 mt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="fw-bolder text-dark fs-2">Payments</span>
                                        <span class="text-gray-400 mt-2 fw-bold fs-6">{{$recentPayments->count()}} Since Yesterday</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <a class="btn btn-sm btn-outline-primary text-hover-white" href="{{route('admin.payments')}}"> View All </a>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-1">
                                    @forelse ($recentPayments as $payment)
                                    <div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <div class="symbol-label display-1 bg-light-primary text-primary rounded-circle"> {{$payment->user->name[0]}} </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="ps-1 mb-1">
                                                <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">{{$payment->user->name}}</a>
                                                <div class="text-gray-400 fw-bold">{{$payment->subscriptions->count()}} Subscriptions</div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <span class="badge badge-light rounded-pill fs-7 fw-boldest">₦{{$payment->amount}}</span>
                                        <!--end::Label-->
                                    </div>
                                    @empty
                                        <p class="text-center text-muted">No New Payment</p>
                                    @endforelse
                                    
                                    
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 4-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xxl-6">
                            <!--begin::List Widget 5-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">Withdrawal Requests</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">{{$recentWithdrawal->count()}} unattended</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <a class="btn btn-sm btn-outline-primary text-hover-white" href="{{route('admin.withdrawals')}}"> View All </a>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    @forelse ($recentWithdrawal as $withdrawal)
                                        <div class="d-flex align-items-sm-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-circle symbol-50px me-5">
                                                <div class="symbol-label display-1 bg-light-primary text-primary rounded-circle"> {{$withdrawal->user->name[0]}} </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">{{$withdrawal->user->name}}</a>
                                                    <span class="text-muted fw-bold d-block fs-7">{{$withdrawal->created_at->calendar()}}</span>
                                                </div>
                                                <span class="badge badge-light fw-bolder my-2">₦{{$withdrawal->amount}}}</span>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                    @empty
                                       <p class="text-center">No Withdrawal Request</p> 
                                    @endforelse
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 5-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                   
                    <div class="modal fade" id="kt_modal_add_event" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Form-->
                                <form class="form" action="#" id="kt_modal_add_event_form">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder" data-kt-calendar="title">Add Event</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_event_close">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body py-10 px-lg-17">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-9">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold required mb-2">Event Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_name" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-9">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">Event Description</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_description" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-9">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">Event Location</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_location" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-9">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="kt_calendar_datepicker_allday" />
                                                <span class="form-check-label fw-bold" for="kt_calendar_datepicker_allday">All Day</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row row-cols-lg-2 g-10">
                                            <div class="col">
                                                <div class="fv-row mb-9">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2 required">Event Start Date</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" name="calendar_event_start_date" placeholder="Pick a start date" id="kt_calendar_datepicker_start_date" />
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col" data-kt-calendar="datepicker">
                                                <div class="fv-row mb-9">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2">Event Start Time</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" name="calendar_event_start_time" placeholder="Pick a start time" id="kt_calendar_datepicker_start_time" />
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row row-cols-lg-2 g-10">
                                            <div class="col">
                                                <div class="fv-row mb-9">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2 required">Event End Date</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" name="calendar_event_end_date" placeholder="Pick a end date" id="kt_calendar_datepicker_end_date" />
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col" data-kt-calendar="datepicker">
                                                <div class="fv-row mb-9">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2">Event End Time</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" name="calendar_event_end_time" placeholder="Pick a end time" id="kt_calendar_datepicker_end_time" />
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Modal body-->
                                    <!--begin::Modal footer-->
                                    <div class="modal-footer flex-center">
                                        <!--begin::Button-->
                                        <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">Cancel</button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="button" id="kt_modal_add_event_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Modal footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>
                    </div>
                    <!--end::Modal - New Product-->
                    <!--begin::Modal - New Product-->
                    <div class="modal fade" id="kt_modal_view_event" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header border-0 justify-content-end">
                                    <!--begin::Edit-->
                                    <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Edit Event" id="kt_modal_view_event_edit">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Edit-->
                                    <!--begin::Edit-->
                                    <div class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Delete Event" id="kt_modal_view_event_delete">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Edit-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary" data-bs-toggle="tooltip" title="Hide Event" data-bs-dismiss="modal">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body pt-0 pb-20 px-lg-17">
                                    <!--begin::Row-->
                                    <div class="d-flex">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <div class="mb-9">
                                            <!--begin::Event name-->
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-3 fw-bolder me-3" data-kt-calendar="event_name"></span>
                                                <span class="badge badge-light-success" data-kt-calendar="all_day"></span>
                                            </div>
                                            <!--end::Event name-->
                                            <!--begin::Event description-->
                                            <div class="fs-6" data-kt-calendar="event_description"></div>
                                            <!--end::Event description-->
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-success me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <circle fill="#000000" cx="12" cy="12" r="8" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Event start date/time-->
                                        <div class="fs-6">
                                            <span class="fw-bolder">Starts</span>
                                            <span data-kt-calendar="event_start_date"></span>
                                        </div>
                                        <!--end::Event start date/time-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="d-flex align-items-center mb-9">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs050.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-danger me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <circle fill="#000000" cx="12" cy="12" r="8" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Event end date/time-->
                                        <div class="fs-6">
                                            <span class="fw-bolder">Ends</span>
                                            <span data-kt-calendar="event_end_date"></span>
                                        </div>
                                        <!--end::Event end date/time-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-muted me-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
                                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Event location-->
                                        <div class="fs-6" data-kt-calendar="event_location"></div>
                                        <!--end::Event location-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                        </div>
                    </div>
                    <!--end::Modal - New Product-->
                    <!--end::Modals-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout - Activity-->
</div>

@endsection
@push('scripts')
    
@endpush