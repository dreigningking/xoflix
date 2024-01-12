@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('breadcrumb')
<div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap">
        
    <div class="page-title d-flex flex-column">
        <!--begin::Title-->
        <h1 class="d-flex text-white fw-bold fs-2qx my-1 me-5">
            Sports
        </h1>
        
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-white opacity-75">
                <a href="{{route('dashboard')}}" class="text-white text-hover-primary">
                    Home 
                </a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            
            <li class="breadcrumb-item">
                <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-white opacity-75">
                Sports
            </li>
           
            <!--end::Item-->
            
            

        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->

    <!--begin::Actions-->
    
    <!--end::Actions-->
</div>
@endsection
@section('main')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        

        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3>Sports Guide</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </i>                
                            <input type="text" id="searchTransaction" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                        </div>

                    </div>

                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered align-middle gy-6" id="transactionTable">
                            <!--begin::Thead-->
                            <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten" >
                                <tr>
                                    <th class="min-w-125px ps-9">Category</th>
                                    <th class="min-w-125px">Details</th>
                                    <th class="min-w-125px px-0">View</th>
                                    
                                </tr>
                            </thead>
                            <!--end::Thead-->

                            <!--begin::Tbody-->
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @foreach ($sports as $sport)
                                    <tr>
                                        <td class="">
                                            <div class="d-flex flex-column">
                                                <div class="symbol symbol-45px symbol-circle">
                                                    <img alt="Pic" src="{{$sport->category->avatar}}">  
                                                </div>
                                                <div>
                                                    {{$sport->start_at->calendar()}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="d-flex flex-column">
                                                <div class="d-flex"> {{$sport->league}} </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-45px symbol-circle">
                                                        <img alt="first" src="{{$sport->first_avatar}}">
                                                    </div>

                                                    <div class="ms-5">
                                                        <span class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$sport->player_a}}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex ms-12"> VS </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-45px symbol-circle">
                                                        <img alt="second" src="{{$sport->second_avatar}}">
                                                    </div>

                                                    <div class="ms-5">
                                                        <span class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$sport->player_b}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="ps-0">
                                            <a href="#sportdetails{{$sport->id}}" type="button" class="btn btn-primary my-5" data-bs-toggle="modal">
                                                 View
                                            </a>
                                            <div class="modal fade" tabindex="-1" id="sportdetails{{$sport->id}}">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Sport</h3>
                                
                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                
                                                        <div class="modal-body">
                                                            <div class="d-flex flex-column">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-45px symbol-circle">
                                                                            <img alt="Pic" src="{{$sport->first_avatar}}">
                                                                        </div>
                    
                                                                        <div class="ms-5">
                                                                            <span class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$sport->player_a}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="bg-primary text-white p-6 rounded-circle">
                                                                        VS
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-45px symbol-circle">
                                                                            <img alt="Pic" src="{{$sport->second_avatar}}">
                                                                        </div>
                    
                                                                        <div class="ms-5">
                                                                            <span class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$sport->player_b}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="my-9 text-center">
                                                                    <span class="p-3 rounded bg-info text-white">{{$sport->start_at->diffForHumans()}}</span>
                                                                </div>
                                                                <div class="d-flex justify-content-center"><h3>Channels</h3></div>
                                                                
                                                                <div class="d-flex justify-content-center">
                                                                    
                                                                    <div class="">
                                                                        <ul>
                                                                        @foreach ($sport->channels as $channel)
                                                                            <li>{{$channel}}</li>
                                                                        @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    var subscriptionTable = $("#subscriptionTable").DataTable({});
    
    $('#searchSubscription').on('keyup',function(){
        subscriptionTable.search($(this).val()).draw();
    });
</script>
@endpush
