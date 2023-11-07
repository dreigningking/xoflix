<div class="card">
    <!--begin::Card body-->
    <div class="card-body px-5 px-lg-20 pt-17 pb-10">
        <div class="py-5">
            <form action="{{route('subscription')}}" method="post">@csrf
                <div class="d-flex flex-md-row rounded border">

                    <ul class="nav nav-tabs nav-pills w-100 flex-row border-0 mb-md-0 fs-6" role="tablist">
                        
                        <li class="nav-item w-50 me-0" role="presentation">
                            <a class="nav-link w-100  btn btn-flex btn-active-light-success active" data-bs-toggle="tab" href="#kt_vtab_pane_4" aria-selected="false" role="tab" tabindex="-1">
                                <i class="ki-duotone ki-icons/duotune/general/gen001.svg fs-2 text-primary me-3"></i>                        
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-4 fw-bold">Premium</span>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item w-50 me-0" role="presentation">
                            <a class="nav-link w-100 btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_pane_5" aria-selected="false" role="tab" tabindex="-1">
                                <i class="ki-duotone ki-icons/duotune/general/gen003.svg fs-2 text-primary"></i>                        <span class="d-flex flex-column align-items-start">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-4 fw-bold">Special</span>
                                </span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show px-3" id="kt_vtab_pane_4" role="tabpanel">
                        <div class="text-center mt-5">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#premium_details">View Details</a>
                        </div>

                        <div class="modal fade" id="premium_details" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <table class="table-bordered border-secondary">
                                        <tr>
                                            <td class="text-center p-2">
                                                <div class="d-flex flex-column">
                                                    <h1 class="">Premium Details</h1>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($plans->firstWhere('name','Premium')->features as $feature)
                                        <tr>
                                            <td class="text-center p-2">
                                                <div class="d-flex flex-column">
                                                    <div class="pe-2 fs-5 fw-bold">{{$feature['label']}}:</div>
                                                    <div>{{$feature['description']}}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-striped gy-7">
                                <!--begin::Table head-->
                                <thead class="align-middle">
                                    <tr id="kt_pricing">
                                        @foreach ($plans->firstWhere('name','Premium')->prices as $price)
                                            <th class="text-center min-w-200px">
                                                <div class="min-w-200px card-rounded @switch($loop->iteration) @case(1) border border-dark @break @case(2) bg-success @break @case(3) bg-primary @break @case(4) bg-info @break @endswitch py-12 mb-5">
                                                    <div class="@if($loop->iteration == 1) text-dark @else text-white @endif fs-3 fw-bold mb-7">{{$price['label']}}</div>
                    
                                                    <div class="fs-5x @if($loop->iteration != 1) text-white @endif fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        <span class="align-self-start fs-2 mt-3">₦</span>
                                                        
                                                        {{number_format($price['description'])}}
                                                    </div> 
                                                    <div class="action">
                                                        <input type="hidden" class="plan_name" value="{{$price['label']}} Premium ">
                                                        <input type="hidden" class="price" name="premium_price[{{intval($price['label'])}}]" value="{{intval($price['description'])}}">
                                                        <input type="hidden" class="duration" name="premium_duration[{{intval($price['label'])}}]" value="{{intval($price['label'])}}">
                                                        <input type="hidden" class="amount" name="premium_amount[{{intval($price['label'])}}]" value="0">
                                                        <button type="button" 
                                                            class="btn @switch($loop->iteration) @case(1) btn-light-dark @break @case(2) bg-white bg-opacity-20 bg-hover-white text-hover-success text-white @break @case(3) bg-white bg-opacity-20 bg-hover-white text-hover-primary text-white @break @case(4) bg-white bg-opacity-20 bg-hover-white text-hover-info text-white @break @endswitch fw-bold mx-auto buy">
                                                            Buy
                                                        </button>
                                                        <div class="input-group input-group-sm pt-3 px-10 text-center buyvalues" style="display: none">
                                                            <button class="btn btn-secondary buy_minus" type="button">-</button>
                                                            <input type="number" class="form-control w-25 quantity" value="0" name="premium_quantity[{{intval($price['label'])}}]" />
                                                            <button class="btn btn-secondary buy_plus" type="button">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">
                        <div class="text-center mt-5">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#special_details">View Details</a>
                        </div>

                        <div class="modal fade" id="special_details" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <table class="table-bordered border-secondary">
                                        <tr>
                                            <td class="text-center p-2">
                                                <div class="d-flex flex-column">
                                                    <h1 class="">Special Details</h1>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($plans->firstWhere('name','Special')->features as $feature)
                                        <tr>
                                            <td class="text-center p-2">
                                                <div class="d-flex flex-column">
                                                    <div class="pe-2 fs-5 fw-bold">{{$feature['label']}}:</div>
                                                    <div>{{$feature['description']}}</div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-striped gy-7">
                                <!--begin::Table head-->
                                <thead class="align-middle">
                                    <tr id="kt_pricing">
                                        @foreach ($plans->firstWhere('name','Special')->prices as $price)
                                            <th class="text-center min-w-200px">
                                                <div class="min-w-200px card-rounded @switch($loop->iteration) @case(1) border border-dark @break @case(2) bg-success @break @case(3) bg-primary @break @case(4) bg-info @break @endswitch py-12 mb-5">
                                                    <div class="@if($loop->iteration == 1) text-dark @else text-white @endif fs-3 fw-bold mb-7">{{$price['label']}}</div>
                    
                                                    <div class="fs-5x @if($loop->iteration != 1) text-white @endif fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                        <span class="align-self-start fs-2 mt-3">₦</span>
                                                        
                                                        {{number_format($price['description'])}}
                                                    </div> 
                                                    <div class="action">
                                                        <input type="hidden" class="plan_name" value="{{$price['label']}} Special ">
                                                        <input type="hidden" class="price" name="special_price[{{intval($price['label'])}}]" value="{{intval($price['description'])}}">
                                                        <input type="hidden" class="duration" name="special_duration[{{intval($price['label'])}}]" value="{{intval($price['label'])}}">
                                                        <input type="hidden" class="amount" name="special_amount[{{intval($price['label'])}}]" value="0">
                                                        <button type="button" class="btn @switch($loop->iteration) @case(1) btn-light-dark @break @case(2) bg-white bg-opacity-20 bg-hover-white text-hover-success text-white @break @case(3) bg-white bg-opacity-20 bg-hover-white text-hover-primary text-white @break @case(4) bg-white bg-opacity-20 bg-hover-white text-hover-info text-white @break @endswitch fw-bold mx-auto buy">Buy</button>
                                                        <div class="input-group input-group-sm pt-3 px-10 text-center buyvalues" style="display: none">
                                                            <button class="btn btn-secondary buy_minus" type="button">-</button>
                                                            <input type="number" name="special_quantity[{{intval($price['label'])}}]" value="0" class="form-control w-25 quantity"/>
                                                            <button class="btn btn-secondary buy_plus" type="button">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    
                </div>
                
                <div class="row mt-3">
                    <div class="col-12 text-center" id="selected_plans">
                        {{-- <p>2 Months Premium x 1</p>
                        <p>2 Months Special x 4</p> --}}
                    </div>
                </div>
                @guest
                <div class="fv-row my-10 fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="form-label fs-6 fw-bold text-dark">Email</label>
                    <!--end::Label-->
        
                    <!--begin::Input-->
                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <!--end::Input-->
                    @error('email')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>  
                    @enderror
                    
                </div>
        
                <!--begin::Input group-->
                <div class="fv-row mb-10 fv-plugins-icon-container">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label> 
                    </div>
                    <!--end::Wrapper-->
                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                    
                    @error('password')
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                @endguest
                <div class="card-footer d-flex justify-content-center py-6 px-9 ">
                    <button type="submit" class="btn btn-primary total_area px-6" style="display:none;">
                        Pay ₦ <span id="grandtotal"></span>
                    </button>
                </div>
            </form>
        </div>
        
    </div>
    <!--end::Card body-->
</div>