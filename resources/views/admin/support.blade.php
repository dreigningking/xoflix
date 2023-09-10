@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-center flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 w-lg-10 mb-10 mb-lg-0">
                <!--begin::Contacts-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Form-->
                        <form class="w-100 position-relative" autocomplete="off">
                            <!--begin::Icon-->
                            <i
                                class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                    class="path1"></span><span class="path2"></span></i> <!--end::Icon-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid px-13" name="search"
                                value="" placeholder="Search by username or email...">
                            <!--end::Input-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-5" id="kt_chat_contacts_body">
                        <!--begin::List-->
                        <div class="me-n5 pe-5 h-200px h-lg-auto" >

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><span
                                            class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">M</span></div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody
                                            Macy</a>
                                        <div class="fw-semibold text-muted">melody@altbox.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <div class="d-flex align-items-center">
                                    <div class="ms-5"><span class="badge badge-sm badge-circle badge-light-success">1</span>
                                        <a class="fw-bold text-dark" href="{{route('admin.support.show')}}">
                                            Writing headlines for blog posts is much science and probably cool audience ok talk michael is coming
                                        </a>
                                    </div>
                                    
                                </div>
                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">12-Aug-2023 07:43PM</span>

                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><img alt="Pic"
                                            src="{{asset('media/avatars/300-1.jpg')}}"></div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max
                                            Smith</a>
                                        <div class="fw-semibold text-muted">max@kt.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <div class="d-flex align-items-center">
                                    <div class="ms-5">
                                        <a class="fw-semibold text-muted" href="#">
                                            Writing headlines for blog posts is much science and probably cool audience ok talk michael is coming
                                        </a>
                                    </div>
                                    
                                </div>
                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">1 week</span>

                                    <span class="badge badge-sm badge-circle badge-light-success">6</span>
                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><img alt="Pic"
                                            src="{{asset('media/avatars/300-5.jpg')}}"></div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean
                                            Bean</a>
                                        <div class="fw-semibold text-muted">sean@dellito.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">1 day</span>

                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><img alt="Pic"
                                            src="{{asset('media/avatars/300-25.jpg')}}">
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-8px w-8px ms-n2 mt-n2">
                                        </div>
                                    </div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian
                                            Cox</a>
                                        <div class="fw-semibold text-muted">brian@exchange.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">1 day</span>

                                    <span class="badge badge-sm badge-circle badge-light-warning">9</span>
                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><span
                                            class="symbol-label  bg-light-warning text-warning fs-6 fw-bolder ">C</span>
                                    </div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela
                                            Collins</a>
                                        <div class="fw-semibold text-muted">mik@pex.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">20 hrs</span>

                                    <span class="badge badge-sm badge-circle badge-light-warning">9</span>
                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><img alt="Pic"
                                            src="{{asset('media/avatars/300-9.jpg')}}"></div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis
                                            Mitcham</a>
                                        <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">1 day</span>

                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><span
                                            class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">O</span>
                                    </div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#"
                                            class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
                                        <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">5 hrs</span>

                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><span
                                            class="symbol-label  bg-light-primary text-primary fs-6 fw-bolder ">N</span>
                                    </div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil
                                            Owen</a>
                                        <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">3 hrs</span>

                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><img alt="Pic"
                                            src="{{asset('media/avatars/300-23.jpg')}}"></div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan
                                            Wilson</a>
                                        <div class="fw-semibold text-muted">dam@consilting.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">1 day</span>

                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->

                            <!--begin::Separator-->
                            <div class="separator separator-dashed "></div>
                            <!--end::Separator-->

                            <!--begin::User-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-45px symbol-circle "><span
                                            class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">E</span>
                                        <div
                                            class="symbol-badge bg-success start-100 top-100 border-4 h-8px w-8px ms-n2 mt-n2">
                                        </div>
                                    </div><!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
                                            Bold</a>
                                        <div class="fw-semibold text-muted">emma@intenso.com</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Lat seen-->
                                <div class="d-flex flex-column align-items-end ms-2">
                                    <span class="text-muted fs-7 mb-1">5 hrs</span>

                                    <span class="badge badge-sm badge-circle badge-light-success">2</span>
                                </div>
                                <!--end::Lat seen-->
                            </div>
                            <!--end::User-->


                        </div>
                        <div class="row py-5">
                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                <div class="dataTables_length" id="kt_customers_table_length">
                                    <label>
                                        <select name="kt_customers_table_length" aria-controls="kt_customers_table" class="form-select form-select-sm form-select-solid">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="kt_customers_table_previous">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="0" tabindex="0" class="page-link">
                                                <i class="previous"></i>
                                            </a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                        </li>
                                        <li class="paginate_button page-item next" id="kt_customers_table_next">
                                            <a href="#" aria-controls="kt_customers_table" data-dt-idx="5" tabindex="0" class="page-link">
                                                <i class="next"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Card body-->
                    
                </div>
                <!--end::Contacts-->
            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            
            <!--end::Content-->
        </div>
        <!--end::Layout-->
        <!--begin::Modals-->

        <!--begin::Modal - View Users-->
        <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->

                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <!--begin::Heading-->
                        <div class="text-center mb-13">
                            <!--begin::Title-->
                            <h1 class="mb-3">Browse Users</h1>
                            <!--end::Title-->

                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">
                                If you need more info, please check out our
                                <a href="#" class="link-primary fw-bold">Users Directory</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Users-->
                        <div class="mb-15">
                            <!--begin::List-->
                            <div class="mh-375px scroll-y me-n7 pe-7">
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{asset('media/avatars/300-6.jpg')}}">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Emma Smith

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Art Director </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$23,000</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                M </span>
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Melody Macy

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Marketing Analytic </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">melody@altbox.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$50,500</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{asset('media/avatars/300-1.jpg')}}">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Max Smith

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Software Enginer </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">max@kt.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$75,900</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{asset('media/avatars/300-5.jpg')}}">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Sean Bean

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Web Developer </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">sean@dellito.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$10,500</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{asset('media/avatars/300-25.jpg')}}">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Brian Cox

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    UI/UX Designer </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">brian@exchange.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$20,000</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-warning text-warning fw-semibold">
                                                C </span>
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Mikaela Collins

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Head Of Marketing </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">mik@pex.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$9,300</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{asset('media/avatars/300-9.jpg')}}">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Francis Mitcham

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Software Arcitect </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$15,000</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                O </span>
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Olivia Wild

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    System Admin </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$23,000</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                                N </span>
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Neil Owen

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Account Manager </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$45,800</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{asset('media/avatars/300-23.jpg')}}">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Dan Wilson

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Web Desinger </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">dam@consilting.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$90,500</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                E </span>
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Emma Bold

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Corporate Finance </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">emma@intenso.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$5,000</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="{{asset('media/avatars/300-12.jpg')}}">
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Ana Crown

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Customer Relationship </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$70,000</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 ">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-info text-info fw-semibold">
                                                A </span>
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                Robert Doe

                                                <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                    Marketing Executive </span>
                                            </a>
                                            <!--end::Name-->

                                            <!--begin::Email-->
                                            <div class="fw-semibold text-muted">robert@benko.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">$45,500</div>

                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::List-->
                        </div>
                        <!--end::Users-->

                        <!--begin::Notice-->
                        <div class="d-flex justify-content-between">
                            <!--begin::Label-->
                            <div class="fw-semibold">
                                <label class="fs-6">Adding Users by Team Members</label>

                                <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                            </div>
                            <!--end::Label-->

                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" checked="checked">

                                <span class="form-check-label fw-semibold text-muted">
                                    Allowed
                                </span>
                            </label>
                            <!--end::Switch-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - View Users--><!--begin::Modal - Users Search-->
        <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->

                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <!--begin::Content-->
                        <div class="text-center mb-13">
                            <h1 class="mb-3">Search Users</h1>

                            <div class="text-muted fw-semibold fs-5">
                                Invite Collaborators To Your Project
                            </div>
                        </div>
                        <!--end::Content-->

                        <!--begin::Search-->
                        <div id="kt_modal_users_search_handler" data-kt-search-keypress="true"
                            data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline"
                            data-kt-search="true">

                            <!--begin::Form-->
                            <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                                <!--begin::Hidden input(Added to disable form autocomplete)-->
                                <input type="hidden">
                                <!--end::Hidden input-->

                                <!--begin::Icon-->
                                <i
                                    class="ki-duotone ki-magnifier fs-2 fs-lg-1 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                        class="path1"></span><span class="path2"></span></i> <!--end::Icon-->

                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid px-15"
                                    name="search" value="" placeholder="Search by username, full name or email..."
                                    data-kt-search-element="input">
                                <!--end::Input-->

                                <!--begin::Spinner-->
                                <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                    data-kt-search-element="spinner">
                                    <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                                </span>
                                <!--end::Spinner-->

                                <!--begin::Reset-->
                                <span
                                    class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                    data-kt-search-element="clear">
                                    <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                                <!--end::Reset-->
                            </form>
                            <!--end::Form-->

                            <!--begin::Wrapper-->
                            <div class="py-5">
                                <!--begin::Suggestions-->
                                <div data-kt-search-element="suggestions">
                                    <!--begin::Heading-->
                                    <h3 class="fw-semibold mb-5">Recently searched:</h3>
                                    <!--end::Heading-->

                                    <!--begin::Users-->
                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="{{asset('media/avatars/300-6.jpg')}}">
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold">
                                                <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                                <span class="badge badge-light">Art Director</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                    M </span>
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold">
                                                <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                                <span class="badge badge-light">Marketing Analytic</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="{{asset('media/avatars/300-1.jpg')}}">
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold">
                                                <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                                <span class="badge badge-light">Software Enginer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="{{asset('media/avatars/300-5.jpg')}}">
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold">
                                                <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                                <span class="badge badge-light">Web Developer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="{{asset('media/avatars/300-25.jpg')}}">
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold">
                                                <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                                <span class="badge badge-light">UI/UX Designer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                </div>
                                <!--end::Suggestions-->

                                <!--begin::Results(add d-none to below element to hide the users list by default)-->
                                <div data-kt-search-element="results" class="d-none">
                                    <!--begin::Users-->
                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='0']"
                                                        value="0">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-6.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
                                                        Smith</a>

                                                    <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-7-b36m" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected=""
                                                        data-select2-id="select2-data-9-klvv">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-8-0m43"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-mnot-container"
                                                            aria-controls="select2-mnot-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-mnot-container" role="textbox"
                                                                aria-readonly="true" title="Owner">Owner</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='1']"
                                                        value="1">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        M </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody
                                                        Macy</a>

                                                    <div class="fw-semibold text-muted">melody@altbox.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-10-zlsy" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1" selected=""
                                                        data-select2-id="select2-data-12-6y7a">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-11-cpzi"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-da8i-container"
                                                            aria-controls="select2-da8i-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-da8i-container" role="textbox"
                                                                aria-readonly="true" title="Guest">Guest</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='2']"
                                                        value="2">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-1.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max
                                                        Smith</a>

                                                    <div class="fw-semibold text-muted">max@kt.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-13-fk9m" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected=""
                                                        data-select2-id="select2-data-15-58ok">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-14-sgma"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-2gns-container"
                                                            aria-controls="select2-2gns-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-2gns-container" role="textbox"
                                                                aria-readonly="true" title="Can Edit">Can Edit</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='3']"
                                                        value="3">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-5.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean
                                                        Bean</a>

                                                    <div class="fw-semibold text-muted">sean@dellito.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-16-htnx" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected=""
                                                        data-select2-id="select2-data-18-bde8">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-17-bstb"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-u4mm-container"
                                                            aria-controls="select2-u4mm-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-u4mm-container" role="textbox"
                                                                aria-readonly="true" title="Owner">Owner</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='4']"
                                                        value="4">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-25.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian
                                                        Cox</a>

                                                    <div class="fw-semibold text-muted">brian@exchange.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-19-y8bv" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected=""
                                                        data-select2-id="select2-data-21-ep1a">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-20-um86"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-9c10-container"
                                                            aria-controls="select2-9c10-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-9c10-container" role="textbox"
                                                                aria-readonly="true" title="Can Edit">Can Edit</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='5']"
                                                        value="5">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-warning text-warning fw-semibold">
                                                        C </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela
                                                        Collins</a>

                                                    <div class="fw-semibold text-muted">mik@pex.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-22-w1g8" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected=""
                                                        data-select2-id="select2-data-24-a94a">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-23-u0zx"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-r67p-container"
                                                            aria-controls="select2-r67p-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-r67p-container" role="textbox"
                                                                aria-readonly="true" title="Owner">Owner</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='6']"
                                                        value="6">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-9.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis
                                                        Mitcham</a>

                                                    <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-25-7oxo" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected=""
                                                        data-select2-id="select2-data-27-yihc">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-26-2hyl"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-5xwz-container"
                                                            aria-controls="select2-5xwz-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-5xwz-container" role="textbox"
                                                                aria-readonly="true" title="Can Edit">Can
                                                                Edit</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='7']"
                                                        value="7">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        O </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia
                                                        Wild</a>

                                                    <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-28-ivt1" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected=""
                                                        data-select2-id="select2-data-30-lvv0">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-29-ix48"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-seci-container"
                                                            aria-controls="select2-seci-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-seci-container" role="textbox"
                                                                aria-readonly="true" title="Owner">Owner</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='8']"
                                                        value="8">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                                        N </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil
                                                        Owen</a>

                                                    <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-31-i263" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1" selected=""
                                                        data-select2-id="select2-data-33-4aob">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-32-26ku"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-xa0h-container"
                                                            aria-controls="select2-xa0h-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-xa0h-container" role="textbox"
                                                                aria-readonly="true" title="Guest">Guest</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='9']"
                                                        value="9">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-23.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan
                                                        Wilson</a>

                                                    <div class="fw-semibold text-muted">dam@consilting.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-34-73nl" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected=""
                                                        data-select2-id="select2-data-36-1bjr">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-35-jcey"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-1hd4-container"
                                                            aria-controls="select2-1hd4-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-1hd4-container" role="textbox"
                                                                aria-readonly="true" title="Can Edit">Can
                                                                Edit</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='10']"
                                                        value="10">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        E </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
                                                        Bold</a>

                                                    <div class="fw-semibold text-muted">emma@intenso.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-37-hgsa" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected=""
                                                        data-select2-id="select2-data-39-di19">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-38-te9h"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-uz48-container"
                                                            aria-controls="select2-uz48-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-uz48-container" role="textbox"
                                                                aria-readonly="true" title="Owner">Owner</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='11']"
                                                        value="11">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-12.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana
                                                        Crown</a>

                                                    <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-40-xe9j" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1" selected=""
                                                        data-select2-id="select2-data-42-v8e2">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-41-ej6k"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-ycf1-container"
                                                            aria-controls="select2-ycf1-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-ycf1-container" role="textbox"
                                                                aria-readonly="true" title="Guest">Guest</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='12']"
                                                        value="12">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-semibold">
                                                        A </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert
                                                        Doe</a>

                                                    <div class="fw-semibold text-muted">robert@benko.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-43-v5rq" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected=""
                                                        data-select2-id="select2-data-45-m67d">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-44-e3ah"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-d5cb-container"
                                                            aria-controls="select2-d5cb-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-d5cb-container" role="textbox"
                                                                aria-readonly="true" title="Can Edit">Can
                                                                Edit</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='13']"
                                                        value="13">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-13.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John
                                                        Miller</a>

                                                    <div class="fw-semibold text-muted">miller@mapple.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-46-s2fn" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected=""
                                                        data-select2-id="select2-data-48-qb3s">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-47-3b2y"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-rvbc-container"
                                                            aria-controls="select2-rvbc-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-rvbc-container" role="textbox"
                                                                aria-readonly="true" title="Can Edit">Can
                                                                Edit</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='14']"
                                                        value="14">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-success text-success fw-semibold">
                                                        L </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy
                                                        Kunic</a>

                                                    <div class="fw-semibold text-muted">lucy.m@fentech.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-49-xr8d" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected=""
                                                        data-select2-id="select2-data-51-llz1">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-50-bp0y"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-hd2g-container"
                                                            aria-controls="select2-hd2g-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-hd2g-container" role="textbox"
                                                                aria-readonly="true" title="Owner">Owner</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='15']"
                                                        value="15">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-21.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan
                                                        Wilder</a>

                                                    <div class="fw-semibold text-muted">ethan@loop.com.au</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-52-e0bq" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1" selected=""
                                                        data-select2-id="select2-data-54-hq1q">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-53-b7u9"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-ran5-container"
                                                            aria-controls="select2-ran5-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-ran5-container" role="textbox"
                                                                aria-readonly="true" title="Guest">Guest</span><span
                                                                class="select2-selection__arrow" role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->

                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->

                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='16']"
                                                        value="16">
                                                </label>
                                                <!--end::Checkbox-->

                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{asset('media/avatars/300-6.jpg')}}">
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma
                                                        Smith</a>

                                                    <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->

                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select
                                                    class="form-select form-select-solid form-select-sm select2-hidden-accessible"
                                                    data-control="select2" data-hide-search="true"
                                                    data-select2-id="select2-data-55-uxrv" tabindex="-1"
                                                    aria-hidden="true" data-kt-initialized="1">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected=""
                                                        data-select2-id="select2-data-57-5w2a">Can Edit</option>
                                                </select><span
                                                    class="select2 select2-container select2-container--bootstrap5"
                                                    dir="ltr" data-select2-id="select2-data-56-948y"
                                                    style="width: 100%;"><span class="selection"><span
                                                            class="select2-selection select2-selection--single form-select form-select-solid form-select-sm"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-rxqb-container"
                                                            aria-controls="select2-rxqb-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-rxqb-container" role="textbox"
                                                                aria-readonly="true" title="Can Edit">Can
                                                                Edit</span><span class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span><span
                                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->


                                    </div>
                                    <!--end::Users-->

                                    <!--begin::Actions-->
                                    <div class="d-flex flex-center mt-15">
                                        <button type="reset" id="kt_modal_users_search_reset"
                                            data-bs-dismiss="modal" class="btn btn-active-light me-3">
                                            Cancel
                                        </button>

                                        <button type="submit" id="kt_modal_users_search_submit"
                                            class="btn btn-primary">
                                            Add Selected Users
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Results-->
                                <!--begin::Empty-->
                                <div data-kt-search-element="empty" class="text-center d-none">
                                    <!--begin::Message-->
                                    <div class="fw-semibold py-10">
                                        <div class="text-gray-600 fs-3 mb-2">No users found</div>

                                        <div class="text-muted fs-6">Try to search by username, full name or email...
                                        </div>
                                    </div>
                                    <!--end::Message-->

                                    <!--begin::Illustration-->
                                    <div class="text-center px-5">
                                        <img src="{{asset('media/illustrations/dozzy-1/1.png')}}"
                                            alt="" class="w-100 h-200px h-sm-325px">
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Empty-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Users Search--><!--end::Modals-->
    </div>
@endsection
