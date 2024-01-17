@extends('layouts.app')
@push('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('dashboard') }}" class="text-white text-hover-primary">
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
                        <div class="card-title pt-4">
                            <h3>Sports Guide</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-5 hover-scroll-x">
                            <div class="d-grid">
                                <ul class="nav nav-tabs flex-nowrap text-nowrap">
                                    @for ($i = 0; $i < 7; $i++)
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-primary btn-color-white btn-active-color-dark rounded-bottom-0 mx-1 @if (!$i) active @endif"
                                                data-bs-toggle="tab"
                                                href="#kt_tab_pane{{ $i }}">{{ today()->addDay($i)->isoformat('ddd, D MMM') }}</a>
                                        </li>
                                    @endfor

                                </ul>
                            </div>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            @for ($i = 0; $i < 7; $i++)
                                <div class="tab-pane fade @if (!$i) active @endif" id="kt_tab_pane{{ $i }}" role="tabpanel">
                                    @forelse ($sports->where('gameDay',today()->addDay($i)->format('d')) as $sport)
                                        <div class="d-flex align-content-start py-5 border-bottom">
                                            <div class="d-flex flex-column">
                                                <div class="symbol symbol-45px symbol-circle">
                                                    <img alt="Pic" src="{{ $sport->category->avatar }}">
                                                </div>
                                                <div>
                                                    {{ $sport->start_at->format('h:i A') }}
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="d-flex ms-5"> {{ $sport->league }} </div>
                                                <div class="d-flex ms-5">
                                                    <span class="fs-8 fw-bold text-gray-900 text-hover-primary">{{ $sport->player_a }}</span>
                                                </div>
                                                <div class="d-flex ms-12 fs-10"> VS </div>
                                                <div class="d-flex ms-5">
                                                    <span class="fs-8 fw-bold text-gray-900 text-hover-primary mb-2">{{ $sport->player_b }}</span>
                                                </div>

                                            </div>
                                            <div class="d-flex align-items-center ms-auto">
                                                <a href="#sportdetails{{ $sport->id }}" type="button"
                                                    class="bg-primary text-white py-1 px-3 rounded-circle"
                                                    data-bs-toggle="modal">
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <div class="modal fade" tabindex="-1" id="sportdetails{{ $sport->id }}">
                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Sport</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-dark ms-2"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="d-flex flex-column">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-45px symbol-circle">
                                                                        <img alt="Pic"
                                                                            src="{{ $sport->first_avatar }}">
                                                                    </div>

                                                                    <div class="ms-5">
                                                                        <span
                                                                            class="fs-8 fw-bold text-gray-900 text-hover-primary mb-2">{{ $sport->player_a }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mx-2">
                                                                    <span
                                                                        class="bg-primary text-white py-3 px-3 rounded-circle">VS</span>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="ms-5">
                                                                        <span
                                                                            class="fs-8 fw-bold text-gray-900 text-hover-primary mb-2">{{ $sport->player_b }}</span>
                                                                    </div>
                                                                    <div class="symbol symbol-45px symbol-circle">
                                                                        <img alt="Pic"
                                                                            src="{{ $sport->second_avatar }}">
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="my-9 text-center">
                                                                <span
                                                                    class="p-3 rounded bg-info text-white">{{ $sport->start_at->diffForHumans() }}</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center">
                                                                <h3>Channels</h3>
                                                            </div>

                                                            <div class="d-flex justify-content-center">

                                                                <div class="">
                                                                    <ul>
                                                                        @foreach ($sport->channels as $channel)
                                                                            <li>{{ $channel }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center fs-3">No Games </div>
                                    @endforelse
                                </div>
                            @endfor
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

