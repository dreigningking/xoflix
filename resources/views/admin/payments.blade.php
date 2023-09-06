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
                                        ₦<span data-kt-countup="true" data-kt-countup-value="{{number_format($thisToday)}}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                    <span class="fs-4 fw-semibold text-success pb-1 px-2">This Week</span>
                                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                        ₦<span data-kt-countup="true" data-kt-countup-value="{{number_format($thisWeek)}}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                    <span class="fs-4 fw-semibold text-danger pb-1 px-2">This Month</span>
                                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                        ₦<span data-kt-countup="true" data-kt-countup-value="{{number_format($thisMonth)}}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                    <span class="fs-4 fw-semibold text-primary pb-1 px-2">This Year </span>
                                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                                        ₦<span data-kt-countup="true" data-kt-countup-value="{{number_format($thisYear)}}">0</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Stats-->
                        
                    </div>
                    <!--end::Body-->
                </div>
                
                <div class="card ">
                    <!--begin::Header-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3>Payments</h3>
                        </div>
                        <!--end::Title-->

                        
                    </div>
                    <!--end::Header-->
                    <div class="table-responsive">
                    <table class="table table-row-bordered align-middle gy-6">
                        <!--begin::Thead-->
                        <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten">
                            <tr>
                                <th class="min-w-125px ps-9">Reference</th>
                                <th class="min-w-125px px-0">User</th>
                                <th class="min-w-125px">Date</th>
                                <th class="min-w-125px ps-0">Amount</th>
                                <th class="min-w-125px ps-0">Status</th>
                            </tr>
                        </thead>
                        <!--end::Thead-->

                        <!--begin::Tbody-->
                        <tbody class="fs-6 fw-semibold text-gray-600">
                            @forelse ($payments as $payment)
                                <tr>
                                    <td class="ps-9">{{$payment->reference}}</td>
                                    <td class="ps-0">{{$payment->user->name}}</td>
                                    <td>{{$payment->created_at->format('M d, Y')}}</td>
                                    <td>₦{{$payment->amount}}</td>
                                    <td @if($payment->status == 'success') class="text-success" @else class="text-warning" @endif >
                                        {{ucwords($payment->status)}}
                                    </td>
                                </tr>
                            @empty 
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No Payments Yet
                                    </td>
                                </tr>
                            @endforelse
                            

                        </tbody>
                        <!--end::Tbody-->
                    </table>
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
