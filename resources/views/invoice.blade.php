@extends('layouts.app')
@section('main')
	<div class="content flex-row-fluid" id="kt_content">
		<!--begin::Invoice-->
		<div class="card">
			<!--begin::Body-->
			<div class="card-body p-lg-20">
				<!--begin::Layout-->
				<div class="d-flex flex-column flex-xl-row">
					<!--begin::Sidebar-->
					<div class="m-0">
						<!--begin::Invoice sidebar-->
						<div
							class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
							<!--begin::Labels-->
							<div class="mb-8">
								<span class="text-success me-2">
									Use the account details below to make <br> payment and upload proof of payment below
								</span>
								
							</div>
							<!--end::Labels-->
							<!--begin::Title-->
							<h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">PAYMENT
								DETAILS</h6>
							<!--end::Title-->

							<div class="mb-6">
								<div class="fw-bold text-gray-600 fs-7">Amount:</div>
								<div class="fw-bolder text-gray-800 fs-2">₦{{number_format($payment->amount)}}</div>
							</div>
							<!--begin::Item-->
							<div class="mb-6">
								<div class="fw-bold text-gray-600 fs-7">Bank Name:</div>
								<div class="fw-bolder text-gray-800 fs-6">{{$bank}}</div>
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="mb-6">
								<div class="fw-bold text-gray-600 fs-7">Account:</div>
								<div class="fw-bolder text-gray-800 fs-6">
									
									<span class="clipboard_value">{{$account_number}}</span>
									<button class="copy_button btn btn-primary  fw-bold p-2">
										<i class="fa fa-copy copy_icon">
											 Copy
										</i>  
										<i class="bi bi-check fs-2 p-0 check_icon" style="display: none"></i>    
									</button>
									<br />{{$account_name}}
								</div>
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="mb-15">
								<div class="fw-bold text-gray-600 fs-7">Payment Method:
									<span class="badge badge-light-success me-2">Transfer</span>
										<span class="badge badge-light-warning">USSD</span>
								</div>
								
							</div>
							<!--end::Item-->
							<!--begin::Title-->
							<h6 class="mb-0 fw-boldest text-gray-600 text-hover-primary">PAYMENT PROOF </h6>
							<h3 class="mt-3">Payment proof (screenshot) must be <br> uploaded for
								payment to be acknowledged</h3>
							<form action="{{route('payment.upload')}}" method="post" enctype="multipart/form-data">@csrf
							<!--begin::Item-->
								<input type="hidden" name="payment_id" value="{{$payment->id}}">
								<div class=" mb-6">
									<!--begin::Label-->
									<label class="col-form-label required fw-semibold fs-6">Upload</label>
									<!--end::Label-->

									<!--begin::Col-->
									<div class=" fv-row fv-plugins-icon-container">
										<input type="file" name="upload" accept=".pdf,.jpg,.png" class="form-control form-control-lg  mb-3 mb-lg-0" required>
										<div
											class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
										</div>
									</div>
									<!--end::Col-->
								</div>
								<div class="mb-6 text-left">
									<button type="button" data-bs-toggle="modal" data-bs-target="#premium_details" class="btn  btn-primary btn-block">SUBMIT </button>
								</div>
								<div class="modal fade" id="premium_details" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										
										<div class="modal-content">
											<div class="modal-header">
												<!--begin::Modal title-->
												<h2 class="fw-bolder" data-kt-calendar="title">Important Info</h2>
												
											</div>
											<div class="modal-body">
												<p>Your payment is currently under verification. If approved, subscription details will be
													uploaded to your dashboard in 30 minutes. Thank you for your understanding.</p>
												
											</div>
											<div class="modal-footer flex-center">
												<!--begin::Button-->
												<button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger me-3">Cancel</button>
												<!--end::Button-->
												<!--begin::Button-->
												<button type="submit" class="btn btn-primary">
													<span class="indicator-label">I Understand</span>
												</button>
												<!--end::Button-->
											</div>
											
										</div>
										
									</div>
								</div>
							</form>
							<!--end::Item-->
						</div>
						<!--end::Invoice sidebar-->
					</div>
					<!--end::Sidebar-->
					<!--begin::Content-->
					<div class="flex-lg-row-fluid ms-xl-18 mb-10 mb-xl-0">
						<!--end::Head-->
						<!--begin::Wrapper-->
						<div class="mb-0">
							<!--begin::Label-->
							<div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #{{$payment->reference}}</div>
							<!--end::Label-->
							<!--begin::Row-->
							<div class="row g-5 mb-11">
								<!--end::Col-->
								<div class="col-sm-6">
									<!--end::Label-->
									<div class="fw-bold fs-7 text-gray-600 mb-1">Issue Date:</div>
									<!--end::Label-->
									<!--end::Col-->
									<div class="fw-bolder fs-6 text-gray-800">{{$payment->created_at->format('d	M Y')}}</div>
									<!--end::Col-->
								</div>
								<!--end::Col-->
								<!--end::Col-->
								<div class="col-sm-6">
									<!--end::Label-->
									<div class="fw-bold fs-7 text-gray-600 mb-1">Due Date:</div>
									<!--end::Label-->
									<!--end::Info-->
									<div
										class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
										<span class="pe-2">{{$payment->created_at->format('d M Y')}}</span>
										
									</div>
									<!--end::Info-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--begin::Row-->
							<div class="row g-5 mb-12">
								<!--end::Col-->
								<div class="col-sm-6">
									<!--end::Label-->
									<div class="fw-bold fs-7 text-gray-600 mb-1">Issue For:</div>
									<!--end::Label-->
									<!--end::Text-->
									<div class="fw-bolder fs-6 text-gray-800">{{$payment->user->name}}</div>
									<!--end::Text-->
									<!--end::Description-->
									<div class="fw-bold fs-7 text-gray-600">{{$payment->user->email}}
										<br />{{$payment->user->whatsapp}}
									</div>
									<!--end::Description-->
								</div>
								<!--end::Col-->
								<!--end::Col-->
								<div class="col-sm-6">
									<!--end::Label-->
									<div class="fw-bold fs-7 text-gray-600 mb-1">Issued By:</div>
									<!--end::Label-->
									<!--end::Text-->
									<div class="fw-bolder fs-6 text-gray-800">XOFLIX ENT.</div>
									<!--end::Text-->
									<!--end::Description-->
									{{-- <div class="fw-bold fs-7 text-gray-600">9858 South 53rd Ave.
										<br />Matthews, NC 28104
									</div> --}}
									<!--end::Description-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--begin::Content-->
							<div class="flex-grow-1">
								<!--begin::Table-->
								<div class="table-responsive border-bottom mb-9">
									<table class="table mb-3">
										<thead>
											<tr class="border-bottom fs-6 fw-bolder text-gray-400">
												<th class="min-w-175px pb-2">Description</th>
												<th class="min-w-70px text-end pb-2">Duration</th>
												<th class="min-w-80px text-end pb-2">Connections</th>
												<th class="min-w-100px text-end pb-2">Amount</th>
											</tr>
										</thead>
										<tbody>
											
											<tr class="fw-bolder text-gray-700 fs-5 text-end">
												<td class="d-flex align-items-center pt-6">
													<i
														class="fa fa-genderless text-danger fs-2 me-2"></i>{{$payment->subscription->plan->name}} Subscription
												</td>
												<td class="pt-6">{{$payment->subscription->duration}} Month</td>
												<td class="pt-6">{{$payment->subscription->connections}} Device(s)</td>
												<td class="pt-6 text-dark fw-boldest">₦{{$payment->amount}}</td>
											</tr>
											
											
										</tbody>
									</table>
								</div>
								<!--end::Table-->
								<!--begin::Container-->
								<div class="d-flex justify-content-end">
									<!--begin::Section-->
									<div class="mw-300px">
										<!--begin::Item-->
										<div class="d-flex flex-stack mb-3">
											<!--begin::Accountname-->
											<div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal:
											</div>
											<!--end::Accountname-->
											<!--begin::Label-->
											<div class="text-end fw-bolder fs-6 text-gray-800">₦
												{{number_format($payment->amount)}}</div>
											<!--end::Label-->
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex flex-stack mb-3">
											<!--begin::Accountname-->
											<div class="fw-bold pe-10 text-gray-600 fs-7">VAT 0%</div>
											<!--end::Accountname-->
											<!--begin::Label-->
											<div class="text-end fw-bolder fs-6 text-gray-800">0.00
											</div>
											<!--end::Label-->
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex flex-stack mb-3">
											<!--begin::Accountnumber-->
											<div class="fw-bold pe-10 text-gray-600 fs-7">Subtotal +
												VAT</div>
											<!--end::Accountnumber-->
											<!--begin::Number-->
											<div class="text-end fw-bolder fs-6 text-gray-800">₦
												{{number_format($payment->amount)}}</div>
											<!--end::Number-->
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="d-flex flex-stack">
											<!--begin::Code-->
											<div class="fw-bold pe-10 text-gray-600 fs-7">Total</div>
											<!--end::Code-->
											<!--begin::Label-->
											<div class="text-end fw-bolder fs-6 text-gray-800">₦
												{{number_format($payment->amount)}}</div>
											<!--end::Label-->
										</div>
										<!--end::Item-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
					
				</div>
				<!--end::Layout-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Invoice-->
	</div>               
@endsection
@push('scripts')
	
@endpush
	  

