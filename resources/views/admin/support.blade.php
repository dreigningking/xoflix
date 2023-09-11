@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-center flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-lg-10 mb-10 mb-lg-0">
                <!--begin::Contacts-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Form-->
                        <form class="w-100 position-relative" autocomplete="off">
                            <!--begin::Icon-->
                            <i
                                class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                    class="path1"></span><span class="path2"></span></i> <!--end::Icon-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid px-13" name="search"
                                value="" placeholder="Search by username or email...">
                            <!--end::Input-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-5" id="kt_chat_contacts_body">
                        <!--begin::List-->
                        <div class="me-n5 pe-5 h-200px h-lg-auto" >
                            @forelse ($supports->groupBy('user_id') as $group)
                            
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px symbol-circle">
                                            @if($group->first()->user->image)
                                            <img alt="Pic" src="{{$group->first()->user->avatar}}">
                                            @else
                                            <span class="symbol-label bg-primary text-white rounded-circle">
                                                {{ $group->first()->user->name[0] }} 
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a href="{{route('admin.support.show',$group->first()->user)}}" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$group->first()->user->name}}</a>
                                            <div class="fw-semibold text-muted">{{$group->first()->user->email}}</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <div class="d-flex align-items-left pt-4">
                                        <div class="ms-5">
                                            <span class="badge badge-sm badge-circle badge-light-success">{{$group->count()}}</span>
                                            <a class="fw-bold text-dark" href="{{route('admin.support.show',$group->first()->user)}}">
                                                {{$group->first()->message}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">{{$group->first()->created_at->calendar()}}</span>

                                </div>
                                <!--end::Lat seen-->
                            </div>

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->
                            @empty
                            <div class="p-5">
                                <p class="text-center">No Messages</p>
                            </div>
                            @endforelse
                            
                        </div>
                        <div class="row py-5">
                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                <div class="dataTables_length" id="kt_customers_table_length">
                                    <label>
                                        <select name="kt_customers_table_length" aria-controls="kt_customers_table" class="form-select form-select-sm form-select-solid">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="kt_customers_table_previous">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="0" tabindex="0" class="page-link">
                                                <i class="previous"></i>
                                            </a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                        </li>
                                        <li class="paginate_button page-item next" id="kt_customers_table_next">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="5" tabindex="0" class="page-link">
                                                <i class="next"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Card body-->
                    
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            
            <!--end::Content-->
        </div>
 
    </div>
@endsection
