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
        <div class="card-body border">
            <h2 class="mb-9 d-flex flex-column flex-md-row justify-content-between">
                <span>History</span>
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                    </i>                
                    <input type="text" id="searchSubscription" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                </div>
            </h2>
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="subscriptionTable">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-100px">Status</th>
                            <th class="min-w-125px">Start</th>
                            <th class="min-w-125px">Expiry</th>
                            <th class="min-w-125px">XTREAM</th>
                            <th class="min-w-125px">M3U</th>
                            
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        @foreach ($user->subscriptions->where('start_at','!=',null) as $subscription)
                        <tr>

                            <td class="d-flex align-items-center">
                                @if($subscription->end_at > now()) Ongoing @else Expired @endif
                            </td>
                            <td>
                                {{$subscription->start_at->format('d M Y h:i A')}}
                            </td>
                            <td>
                                @if($subscription->end_at->diffInDays(now()) > 7 )
                                    <span>{{$subscription->end_at->format('d M Y h:i A')}}</span>
                                @else 
                                    <form action="{{route('subscription.renew')}}" method="post">@csrf
                                        <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                                        <button type="submit" class="btn btn-sm btn-primary">Renew</button>
                                    </form>
                                @endif
                                
                            </td>
                            <td>
                                <span>USERNAME:{{$subscription->username}} | PASSWORD: {{$subscription->password}}</span>
                                <span class="d-block"> {{$subscription->link->url}}</span>
                            </td>
                            <td>{{$subscription->m3u_link}}</td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
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
