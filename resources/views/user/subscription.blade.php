@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('breadcrumb')
<div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap">
        
    <div class="page-title d-flex flex-column">
        <!--begin::Title-->
        <h1 class="d-flex text-white fw-bold fs-2qx my-1 me-5">
            Subscriptions
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
                Subscriptions
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

    @if(Route::is('dashboard'))
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            @include('user.header')
            <!--end::Details-->

            <!--begin::Navs-->
            @include('layouts.menu.user_desktop')
            <!--begin::Navs-->
        </div>
    </div>
    @endif
    
    <div class="card mb-5 mb-xl-10">
        <!--begin::Body-->
        <div class="card-body">
            <div class="row gy-5 g-xl-8">

                <div class="col-xxl-12">
                    <!--begin::Table Widget 1-->
                    @include('layouts.current_subscription')
                   
                </div>
                
            </div>
            

            
        </div>
        
        <!--end::Body-->
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
<script>
    $('.selectuser').on('click',function(){
        $('#trial_id').val($(this).attr('data-trial'))
        $('#selectuser').modal('show')
    })
    
</script>
<script>
    var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

    if (elements && elements.length > 0) {
        elements.forEach((element) => {
            if (element.getAttribute("data-kt-initialized") === "1") {
                return;
            }

            element.setAttribute("data-kt-initialized", "1");

            element.addEventListener("click", function(e) {
                e.preventDefault();

                const modalEl = document.querySelector(this.getAttribute("data-bs-stacked-modal"));

                if (modalEl) {
                    const modal = new bootstrap.Modal(modalEl);
                    modal.show();
                }
            });
        });
    }
</script>
@endpush
