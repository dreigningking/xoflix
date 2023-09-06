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
                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-800">Notifications</h3>
                            </div>
                        </div>
                        
                        <!--end::Card toolbar-->
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
                                            <th class="text-end min-w-100px">Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @forelse ($notifications as $notification)
                                        <tr class="odd">

                                            <td class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <a href="/ceres-html-pro/?page=apps/user-management/users/view">
                                                        <div class="symbol-label fs-3 bg-light-primary text-primary">
                                                            N </div>
                                                    </a>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::User details-->
                                                <div class="d-flex flex-column">
                                                    <a href="/ceres-html-pro/?page=apps/user-management/users/view"
                                                        class="text-gray-800 text-hover-primary mb-1">Emma Smith</a>
                                                    <span>smith@kpmg.com</span>
                                                </div>
                                                <!--begin::User details-->
                                            </td>
                                            <td>
                                                10 Nov 2023, 8:43 pm
                                            </td>
                                            <td>
                                                8
                                            </td>
                                            <td data-order="2023-08-25T12:49:21+01:00">
                                                <div class="badge badge-light fw-bold">2</div>
                                            </td>


                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i> 
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="/ceres-html-pro/?page=apps/user-management/users/view"
                                                            class="menu-link px-3">
                                                            View
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-users-table-filter="delete_row">
                                                            Suspend
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    No Notifications
                                                </td>
                                            </tr>
                                        
                                        @endforelse
                                        
                                        

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
