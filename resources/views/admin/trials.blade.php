@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
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

                <!--begin::Row-->
                <div class="row g-xxl-9">
                    <!--begin::Col-->
                    <div class="col-xxl-12">
                        <!--begin::Earnings-->
                        <div class="card  card-xxl-stretch mb-5 mb-xxl-10">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>Trial Statistics</h3>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pb-0">
                                <span class="fs-5 fw-semibold text-gray-600 d-block">Last 30 day earnings calculated.
                                    Apart from arranging the order of topics.</span>

                                <!--begin::Left Section-->
                                <div class="d-flex flex-wrap justify-content-between pb-6">
                                    <!--begin::Row-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Col-->
                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span data-kt-countup="true" data-kt-countup-value="{{number_format($total)}}"
                                                    data-kt-countup-prefix="$" class="counted"
                                                    data-kt-initialized="1">{{number_format($total)}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Total</span>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span class="counted" data-kt-countup="true" data-kt-countup-value="{{number_format($expired)}}"
                                                    data-kt-initialized="1">{{number_format($expired)}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Expired</span>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span data-kt-countup="true" data-kt-countup-value="{{number_format($ongoing)}}"
                                                    data-kt-countup-prefix="$" class="counted"
                                                    data-kt-initialized="1">{{number_format($ongoing)}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Ongoing</span>
                                        </div>

                                        <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                            <span class="fs-2x fw-bold text-gray-800 lh-1">
                                                <span data-kt-countup="true" data-kt-countup-value="{{number_format($available)}}"
                                                    data-kt-countup-prefix="$" class="counted"
                                                    data-kt-initialized="1">{{number_format($available)}}</span>
                                            </span>
                                            <span class="fs-6 fw-semibold text-gray-400 d-block lh-1 pt-2">Available</span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addtrial" class="btn btn-primary  px-6 flex-shrink-0 align-self-center">Add New</a>
                                </div>
                                <!--end::Left Section-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Earnings-->
                    </div>

                </div>
                <!--end::Row-->


                <!--begin::Statements-->
                <div class="card  ">
                    <!--begin::Header-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3 class="m-0 text-gray-800">Trials</h3>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-around gap-5">
                            <div class="my-1">
                                <!--begin::Select-->
                                <button type="button" class="btn btn-primary mt-3 disabled"  id="shareto">Share to Affiliate</button>
                                <!--end::Select-->
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-light-primary me-3 mt-4" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    Filter
                                </button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->

                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <form action="#" method="get">
                                            <!--begin::Input group-->
                                            <div class="mb-10 d-flex">
                                                <label class="form-label fs-6 fw-semibold mr-4">Type: </label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-check form-check-sm form-check-custom mx-3">
                                                        <input class="form-check-input mx-3" name="type[]" @if(in_array('xstream',$type)) checked @endif type="checkbox" value="xstream"> Xtream
                                                    </div>
                                                    <div class="form-check form-check-sm form-check-custom mx-3">
                                                        <input class="form-check-input mx-3" name="type[]" @if(in_array('m3u_plus',$type)) checked @endif type="checkbox" value="m3u_plus"> M3u
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="mb-10 d-flex">
                                                <label class="form-label fs-6 fw-semibold mr-4">Show: </label>
                                                <div class="d-flex flex-column">
                                                    <div class="form-check form-check-sm form-check-custom mb-3">
                                                        <input class="form-check-input mx-3" @if($assigned) checked @endif name="assigned" type="checkbox" value="1"> Assigned
                                                    </div>
                                                    <div class="form-check form-check-sm form-check-custom mb-3">
                                                        <input class="form-check-input mx-3" @if($shared) checked @endif name="shared" type="checkbox" value="1"> Shared
                                                    </div>
                                                    <div class="form-check form-check-sm form-check-custom">
                                                        <input class="form-check-input mx-3" @if($expired) checked @endif name="expired" type="checkbox" value="1"> Expired
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                    data-kt-menu-dismiss="true"
                                                    data-kt-user-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                    data-kt-menu-dismiss="true"
                                                    data-kt-user-table-filter="filter">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                    </div>
                                    <!--end::Content-->
                                </div>

                            </div>

                            <!--begin::Add product-->

                            <!--end::Add product-->
                        </div>

                    </div>
                    <!--end::Header-->

                    <!--begin::Tab Content-->
                    <div id="kt_referred_users_tab_content" class="tab-content">
                        <!--begin::Tab panel-->
                        <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel"
                            aria-labelledby="kt_referrals_year_tab">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                    <!--begin::Thead-->
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                        <tr>
                                            <th class="">
                                                <div class="form-check form-check-sm form-check-custom ">
                                                    <input class="form-check-input" id="checkbox_master" type="checkbox" value="1">
                                                </div>
                                            </th>
                                            <th class="w-175px px-0">Generated</th>
                                            <th class="w-150px px-0">Type</th>
                                            <th class="w-100px">Details</th>
                                            <th class="min-w-125px text-center">Assign</th>

                                        </tr>
                                    </thead>
                                    <!--end::Thead-->

                                    <!--begin::Tbody-->
                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                        @foreach ($trials as $trial)
                                        <tr data-trial="{{$trial->id}}">
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom">
                                                    <input name="trial_id" value="{{$trial->id}}" class="form-check-input checkboxes" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="px-0">
                                                {{$trial->created_at->format('M d, Y')}} 
                                                <span class="text-gray-400 d-block fs-7">
                                                    Time: {{$trial->created_at->format('h:i A')}}
                                                </span>
                                                    
                                            </td>
                                            <td class="px-0">{{ucwords($trial->type)}}</td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <span class="text-gray-400 text-hover-primary fs-5">
                                                        {{$trial->link}}
                                                    </span>
                                                    @if(!Str::contains($trial->link, 'username'))
                                                    <span class="text-gray-400 d-block fs-7">User: {{$trial->username}} | Password:
                                                        {{$trial->password}}</span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td class="text-center px-0">
                                                @if($trial->user_id)
                                                Assigned
                                                @elseif($trial->affiliate_id)
                                                Shared
                                                @else
                                                <button type="button" class="btn btn-light btn-sm btn-active-light-primary selectuser" data-trial="{{$trial->id}}">Select
                                                    User</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                    <!--end::Tbody-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Tab panel-->


                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end::Statements-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="selectuser" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Select User</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body mx-5 mx-xl-15">
                    <!--begin::Form-->
                    <form id="kt_selectuser_form" method="POST" action="" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

                        <input type="hidden" name="trial_id" id="trial_id">
                        
                        <div class="mb-10 row">
                            <label class="form-label">User</label>
                            <select name="user_id" id="user_id" class="form-select form-select-solid select-remote w-100" style="width: 100%" data-dropdown-parent="#selectuser" data-placeholder="Select an option" data-allow-clear="true">
                                <option></option>
                                
                            </select>
                        </div>
                        
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">
                                Discard
                            </button>

                            <button type="button" id="assign_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="selectaffiliate" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Select User</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body mx-5 mx-xl-15">
                    <!--begin::Form-->
                    <form id="kt_affiliate_form"  action="" class="form fv-plugins-bootstrap5 fv-plugins-framework">

                        <input type="hidden" name="trial_id" id="trial_id">
                        
                        <div class="mb-10 row">
                            <label class="form-label">Affiliate</label>
                            <select name="user_id" id="affiliate_id" class="form-select form-select-solid select-remote w-100" style="width: 100%" data-dropdown-parent="#selectaffiliate" data-placeholder="Select an option" data-allow-clear="true">
                                <option></option>
                            </select>
                        </div>
                        
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">
                                Discard
                            </button>

                            <button type="button" id="share_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
@endsection
@push('scripts')
    <script>
        
        $('.selectuser').on('click',function(){
            $('#trial_id').val($(this).attr('data-trial'))
            $('#selectuser').modal('show')
        })
        $('#assign_submit').on('click',function(){
            let trial_id = $('#trial_id').val()
            let user_id = $('#user_id').val()
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('admin.assign_trial')}}",
                data: {
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'user_id': user_id,
                    'trial_id': trial_id
                },
                success:function(data) {
                    // $('.selectuser[data-trial='+trial_id+']').replaceWith("<span>Assigned</span>")
                    $('tr[data-trial='+trial_id+']').fadeOut();
                    $('#selectuser').modal('hide')
                },
                error: function (data, textStatus, errorThrown) {
                    //show error on modal
                    console.log(data);
                },
            });
            
        })
        $(document).on('change','.checkboxes,#checkbox_master',function(){
            console.log($('.checkboxes:checked').length)
            if($('.checkboxes:checked').length){
                $('#shareto').removeClass('disabled')
                console.log('removing')
            }else{
                $('#shareto').addClass('disabled')
                console.log('adding')
            }
        })
        $('#shareto').click(function(){
            $('#selectaffiliate').modal('show')
        })
        $('#share_submit').on('click',function(){
            // console.log($('.checkboxes:checked'))
            let user_id = $('#affiliate_id').val();
            let trials = [];
            $('.checkboxes:checked').each(function(index,valu){
                trials.push(valu.value)
            })
            console.log(user_id)
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('admin.share_to_affilate')}}",
                data: {
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'user_id': user_id,
                    'trials': trials
                },
                success:function(data) {
                    // $('.selectuser[data-trial='+trial_id+']').replaceWith("<span>Assigned</span>")
                    trials.forEach(function (el) {
                        $('tr[data-trial='+el+']').fadeOut();
                    })
                    
                    $('#selectaffiliate').modal('hide')
                    
                },
                error: function (data, textStatus, errorThrown) {
                    //show error on modal
                    console.log(data);
                },
            });
        })
        
    </script>
@endpush
