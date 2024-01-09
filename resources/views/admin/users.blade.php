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
                                
                                <form action="#" id="searschForm">
                                    <div class="d-md-flex justify-content-between">
                                        <input  name="search" value="{{$search}}" type="text" class="form-control form-control-solid w-200px m-3" placeholder="Search user">
                                        <div class="m-3 d-flex align-items-center">
                                            <span class="fs-5">From:</span> 
                                            <input name="from" value="{{$from}}" type="date" class="form-control form-control-solid" >
                                        </div>
                                        <div class="m-3 d-flex align-items-center">
                                            <span class="fs-5">To:</span> 
                                            <input name="to" value="{{$to}}" type="date" class="form-control form-control-solid" >
                                        </div>
                                        <div class="m-3">
                                            <button type="submit" name="download" value="0" class="btn btn-primary ">Filter</button>
                                            <button type="submit" name="download" value="1" class="btn btn-dark ms-1">Download</button>
                                        </div>
                                        
                                    </div>
                                </form>
                                    
                            </div>
                            <!--end::Search-->
                        </div>
                        

                        
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
                                            <th class="min-w-125px">Balance</th>
                                            <th class="text-center min-w-100px">Action</th>
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
                                                            <span class="clipboard_value">{{$user->phone}}</span>
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
                                            <td>
                                                ₦{{$user->balance}}
                                            </td>
                                            <td data-order="2023-08-25T12:49:21+01:00">
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
                                                        <a href="{{route('admin.loginAs',$user->id)}}" class="menu-link px-3" >Login as User</a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <form action="{{route('admin.user.manage')}}" method="POST">@csrf
                                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                                            <button type="submit" class="menu-link border-0 px-3 bg-white bg-active-primary">@if($user->status) Suspend @else Enable @endif User</button>
                                                        </form>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                
                                            </td>


                                            
                                        </tr>
                                        @endforeach
                                        

                                    </tbody>
                                </table>
                            </div>
                            <div class="row my-5">
                                <div class="col-sm-12 d-flex align-items-center justify-content-center">
                                    @include('layouts.pagination',['data'=> $users])
                                    
                                </div>
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

