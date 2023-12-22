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

                            <h3 class="fw-bolder m-0 text-gray-800">{{$plan->name}} Plan</h3>
                        </div>
                        

                        <!--end::Toolbar-->
                    </div>
                    
                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="rounded border p-10">
                            
                
                            <form action="{{route('admin.plans.update')}}" method="post">@csrf
                                <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Title</label>
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" value="{{$plan->name}}" name="name" class="form-control form-control-lg  mb-3 mb-lg-0">
                                        @error('name')
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Channels</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->channels}}" name="channels" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('channels')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">HD Quality</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->hd_quality}}" name="hd_quality" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('hd_quality')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Video On Demand</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->video_on_demand}}" name="video_on_demand" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('video_on_demand')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Sports</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->sports}}" name="sports" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('sports')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">International Channels</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->intl_channels}}" name="intl_channels" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('intl_channels')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Customer Support</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->customer_support}}" name="customer_support" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('customer_support')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Device Compatibility</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->device_compatibility}}" name="device_compatibility" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('device_compatibility')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Servers</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->servers}}" name="servers" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('servers')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Movie Organization</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->movie_organization}}" name="movie_organization" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('movie_organization')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Adult Channels</label>
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" value="{{$plan->adult_channels}}" name="adult_channels" class="form-control form-control-lg  mb-3 mb-lg-0">
                                            @error('adult_channels')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Price Per Month Per Connection:</label>
                                    
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="number" value="{{$plan->price}}" name="price" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" >
                                        @error('price')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-0">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Active</label>
                                    <!--begin::Label-->
                                
                                    <!--begin::Label-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input name="status" value="0" type="hidden">
                                            <input class="form-check-input w-45px h-30px" name="status" value="1" type="checkbox" id="status" @if($plan->status) checked @endif>
                                            <label class="form-check-label" for="status"></label>
                                        </div>
                                        @error('status')
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"> 
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <div class="d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="submit" class="btn btn-primary  px-6">Update Changes</button>
                                </div>
                            </form>
                        </div>      
                    </div>  
                </div>

                 
                
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection
