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

                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i> 
                                <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user">
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->

                        
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body py-4">

                        <!--begin::Table-->
                        <div id="" class="">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">User</th>
                                            <th class="min-w-125px">Joined Date</th>
                                            <th class="min-w-125px">Referrals</th>
                                            <th class="min-w-125px">Subscriptions</th>
                                            <th class="text-end min-w-100px">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($users as $user)
                                        <tr>

                                            <td>
                                                <!--begin:: Avatar -->
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-40px me-3">                                                   
                                                        <div class="symbol-label display-6 bg-light-primary text-primary rounded-circle"> {{$user->name[0]}} </div>                                                  
                                                    </div>
                                                    
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                                            <span class="clipboard_value">{{$user->name}}</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span> 
                                                                <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                            </button>
                                                            
                                                        </span>
                                                        <span class="text-muted fw-semibold d-block fs-7">
                                                            <span class="clipboard_value">{{$user->email}}</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span> 
                                                                <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                            </button>
                                                        </span>
                                                        <span class="text-muted fw-semibold d-block fs-7">
                                                            <span class="clipboard_value">{{$user->whatsapp}}</span>
                                                            <button class="copy_button px-2 py-1 btn btn-light border border-dark btn-sm">
                                                                <span class="svg-icon svg-icon-2 copy_icon">
                                                                    Copy
                                                                </span> 
                                                                <i class="bi bi-check p-0  check_icon" style="display: none" ></i>    
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{$user->created_at->calendar()}}
                                            </td>
                                            <td>
                                                {{$user->referrals->count()}}
                                            </td>
                                            <td data-order="2023-08-25T12:49:21+01:00">
                                                <div class="badge badge-light fw-bold">{{$user->activeSubscriptions->count()}}/{{$user->subscriptions->count()}}</div>
                                            </td>


                                            <td class="text-end">
                                                ₦{{$user->balance}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection
