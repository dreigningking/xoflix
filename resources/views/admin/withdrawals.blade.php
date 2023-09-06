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
                
                <div class="card ">
                    <!--begin::Header-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3>Withdrawals</h3>
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
                            @forelse ($withdrawals as $withdrawal)
                                <tr>
                                    <td class="ps-9">{{$withdrawal->reference}}</td>
                                    <td class="ps-0">{{$withdrawal->user->name}}</td>
                                    <td>{{$withdrawal->created_at->format('M d, Y')}}</td>
                                    <td>₦{{$withdrawal->amount}}</td>
                                    <td @if($withdrawal->status == 'success') class="text-success" @else class="text-warning" @endif >
                                        {{ucwords($withdrawal->status)}}
                                    </td>
                                </tr>
                            @empty 
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No Withdrawals Yet
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
