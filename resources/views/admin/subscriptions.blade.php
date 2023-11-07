@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endpush
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

                <!--begin::Row-->
                <div class="row g-xxl-9">
                    <!--begin::Col-->
                    <div class="col-xxl-12">
                        <!--begin::Earnings-->
                        <div class="card  card-xxl-stretch mb-5 mb-xxl-10">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>Subscription Statistics</h3>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pb-0">
                                <span class="fs-5 fw-semibold text-gray-600 d-block">Last 30 day earnings calculated.
                                    Apart from arranging the order of topics.</span>

                                <!--begin::Left Section-->
                                <div class="d-flex flex-wrap justify-content-between pb-6">
                                    <!--begin::Row-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Col-->
                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-2 me-md-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span data-kt-countup="true" data-kt-countup-value="{{$total}}"
                                                    data-kt-countup-prefix="$" class="counted"
                                                    data-kt-initialized="1">{{number_format($total)}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Total</span>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-2 me-md-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span class="counted" data-kt-countup="true" data-kt-countup-value="{{number_format($expired)}}"
                                                    data-kt-initialized="1">{{number_format($expired)}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Expired</span>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-2 me-md-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span data-kt-countup="true" data-kt-countup-value="{{number_format($ongoing)}}"
                                                    data-kt-countup-prefix="$" class="counted"
                                                    data-kt-initialized="1">{{number_format($ongoing)}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Ongoing</span>
                                        </div>

                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-2 me-md-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span data-kt-countup="true" data-kt-countup-value="{{number_format($pendings->count())}}"
                                                    data-kt-countup-prefix="$" class="counted"
                                                    data-kt-initialized="1">{{number_format($pendings->count())}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">New Request</span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Left Section-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Earnings-->
                    </div>

                </div>
                
                <div class="card">
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3 class="m-0 text-gray-800">Pending Subscriptions</h3>
                        </div>
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                            </i>                
                            <input type="text" id="searchSubscription" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="datatable" class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                    <tr>
                                        <th class="min-w-200px ps-9">User</th>
                                        <th class="min-w-125px text-center">Type</th>
                                        <th class="min-w-125px text-center">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Thead-->

                                <!--begin::Tbody-->
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                    @foreach ($pendings as $subscription)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40px me-3"> 
                                                    @if($subscription->user->image)
                                                    <img alt="Pic" src="{{$subscription->user->avatar}}">
                                                    @else
                                                    <div class="symbol-label display-6 bg-light-primary text-primary rounded-circle">
                                                        {{ $subscription->user->name[0] }} 
                                                    </div>
                                                    @endif                                              
                                                                                                      
                                                </div>
                                                
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{$subscription->user->name}}</a>
                                                    <span class="text-muted fw-semibold d-block fs-7">{{$subscription->user->email}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center"> @if($subscription->end_at) Renewal @else New @endif</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-light btn-sm btn-active-light-primary sub_details"
                                                data_subscription="{{$subscription->id}}" data_username="{{$subscription->username}}" 
                                                data_password="{{$subscription->password}}" data_link_id="{{$subscription->link_id}}" 
                                                data_m3u_link="{{$subscription->m3u_link}}" data_panel_id="{{$subscription->panel_id}}" 
                                                data_user_id="{{$subscription->user_id}}" data_start="{{$subscription->start_at}}"
                                                data_expiry="{{$subscription->end_at}}" data_plan="{{$subscription->plan->id}}">View</button>
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
                
                <div class="card mt-3">
                    <!--begin::Header-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3 class="m-0 text-gray-800">Subscriptions</h3>
                        </div>
                        <div class="card-toolbar m-0">
                            <div class="">
                                <button type="button" class="btn btn-light-primary me-3 mt-4" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
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
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <form action="#" method="get">
                                            <div class="mb-10 ">
                                                <label class="form-label fs-6 fw-semibold d-block">User: </label>
                                                <div class="">
                                                    <input class="form-control" value="{{$name}}" type="text" name="name">
                                                </div>
                                            </div>

                                            <!--begin::Input group-->
                                            <div class="mb-10 d-flex">
                                                <label class="form-label fs-6 fw-semibold mr-4">Hide Expired: </label>
                                                <div class="form-check form-check-sm form-check-custom">
                                                    <input class="form-check-input mx-3" @if($hide_expired) checked @endif name="expired" type="checkbox" value="1"> Expired
                                                </div>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                    data-kt-menu-dismiss="true"
                                                    data-kt-user-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                    data-kt-menu-dismiss="true"
                                                    data-kt-user-table-filter="filter">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                    </div>
                                    <!--end::Content-->
                                </div>

                            </div>
                        </div>
                        
                    </div>
                   
                    <div class="card-body">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                    <tr>
                                        <th class="min-w-200px ps-9">User</th>
                                        <th class="min-w-125px text-center">Details</th>
                                    </tr>
                                </thead>
                                <!--end::Thead-->

                                <!--begin::Tbody-->
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                    @foreach ($subscriptions as $subscription)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40px me-3"> 
                                                    @if($subscription->user->image)
                                                    <img alt="Pic" src="{{$subscription->user->avatar}}">
                                                    @else
                                                    <div class="symbol-label display-6 bg-light-primary text-primary rounded-circle">
                                                        {{ $subscription->user->name[0] }} 
                                                    </div>
                                                    @endif                                              
                                                                                                      
                                                </div>
                                                
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{$subscription->user->name}}</a>
                                                    <span class="text-muted fw-semibold d-block fs-7">{{$subscription->user->email}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-light btn-sm btn-active-light-primary sub_details" 
                                                data_subscription="{{$subscription->id}}" data_username="{{$subscription->username}}" 
                                                data_password="{{$subscription->password}}" data_link_id="{{$subscription->link_id}}" 
                                                data_m3u_link="{{$subscription->m3u_link}}" data_panel_id="{{$subscription->panel_id}}" 
                                                data_user_id="{{$subscription->user_id}}" data_start="{{$subscription->start_at->format('m/d/Y h:i A')}}"
                                                data_expiry="{{$subscription->end_at->format('m/d/Y h:i A')}}" data_plan="{{$subscription->plan->id}}">View</button>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Tbody-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <div class="row my-5">
                            <div class="col-sm-12 d-flex align-items-center justify-content-center">
                                @include('layouts.pagination',['data'=> $subscriptions])
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
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
                                            <span class="required">M3U Link</span>
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
                                        <label class="required fs-6 fw-semibold form-label mb-2">Start</label>

                                        <div class="input-group" id="kt_td_picker_basic" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_input" type="text" name="start_at" class="form-control" data-td-target="#kt_td_picker_basic" required/>
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic" data-td-toggle="datetimepicker">
                                                <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </span>
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <label class="required fs-6 fw-semibold form-label mb-2">Expiry</label>

                                        <div class="input-group" id="kt_td_picker_basic2" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                            <input id="kt_td_picker_basic_input2" type="text" name="end_at" class="form-control" data-td-target="#kt_td_picker_basic2" required/>
                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic2" data-td-toggle="datetimepicker">
                                                <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </span>
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

                                {{-- <button type="submit" name="action" value="delete" id="kt_modal_new_card_cancel" class="btn btn-danger me-3">
                                        Delete
                                </button> --}}

                                
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
    {{-- <script src="{{ asset('plugins/tempus-dominus.init.js') }}"></script> --}}
    <script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        var subscriptionTable = $("#datatable").DataTable({});
        $('#searchSubscription').on('keyup',function(){
            subscriptionTable.search($(this).val()).draw();
        });
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"), {
            //put your config here
        });
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic2"), {
            //put your config here
        });

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
