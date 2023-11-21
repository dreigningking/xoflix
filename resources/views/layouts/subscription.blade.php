<div class="card">
    <!--begin::Card body-->
    <div class="card-body px-5 px-lg-20 pt-17 pb-10">
        <div class="py-5">
            
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
                            <div class="modal-dialog modal-dialog-centered">
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

                        
                        <div class="card">
                            <!--begin::Table-->
                            <div class="card-body">
                                <div class="min-w-200px card-rounded bg-success py-12 mb-5">
                                    <form action="{{route('subscription')}}" method="post">@csrf
                                        <input type="hidden" name="plan_id" value="1">
                                        
                                        <div class="action d-flex flex-column">
                                            <input type="hidden" class="price" value="{{$plans[0]->price}}">
                                            <p class="text-white text-center container">Months</p>
                                            
                                            <div class="container input-group input-group-sm mb-3 px-8  buyvalues">
                                                <button class="btn btn-secondary buy_minus" type="button">-</button>
                                                <input type="number" class="form-control quantity" value="1" name="duration" />
                                                <button class="btn btn-secondary buy_plus" type="button">+</button>
                                            </div>
                                            <div class="text-white text-center container">Connections</div>
                                            <div class="px-8 mb-3">
                                                <select name="connections" id="" class="connections form-control pt-3 ">
                                                    <option value="1">1 Device</option>
                                                    <option value="2">2 Devices</option>
                                                    <option value="3">3 Devices</option>
                                                    <option value="4">4 Devices</option>
                                                </select>
                                            </div>
                                            <div class="fs-5x text-white fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                <span class="align-self-start fs-2 mt-3">₦</span>
                                                <span class="displayed_price">{{number_format($plans[0]->price)}}</span>
                                            </div> 
                                            @guest
                                            <div class="fv-row my-5 fv-plugins-icon-container px-8">
                                                <!--begin::Label-->
                                                <label class="form-label fs-6 fw-bold text-white">Email</label>
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
                                            <div class="fv-row mb-10 fv-plugins-icon-container px-8">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack mb-2">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-bold text-white fs-6 mb-0">Password</label> 
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
            
                                            <button type="submit" class="btn bg-white bg-opacity-20 bg-hover-white text-hover-success text-white text-center fw-bold mx-auto buy">
                                                Buy
                                            </button>
                                            
                                        </div>
                                    </form>
                                </div>

                                
                                
                            </div>
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

                        
                        <div class="card">
                            <!--begin::Table-->
                            <div class="card-body">
                                <div class="min-w-200px card-rounded bg-info py-12 mb-5">
                                    <form action="{{route('subscription')}}" method="post">@csrf
                                        <input type="hidden" name="plan_id" value="2">
                                        
                                        <div class="action d-flex flex-column">
                                            <input type="hidden" class="price" value="{{$plans[1]->price}}">
                                            <p class="text-white text-center container">Months</p>
                                            
                                            <div class="container input-group input-group-sm mb-3 px-8  buyvalues">
                                                <button class="btn btn-secondary buy_minus" type="button">-</button>
                                                <input type="number" class="form-control quantity" value="1" name="duration" />
                                                <button class="btn btn-secondary buy_plus" type="button">+</button>
                                            </div>
                                            <div class="text-white text-center container">Connections</div>
                                            <div class="px-8 mb-3">
                                                <select name="connections" id="" class="connections form-control pt-3 ">
                                                    <option value="1">1 Device</option>
                                                    <option value="2">2 Devices</option>
                                                    <option value="3">3 Devices</option>
                                                    <option value="4">4 Devices</option>
                                                </select>
                                            </div>
                                            <div class="fs-5x text-white fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                <span class="align-self-start fs-2 mt-3">₦</span>
                                                <span class="displayed_price">{{number_format($plans[1]->price)}}</span>
                                            </div> 
                                            @guest
                                            <div class="fv-row my-5 fv-plugins-icon-container px-8">
                                                <!--begin::Label-->
                                                <label class="form-label fs-6 fw-bold text-white">Email</label>
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
                                            <div class="fv-row mb-10 fv-plugins-icon-container px-8">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack mb-2">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-bold text-white fs-6 mb-0">Password</label> 
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
            
                                            <button type="submit" class="btn bg-white bg-opacity-20 bg-hover-white text-hover-info text-white text-center fw-bold mx-auto buy">
                                                Buy
                                            </button>
                                            
                                        </div>
                                    </form>
                                </div>

                                
                                
                            </div>
                            <!--end::Table-->
                        </div>
                    </div>
                    
                </div>
                
                
                
                {{-- <div class="card-footer d-flex justify-content-center py-6 px-9 ">
                    <button type="submit" class="btn btn-primary total_area px-6" style="display:none;">
                        Pay ₦ <span id="grandtotal"></span>
                    </button>
                </div>
            </form> --}}
        </div>
        
    </div>
    <!--end::Card body-->
</div>