@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endpush
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
                    
                        
                        <div class="card-body">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" role="tab" href="#global">
                                        Settings                    </a>
                                </li>
                                <!--end::Nav item-->
                                            <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab" role="tab" href="#urls">
                                        URLS                    </a>
                                </li>
                                
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab" role="tab" href="#panels">
                                        Panels                    
                                    </a>
                                </li>
                        
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="global" role="tabpanel">
                                    <form action="{{route('admin.settings')}}" method="post">@csrf
                                        <div class="card">
                                            <div class="card-header border-0">
                                                <div class="card-title m-0">
                                                    <h3 class="fw-bold m-0">Global Settings</h3>
                                                </div>
                                            </div>
                                            <div class="card-body py-0 px-9">
                                    
                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Referral Bonus %</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="number" value="{{$settings->firstWhere('name','referral_bonus_percentage')->value}}" name="referral_bonus_percentage" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="" >
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                
                                                <!--end::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Minimum Withdrawal </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="number" name="minimum_withdrawal" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="" value="{{$settings->firstWhere('name','minimum_withdrawal')->value}}">
                                                        
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Maximum Withdrawal </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="number" name="maximum_withdrawal" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="" value="{{$settings->firstWhere('name','maximum_withdrawal')->value}}">
                                                        
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pagination </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="number" name="pagination" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="" value="{{$settings->firstWhere('name','pagination')->value}}">
                                                        <div class="form-text">
                                                            How many records per page.
                                                        </div>
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bank Name </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="bank_name" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" value="{{$settings->firstWhere('name','bank_name')->value}}">
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bank Account Number </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="number" name="account_number" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" value="{{$settings->firstWhere('name','account_number')->value}}">
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Account Name </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="account_name" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" value="{{$settings->firstWhere('name','account_name')->value}}">
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Payment Redirection</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="url" name="payment_redirection" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="https://" value="{{$settings->firstWhere('name','payment_redirection')->value}}">
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <div class="card-header border-0">
                                                <div class="card-title m-0">
                                                    <h3 class="fw-bold m-0">Email Preferences</h3>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <!--begin::Form-->
                                                
                                                    <!--begin::Card body-->
                                                    <div class="card-body border-top px-9 py-9">
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                                            <!--begin::Input-->
                                                            <input type='hidden' value='0' id="get_payment_email" name='get_payment_email'>
                                                            <input class="form-check-input me-3" type="checkbox" name="get_payment_email" value="1" @if($settings->firstWhere('name','get_payment_email')->value) checked @endif>
                                                            <!--end::Input-->
                    
                                                            <!--begin::Label-->
                                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                                <span class="fw-bold fs-5 mb-0">Successful Payments</span>
                                                                <span class="text-muted fs-6">Receive a notification for every successful
                                                                    payment.</span>
                                                            </span>
                                                            <!--end::Label-->
                                                        </label>
                                                        <!--end::Option-->
                    
                                                        <!--begin::Option-->
                                                        <div class="separator separator-dashed my-6"></div>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                                            <!--begin::Input-->
                                                            <input type='hidden' value='0' id="get_withdrawal_email" name='get_withdrawal_email'>
                                                            <input class="form-check-input me-3" type="checkbox" name="get_withdrawal_email"
                                                            @if($settings->firstWhere('name','get_withdrawal_email')->value) checked @endif value="1">
                                                            <!--end::Input-->
                    
                                                            <!--begin::Label-->
                                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                                <span class="fw-bold fs-5 mb-0">Withdrawal</span>
                                                                <span class="text-muted fs-6">Receive a notification for every initiated
                                                                    payout.</span>
                                                            </span>
                                                            <!--end::Label-->
                                                        </label>
                                                        <!--end::Option-->
                    
                                                        <!--begin::Option-->
                                                        <div class="separator separator-dashed my-6"></div>
                                                        <!--end::Option-->
                                                        
                                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                                            <!--begin::Input-->
                                                            <input type='hidden' value='0' id="send_subscription_email" name='send_subscription_email'>
                                                            <input class="form-check-input option me-3" type="checkbox" name="send_subscription_email"
                                                            @if($settings->firstWhere('name','send_subscription_email')->value) checked @endif value="1">
                                                            <!--end::Input-->
                                                            
                                                            <!--begin::Label-->
                                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                                <span class="fw-bold fs-5 mb-0">Subscription</span>
                                                                <span class="text-muted fs-6">Send subscription details to users by email.</span>
                                                            </span>
                                                            <!--end::Label-->
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <div class="separator separator-dashed my-6"></div>
                                                        <!--end::Option-->
                                                        
                                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                                            <!--begin::Input-->
                                                            <input type='hidden' value='0' id="get_support_email" name='get_support_email'>
                                                            <input class="form-check-input me-3" type="checkbox" name="get_support_email"
                                                            @if($settings->firstWhere('name','get_support_email')->value) checked @endif value="1">
                                                            <!--end::Input-->
                    
                                                            <!--begin::Label-->
                                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                                <span class="fw-bold fs-5 mb-0">Support</span>
                                                                <span class="text-muted fs-6">Receive Support Messages by email.</span>
                                                            </span>
                                                            <!--end::Label-->
                                                        </label>
                                                        <!--end::Option-->
                                                        
                                                        <!--end::Option-->
                    
                                                        
                                                    </div>
                                                    <!--end::Card body-->
                    
                                                    <!--begin::Card footer-->
                                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                                        <button type="submit" class="btn btn-primary  px-6">Save Changes</button>
                                                    </div>
                                                    <!--end::Card footer-->
                                                
                                                <!--end::Form-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="urls" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="card-title m-0">
                                                <h3 class="fw-bold m-0">Add Urls</h3>
                                            </div>
                                        </div>
                                        <form class="form" action="{{route('admin.links')}}" method="POST">@csrf
                                            <div class="card-body py-0 px-9">    
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">URL </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="url" value="" name="url" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="Enter URL" >
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="d-flex justify-content-start py-6 px-9">
                                                    <button type="submit" name="action" value="create" class="btn btn-primary  px-6">Save</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
                                        <!--begin::Card body-->
                                        <div class="card-body border-top px-9 mt-5 pb-4">
                                            <h2 class="mb-9 d-flex flex-column flex-md-row justify-content-between">
                                                <span>Links</span>
                                                <div class="d-flex align-items-center position-relative my-1">
                                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                          </svg>
                                                    </i>                
                                                    <input type="text" id="searchlinks" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                                                </div>
                                            </h2>
                                            <div class="table-responsive">
                                                <table id="urlTable" class="table table-row-dashed border-gray-300 align-middle gy-6">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Link</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold">
                                                        @foreach ($links as $link)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td> 
                                                                    <span class="text-display">{{$link->url}}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="d-flex">
                                                                        <a href="javascript:void(0)" href="javascript:void(0)" data_url="{{$link->url}}" data_url_id="{{$link->id}}" class="btn btn-info btn-sm edit_url me-2">Edit</a> 
                                                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_url" data_url="{{$link->url}}" data_url_id="{{$link->id}}">Delete</a> 
                                                                    </span>
                                                                    
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="panels" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="card-title m-0">
                                                <h3 class="fw-bold m-0">Add Panels</h3>
                                            </div>
                                        </div>
                                        <form class="form" action="{{route('admin.panels')}}" method="POST">@csrf
                                            <div class="card-body py-0 px-9">    
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Panel </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" value="" name="panel" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="Enter Panel name" >
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="d-flex justify-content-start py-6 px-9">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                                    <button type="submit" class="btn btn-primary px-6" name="action" value="create">Save</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
                                        <!--begin::Card body-->
                                        <div class="card-body border-top px-9 mt-5 pb-4">
                                            <h2 class="mb-9 d-flex flex-column flex-md-row justify-content-between">
                                                <span>Panel</span>
                                                <div class="d-flex align-items-center position-relative my-1">
                                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                          </svg>
                                                    </i>                
                                                    <input type="text" id="searchpanel" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                                                </div>
                                            </h2>
                                            <div class="table-responsive">
                                                <table id="panelTable" class="table table-row-dashed border-gray-300 align-middle gy-6">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Panel</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold">
                                                        @foreach ($panels as $panel)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$panel->name}}</td>
                                                                <td>
                                                                    <span class="d-flex">
                                                                        <a href="javascript:void(0)" href="javascript:void(0)" data_panel="{{$panel->name}}" data_panel_id="{{$panel->id}}" class="btn btn-info btn-sm edit_panel me-2">Edit</a> 
                                                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_panel" data_panel="{{$panel->name}}" data_panel_id="{{$panel->id}}">Delete</a> 
                                                                    </span>
                                                                    
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>

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
@section('modals')
<div class="modal fade custom-modal" id="edit_url">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit URL</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.links')}}" method="post">@csrf
					<input type="hidden" name="url_id" id="edit_url_id">
					<div class="awards-info">
						<div class="row form-row awards-cont">
							<div class="col-12">
								<div class="form-group">
									<label>URL</label>
									<input type="url" name="url" id="edit_url_name" class="form-control">
								</div>
							</div>
						</div>
					</div>
					
					<button type="submit" name="action" value="update" class="btn btn-info mt-4">
						Update
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade custom-modal" id="delete_url">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete URL</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.links')}}" method="post">@csrf
					<input type="hidden" name="url_id" id="delete_url_id">
					<p class="text-center font-weight-bold">Are you sure you want to delete this URL? </p>
					<code class="d-block mb-3" id="delete_url_name"></code>
					<button type="submit" name="action" value="delete" class="btn btn-danger">
						Delete
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade custom-modal" id="edit_panel">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Panel</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.panels')}}" method="post">@csrf
					<input type="hidden" name="panel_id" id="edit_panel_id">
					<div class="awards-info">
						<div class="row form-row awards-cont">
							<div class="col-12">
								<div class="form-group">
									<label>Panel</label>
									<input type="text" name="panel" id="edit_panel_name" class="form-control">
								</div>
							</div>
						</div>
					</div>
					
					<button type="submit" name="action" value="update" class="btn btn-info mt-4">
						Update
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade custom-modal" id="delete_panel">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete Panel</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.panels')}}" method="post">@csrf
					<input type="hidden" name="panel_id" id="delete_panel_id">
					<p class="text-center font-weight-bold">Are you sure you want to delete this panel? </p>
					<code class="d-block mb-3" id="delete_panel_name"></code>
					<button type="submit" name="action" value="delete" class="btn btn-danger">
						Delete
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    var urlTable = $("#urlTable").DataTable({});
    $('#searchlinks').on('keyup',function(){
        urlTable.search($(this).val()).draw();
    });
    var panelTable = $("#panelTable").DataTable({});
    $('#searchpanel').on('keyup',function(){
        panelTable.search($(this).val()).draw();
    });
    $('.edit_url').click(function(){
		let url_id = $(this).attr('data_url_id');
		let url = $(this).attr('data_url');
		$('#edit_url_id').val(url_id)
		$('#edit_url_name').val(url)
		
		$('#edit_url').modal('show');
	})

	$('.delete_url').click(function(){
		let url_id = $(this).attr('data_url_id');
		let url = $(this).attr('data_url');
		
		$('#delete_url_id').val(url_id)
		$('#delete_url_name').text(url)
		$('#delete_url').modal('show');
	})

    $('.edit_panel').click(function(){
		let panel_id = $(this).attr('data_panel_id');
		let panel = $(this).attr('data_panel');
		$('#edit_panel_id').val(panel_id)
		$('#edit_panel_name').val(panel)
		
		$('#edit_panel').modal('show');
	})

	$('.delete_panel').click(function(){
		let panel_id = $(this).attr('data_panel_id');
		let panel = $(this).attr('data_panel');
		
		$('#delete_panel_id').val(panel_id)
		$('#delete_panel_name').text(panel)
		$('#delete_panel').modal('show');
	})
</script>
@endpush
