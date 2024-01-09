<div class="card">
    <!--begin::Card body-->
    <div class="card-body px-5 px-lg-20 pt-17 pb-10">
        <div class="py-5 d-flex flex-column justify-content-between">
            @foreach ($plans as $plan)
            <button type="button" class="btn btn-primary my-5" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_{{$plan->id}}">
                {{$plan->name}} Plan
            </button>

            @endforeach

            @foreach ($plans as $plan)
            <div class="modal fade" tabindex="-1" id="kt_modal_stacked_{{$plan->id}}">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">{{$plan->name}} Plan</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-dark ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <div class="text-center">
                                <a data-bs-stacked-modal="#kt_features_stacked_{{$plan->id}}">
                                    View Plan Features
                                </a>
                            </div>
                            
                            <div class="card">
                                <!--begin::Table-->
                                <div class="card-body">
                                    <div class="min-w-200px card-rounded bg-info py-12 mb-5">
                                        <form action="{{ route('subscription') }}" method="post">@csrf
                                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                                            <div class="action d-flex flex-column">
                                                <input type="hidden" class="price"
                                                    value="{{ $plan->price }}">
                                                <p class="text-white text-center container">Months</p>

                                                <div
                                                    class="container input-group input-group-sm mb-3 px-8  buyvalues">
                                                    <button class="btn btn-secondary buy_minus"
                                                        type="button">-</button>
                                                    <input type="number" class="form-control quantity"
                                                        value="1" name="duration" />
                                                    <button class="btn btn-secondary buy_plus"
                                                        type="button">+</button>
                                                </div>
                                                <div class="d-flex flex-column flex-md-row justify-content-center my-5 px-7">
                                                    <button type="button"
                                                        class="btn btn-sm btn-light m-1 changeDuration"
                                                        data-months="3">3 months</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-secondary m-1 changeDuration"
                                                        data-months="6">6 month</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-dark m-1 changeDuration"
                                                        data-months="12">1 year</button>
                                                </div>
                                                <div class="text-white text-center container">Connections</div>
                                                <div class="px-8 mb-3">
                                                    <select name="connections" id=""
                                                        class="connections form-control pt-3 ">
                                                        <option value="1">1 Device</option>
                                                        <option value="2">2 Devices</option>
                                                        <option value="3">3 Devices</option>
                                                        <option value="4">4 Devices</option>
                                                    </select>
                                                </div>
                                                <div
                                                    class="fs-5x text-white fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                                    <span class="align-self-start fs-2 mt-3">₦</span>
                                                    <span
                                                        class="displayed_price">{{ number_format($plan->price) }}</span>
                                                </div>
                                                @guest
                                                    <div class="fv-row my-5 fv-plugins-icon-container px-8">
                                                        <!--begin::Label-->
                                                        <label class="form-label fs-6 fw-bold text-white">Email</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input
                                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                            type="email" name="email"
                                                            value="{{ old('email') }}" required autocomplete="email"
                                                            autofocus>
                                                        <!--end::Input-->
                                                        @error('email')
                                                            <div
                                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror

                                                    </div>

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10 fv-plugins-icon-container px-8">
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack mb-2">
                                                            <!--begin::Label-->
                                                            <label
                                                                class="form-label fw-bold text-white fs-6 mb-0">Password</label>
                                                        </div>
                                                        <!--end::Wrapper-->
                                                        <input
                                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                            type="password" name="password" required
                                                            autocomplete="current-password">

                                                        @error('password')
                                                            <div
                                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback d-block">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                @endguest

                                                <button type="submit"
                                                    class="btn bg-white bg-opacity-20 bg-hover-white text-hover-info text-white text-center fw-bold mx-auto buy">
                                                    Buy
                                                </button>

                                            </div>
                                        </form>
                                    </div>



                                </div>
                                <!--end::Table-->
                            </div>

                            
                        </div>

                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($plans as $plan)
            <div class="modal fade" tabindex="-1" id="kt_features_stacked_{{$plan->id}}">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">{{$plan->name}} Features</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-dark ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <table class="table-bordered border-secondary">
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <h1 class="">{{ $plan->name }} Plan Features</h1>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Channel:</div>
                                            <div>{{ $plan->channels }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                HD Quality:</div>
                                            <div>{{ $plan->hd_quality }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Video On Demand:</div>
                                            <div>{{ $plan->video_on_demand }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Sports:</div>
                                            <div>{{ $plan->sports }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                International Channels:</div>
                                            <div>{{ $plan->intl_channels }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Customer Support:</div>
                                            <div>{{ $plan->customer_support }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Device Compatibility:</div>
                                            <div>{{ $plan->device_compatibility }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Servers:</div>
                                            <div>{{ $plan->servers }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Movie Organization:</div>
                                            <div>{{ $plan->movie_organization }}</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center p-2">
                                        <div class="d-flex flex-column">
                                            <div class="pe-2 fs-5 fw-bold">
                                                Adult Channels:</div>
                                            <div>{{ $plan->adult_channels }}</div>
                                        </div>
                                    </td>
                                </tr>

                            </table>

                            
                        </div>

                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!--begin::Accordion-->
            <div class="accordion accordion-icon-collapse" id="kt_accordion_3">
                
                <div class="mt-5">
                    <!--begin::Header-->
                    <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse" data-bs-target="#kt_accordion_3_item_2">
                        <span class="accordion-icon">
                        <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span class="path1"></span><span class="path2"></span></i>
                        </span>
                        <h3 class="fs-4 fw-semibold mb-0 ms-4">Features</h3>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div id="kt_accordion_3_item_2" class="collapse fs-6 ps-10" data-bs-parent="#kt_accordion_3">
                        <img src="{{asset('media/features.jpeg')}}" alt="" class="img-fluid">
                    </div>
                    <!--end::Body-->
                </div>
                
            </div>
            <!--end::Accordion-->
        </div>

    </div>
    <!--end::Card body-->
</div>
