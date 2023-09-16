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
                                    <span class="fs-4 fw-bold">Standard</span>
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
                                        
                                        <th class="text-center min-w-200px">
                                            <div class="min-w-200px card-rounded border border-dark py-12 mb-5">
                                                <div class="text-dark fs-3 fw-bold mb-7">1 Month</div>
                
                                                <div class="fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                    <span class="align-self-start fs-2 mt-3">₦</span>
                                                    {{-- {{number_format($plans->firstWhere('name','Premium')->prices[0]['description'])}} --}}
                                                    {{number_format($one)}}
                                                </div>
                
                                                {{-- <div class="text-muted fw-bold mb-7">Monthly</div> --}}
                                                <div class="action">
                                                    <input type="hidden" name="preduration" value="1">
                                                    <button type="button" class="btn btn-light-dark fw-bold mx-auto buy">Buy</button>
                                                    <div class="input-group input-group-sm pt-3 px-10 text-center buyvalues" style="display: none">
                                                        <button class="btn btn-secondary buy_plus" type="button">+</button>
                                                        <input type="number" name="buy_" value="1" class="form-control w-25 buyinput"/>
                                                        <button class="btn btn-secondary buy_minus" type="button" id="button-addon2">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        
                                        @if($three)
                                        <th class="text-center min-w-200px">
                                            <div class="min-w-200px bg-success card-rounded py-12 mb-5">
                                                <div class="text-white fs-3 fw-bold mb-7">3 Months</div>
                
                                                <div class="fs-5x text-white fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                    <span class="align-self-start fs-2 mt-3">₦</span>
                                                    {{number_format($three)}}
                                                </div>
                                                
                                                <input type="hidden" name="duration" value="3">
                                                <div class="action">
                                                    <input type="hidden" name="preduration" value="1">
                                                    <button type="button" class="btn btn-light-dark fw-bold mx-auto buy">Buy</button>
                                                    <div class="input-group input-group-sm pt-3 px-10 text-center buyvalues" style="display: none">
                                                        <button class="btn btn-secondary buy_plus" type="button">+</button>
                                                        <input type="number" name="buy_" value="1" class="form-control w-25 buyinput"/>
                                                        <button class="btn btn-secondary buy_minus" type="button" id="button-addon2">-</button>
                                                    </div>
                                                </div>
                                                    {{-- <button class="btn bg-white bg-opacity-20 bg-hover-white text-hover-success text-white fw-bold mx-auto">Buy</button> --}}
                                                
                                            </div>
                                        </th>
                                        @endif
                                        @if($six)
                                        <th class="text-center min-w-200px">
                                            <div class="min-w-200px bg-primary card-rounded py-12 mb-5">
                                                <div class="text-white fs-3 fw-bold mb-7">6 Months</div>
                
                                                <div class="fs-5x text-white d-flex justify-content-center align-items-start">
                                                    <span class="fs-2 mt-3">₦</span>
                
                                                    {{number_format($six)}}
                                                </div>
                                                
                                                <div class="action">
                                                    <input type="hidden" name="preduration" value="1">
                                                    <button type="button" class="btn btn-light-dark fw-bold mx-auto buy">Buy</button>
                                                    <div class="input-group input-group-sm pt-3 px-10 text-center buyvalues" style="display: none">
                                                        <button class="btn btn-secondary buy_plus" type="button">+</button>
                                                        <input type="number" name="buy_" value="1" class="form-control w-25 buyinput"/>
                                                        <button class="btn btn-secondary buy_minus" type="button" id="button-addon2">-</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </th>
                                        @endif
                                        @if($twelve)
                                        <th class="text-center min-w-200px">
                                            <div class="min-w-200px bg-info card-rounded py-12 mb-5">
                                                <div class="text-white fs-3 fw-bold mb-7">12 Months</div>
                
                                                <div class="fs-5x text-white d-flex justify-content-center align-items-start">
                                                    <span class="fs-2 mt-3">₦</span>
                                                    {{number_format($twelve)}}
                                                    
                                                </div>
                                                
                                                    <input type="hidden" name="duration" value="12">
                                                    <button class="btn bg-white bg-opacity-20 bg-hover-white text-hover-info text-white fw-bold mx-auto">Buy</button>
                                                
                                            </div>
                                        </th>
                                        @endif
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                
                                <!--begin::Table body-->
                                
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">
                        Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit.
                        Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat.
                        Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute laboris nisi.
                        Labore labore veniam irure irure ipsum pariatur mollit magna in cupidatat dolore magna irure esse tempor ad mollit.
                        Dolore commodo nulla minim amet ipsum officia consectetur amet ullamco voluptate nisi commodo ea sit eu.
                    </div>

                    
                </div>
                
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
            </form>
        </div>
       
        
        <!--end::Table container-->
    </div>
    <!--end::Card body-->
</div>