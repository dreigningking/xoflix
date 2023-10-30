@extends('layouts.app')
@section('main')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Layout - Activity-->
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
            <!--begin::Timeline-->
            <div class="card">
                <!--begin::Card head-->
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title d-flex align-items-center">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                        
                        <h3 class="fw-bolder m-0 text-gray-800">Activities</h3>
                    </div>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    
                    <!--end::Toolbar-->
                </div>
                <!--end::Card head-->
                <!--begin::Card body-->
                <div class="card-body">
                    
                    <div id="kt_activity_today" class="card-body p-0 ">
                        <!--begin::Timeline-->
                        <div class="timeline">
                            @forelse ($activities as $activity)

                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">{{$activity->description}}</div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="overflow-auto pb-5">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                <!--begin::Info-->
                                                <div class="text-muted me-2 fs-7">Performed at {{$activity->created_at->format('h:i A')}} {{$activity->created_at->format('M d, Y')}}  by</div>
                                                <!--end::Info-->
                                                <!--begin::User-->
                                                <a href="#" class="text-primary fw-bolder me-1">{{$activity->user->name}}</a>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            @empty
                                <div class="d-flex justify-content-center">
                                    <p class="p-5 m-5">No Activity</p>
                                </div>
                            @endforelse
                        </div>
                        <!--end::Timeline-->
                    </div>
                        
                    
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Timeline-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout - Activity-->
</div>
@endsection