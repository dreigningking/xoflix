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

                            <h3 class="fw-bolder m-0 text-gray-800">Plans</h3>
                        </div>
                        

                        <!--end::Toolbar-->
                    </div>
                    
                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="rounded border p-10">
                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1" aria-selected="true" role="tab">Premium</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2" aria-selected="false" role="tab" tabindex="-1">Special</a>
                                </li>
                                
                            </ul>
                
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="kt_tab_pane_1" role="tabpanel">
                                    <form action="{{route('admin.plans')}}" method="post">@csrf
                                        @foreach ($plans->firstWhere('name','Premium')->features as $feature)
                                            <input type="hidden" name="plan_id" value="1">
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{$feature['label']}}</label>
                                                <input type="hidden" name="features_label[]" value="{{$feature['label']}}">
        
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                    <input type="text" value="{{$feature['description']}}" name="features[]" class="form-control form-control-lg  mb-3 mb-lg-0">
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        @endforeach
                                        
                                        
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Price Per Month Per Connection:</label>
                                            
    
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="number" value="{{$plans->firstWhere('name','Premium')->price}}" name="price" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                            placeholder="" >
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        
                                        <div class="d-flex justify-content-end py-6 px-9">
                                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                            <button type="submit" class="btn btn-primary  px-6">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                
                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                    <form action="{{route('admin.plans')}}" method="post">@csrf
                                        @foreach ($plans->firstWhere('name','Special')->features as $feature)
                                            <input type="hidden" name="plan_id" value="2">
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{$feature['label']}}</label>
                                                <input type="hidden" name="features_label[]" value="{{$feature['label']}}">
        
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                    <input type="text" value="{{$feature['description']}}" name="features[]" class="form-control form-control-lg  mb-3 mb-lg-0">
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        @endforeach
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Price Per Month Per Connection:</label>
                                            
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                <input type="number" value="{{$plans->firstWhere('name','Special')->price}}" name="price" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" >
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="d-flex justify-content-end py-6 px-9">
                                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                            <button type="submit" class="btn btn-primary  px-6">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>      
                    </div>  
                </div>

                 
                
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection
