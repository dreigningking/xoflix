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
                            <h3>Payments</h3>
                        </div>
                        <div class="card-toolbar m-0">
                            <div class="">
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
                                    <th class="min-w-125px">Date</th>
                                    <th class="min-w-125px px-0">User</th>
                                    <th class="min-w-125px ps-0">Amount</th>
                                    <th class="min-w-125px ps-0">Status</th> 
                                </tr>
                            </thead>
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @forelse ($payments as $payment)
                                    <tr>
                                        <td class="ps-9">
                                            <a @if($payment->proof) href="{{$payment->proof}}"  target="_blank" @endif>{{ $payment->reference }}</a>
                                        </td>
                                        <td>{{ $payment->created_at->format('M d, Y') }}</td>
                                        <td class="ps-0">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#paiduser{{$payment->id}}">{{ $payment->user->name }}</a>
                                        </td>
                                        <td> ₦{{ $payment->amount }}</td>
                                        <td>
                                            @if ($payment->status == 'success') 
                                                <span class="text-success"> {{ ucwords($payment->status) }} </span>
                                            @elseif($payment->status == 'paid') 
                                                <form action="{{route('admin.payments.confirmation')}}" method="POST" onsubmit="return confirm('Are you sure you want to confirm payment?')">@csrf
                                                    <input type="hidden" name="payment_id" value="{{$payment->id}}">
                                                    <button class="btn btn-sm btn-primary">Confirm</button>
                                                </form>
                                            @elseif($payment->status == 'failed') 
                                                <div class="d-flex align-items-center">
                                                    <span class="text-danger mx-2"> {{ ucwords($payment->status) }}  </span>
                                                    <form action="{{route('admin.payments.delete')}}" method="POST" onsubmit="return confirm('Are you sure you want to delete payment?')">@csrf
                                                        <input type="hidden" name="payment_id" value="{{$payment->id}}">
                                                        <button class="btn btn-sm btn-danger px-2 text-center"> <i class="fa fs-2 ps-1 fa-trash"></i> </button>
                                                    </form>
                                                </div>
                                            @else 
                                            <span class="text-warning mr-2"> {{ ucwords($payment->status) }}  </span>
                                            @endif
                                            
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
                                                                <input type="text" value="{{$payment->user->whatsapp ? $payment->user->whatsapp : $payment->user->phone }}" class="form-control form-control-solid"/>
                                                                <span class="clipboard_value" style="display: none">{{$payment->user->whatsapp ? $payment->user->whatsapp : $payment->user->phone }}</span>
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
                                                            @foreach ($payment->subscriptions as $subscription)
                                                            <div class="d-flex w-100">
                                                                <div  class="border p-2 w-50"> {{$subscription->plan->name}} </div>
                                                                <div  class="border p-2 w-50"> {{$subscription->duration}} Month</div>
                                                            </div>
                                                            @endforeach
                                                            
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
