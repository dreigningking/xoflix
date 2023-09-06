<div class="card">
    <!--begin::Card body-->
    <div class="card-body px-10 px-lg-20 pt-17 pb-10">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-striped gy-7">
                <!--begin::Table head-->
                <thead class="align-middle">
                    <tr id="kt_pricing">
                        @if($one)
                        <th class="text-center min-w-200px">
                            <div class="min-w-200px card-rounded border border-dark py-12 mb-15">
                                <div class="text-dark fs-3 fw-bold mb-7">1 Month</div>

                                <div class="fs-5x fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                    <span class="align-self-start fs-2 mt-3">₦</span>
                                    {{number_format($one)}}
                                </div>

                                {{-- <div class="text-muted fw-bold mb-7">Monthly</div> --}}
                                <form action="{{route('subscription')}}" method="post">@csrf
                                    <input type="hidden" name="duration" value="1">
                                    <button class="btn btn-light-dark fw-bold mx-auto">Buy</button>
                                </form>
                            </div>
                        </th>
                        @endif
                        @if($three)
                        <th class="text-center min-w-200px">
                            <div class="min-w-200px bg-success card-rounded py-12 mb-15">
                                <div class="text-white fs-3 fw-bold mb-7">3 Months</div>

                                <div class="fs-5x text-white fw-semibold d-flex justify-content-center align-items-start lh-sm">
                                    <span class="align-self-start fs-2 mt-3">₦</span>
                                    {{number_format($three)}}
                                </div>
                                <form action="{{route('subscription')}}" method="post">@csrf
                                    <input type="hidden" name="duration" value="3">
                                    <button class="btn bg-white bg-opacity-20 bg-hover-white text-hover-success text-white fw-bold mx-auto">Buy</button>
                                </form>
                            </div>
                        </th>
                        @endif
                        @if($six)
                        <th class="text-center min-w-200px">
                            <div class="min-w-200px bg-primary card-rounded py-12 mb-15">
                                <div class="text-white fs-3 fw-bold mb-7">6 Months</div>

                                <div class="fs-5x text-white d-flex justify-content-center align-items-start">
                                    <span class="fs-2 mt-3">₦</span>

                                    {{number_format($six)}}
                                </div>
                                <form action="{{route('subscription')}}" method="post">@csrf
                                    <input type="hidden" name="duration" value="6">
                                    <button class="btn bg-white bg-opacity-20 bg-hover-white text-hover-primary text-white fw-bold mx-auto">Buy</button>
                                </form>
                            </div>
                        </th>
                        @endif
                        @if($twelve)
                        <th class="text-center min-w-200px">
                            <div class="min-w-200px bg-info card-rounded py-12 mb-15">
                                <div class="text-white fs-3 fw-bold mb-7">12 Months</div>

                                <div class="fs-5x text-white d-flex justify-content-center align-items-start">
                                    <span class="fs-2 mt-3">₦</span>
                                    {{number_format($twelve)}}
                                    
                                </div>
                                <form action="{{route('subscription')}}" method="post">@csrf
                                    <input type="hidden" name="duration" value="12">
                                    <button class="btn bg-white bg-opacity-20 bg-hover-white text-hover-info text-white fw-bold mx-auto">Buy</button>
                                </form>
                            </div>
                        </th>
                        @endif
                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                {{-- <tbody>
                    <tr>
                        <th class="card-rounded-start">
                            <div class="fw-bold d-flex align-items-center ps-9 fs-3">Sublicense Visuals</div>
                        </th>

                        <td>
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td>
                            <div class="px-7 flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td class="card-rounded-end">
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="card-rounded-start">
                            <div class="fw-bold d-flex align-items-center ps-9 fs-3">Free Updates</div>
                        </th>

                        <td>
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td>
                            <div class="px-7 flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td class="card-rounded-end">
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="card-rounded-start">
                            <div class="fw-bold d-flex align-items-center ps-9 fs-3">Theme Support</div>
                        </th>

                        <td>
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td>
                            <div class="px-7 flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td class="card-rounded-end">
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-0"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="card-rounded-start">
                            <div class="fw-bold d-flex align-items-center ps-9 fs-3">Unlimited Websites</div>
                        </th>

                        <td>
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td>
                            <div class="px-7 flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td class="card-rounded-end">
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="card-rounded-start">
                            <div class="fw-bold d-flex align-items-center ps-9 fs-3">DDOS Protection</div>
                        </th>

                        <td>
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td>
                            <div class="px-7 flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td class="card-rounded-end">
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="card-rounded-start">
                            <div class="fw-bold d-flex align-items-center ps-9 fs-3">Domain Reseller</div>
                        </th>

                        <td>
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td>
                            <div class="px-7 flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>

                        <td class="card-rounded-end">
                            <div class="flex-root d-flex justify-content-center">
                                <span class="h-40px w-40px d-flex flex-center d-block">
                                    <i class="ki-duotone ki-check fs-2x text-success"></i>
                                </span>

                                <span class="h-40px w-40px d-flex flex-center d-none">
                                    <i class="ki-duotone ki-cross fs-2x text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody> --}}
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--end::Card body-->
</div>