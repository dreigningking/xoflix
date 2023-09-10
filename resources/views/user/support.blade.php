@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                <!--begin::Messenger-->
                <div class="card" id="kt_chat_messenger">
                    <!--begin::Card header-->
                    <div class="card-header" id="kt_chat_messenger_header">
                        <!--begin::Title-->
                        <div class="card-title">
                            <!--begin::User-->
                            <div class="d-flex justify-content-center flex-column me-3">
                                <a href="#"
                                    class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Admin</a>

                                <!--begin::Info-->
                                {{-- <div class="mb-0 lh-1">
                                    <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                    <span class="fs-7 fw-semibold text-muted">Active</span>
                                </div> --}}
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Title-->

                        
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body" id="kt_chat_messenger_body">
                        <!--begin::Messages-->
                        <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" id="messages" data-kt-element="messages"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                            data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body"
                            data-kt-scroll-offset="5px" style="max-height: 131px;">



                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10 ">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-25.jpg')}}"></div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Admin</a>
                                            <span class="text-muted fs-7 mb-1">2 mins</span>
                                        </div>
                                        <!--end::Details-->

                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                        data-kt-element="message-text">
                                        How likely are you to recommend our company to your friends and family ? </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->

                            <!--begin::Message(out)-->
                            <div class="d-flex justify-content-end mb-10 ">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">5 mins</span>
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-1.jpg')}}"></div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                        data-kt-element="message-text">
                                        Hey there, we’re just writing to let you know that you’ve been subscribed to a
                                        repository on GitHub. </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(out)-->

                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10 ">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-25.jpg')}}"></div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Admin</a>
                                            <span class="text-muted fs-7 mb-1">1 Hour</span>
                                        </div>
                                        <!--end::Details-->

                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                        data-kt-element="message-text">
                                        Ok, Understood! </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->

                            <!--begin::Message(out)-->
                            <div class="d-flex justify-content-end mb-10 ">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">2 Hours</span>
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-1.jpg')}}"></div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                        data-kt-element="message-text">
                                        You’ll receive notifications for all issues, pull requests! </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(out)-->

                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10 ">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-25.jpg')}}"></div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Admin</a>
                                            <span class="text-muted fs-7 mb-1">3 Hours</span>
                                        </div>
                                        <!--end::Details-->

                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                        data-kt-element="message-text">
                                        You can unwatch this repository immediately by clicking here: <a
                                            href="https://keenthemes.com">Keenthemes.com</a> </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->

                            <!--begin::Message(out)-->
                            <div class="d-flex justify-content-end mb-10 ">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">4 Hours</span>
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-1.jpg')}}"></div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                        data-kt-element="message-text">
                                        Most purchased Business courses during this sale! </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(out)-->

                            <!--begin::Message(in)-->
                            <div class="d-flex justify-content-start mb-10 ">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-25.jpg')}}"></div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Admin</a>
                                            <span class="text-muted fs-7 mb-1">5 Hours</span>
                                        </div>
                                        <!--end::Details-->

                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                        data-kt-element="message-text">
                                        Company BBQ to celebrate the last quater achievements and goals. Food and drinks
                                        provided </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(in)-->

                            <!--begin::Message(template for out)-->
                            <div class="d-flex justify-content-end mb-10 " data-kt-element="template-out">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">Just now</span>
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-1.jpg')}}"></div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                        data-kt-element="message-text">
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(template for out)-->

                            <!--begin::Message(template for in)-->
                            <div class="d-flex justify-content-start mb-10 " data-kt-element="template-in">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                                src="{{asset('media/avatars/300-25.jpg')}}"></div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Admin</a>
                                            <span class="text-muted fs-7 mb-1">Just now</span>
                                        </div>
                                        <!--end::Details-->

                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                        data-kt-element="message-text">
                                        Right before vacation season we have the next Big Deal for you. </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Message(template for in)-->
                        </div>
                        <!--end::Messages-->
                    </div>
                    <!--end::Card body-->

                    <!--begin::Card footer-->
                    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                        <form action="">
                            <textarea class="form-control form-control-flush mb-3" rows="1" id="message" placeholder="Type a message" autofocus></textarea>
                            <!--end::Input-->

                            <!--begin:Toolbar-->
                            <div class="d-flex flex-stack">
                                <!--begin::Actions-->
                                {{-- <div class="d-flex align-items-center me-2">
                                    <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                        data-bs-toggle="tooltip" aria-label="Coming soon"
                                        data-bs-original-title="Coming soon" data-kt-initialized="1">
                                        <i class="ki-duotone ki-paper-clip fs-3"></i> </button>
                                    <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                        data-bs-toggle="tooltip" aria-label="Coming soon"
                                        data-bs-original-title="Coming soon" data-kt-initialized="1">
                                        <i class="ki-duotone ki-exit-up fs-3"><span class="path1"></span><span
                                                class="path2"></span></i> </button>
                                </div> --}}
                                <!--end::Actions-->

                                <!--begin::Send-->
                                <button class="btn btn-primary" type="button" id="send">Send</button>
                                <!--end::Send-->
                            </div>
                        </form>
                        
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Messenger-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
        <!--begin::Modals-->

        
    </div>
@endsection
@push('scripts')
    <script>
        $('#messages').animate({
            scrollTop: $('#messages').get(0).scrollHeight
        }, 2000);

        $(document).on('click','#send',function(){
            let message = $('#message').val()
            if(message != ''){
                let format = `<div class="d-flex justify-content-end mb-10 chat">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span class="text-muted fs-7 mb-1">4 Hours</span>
                                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Avatar-->
                                        <div class="symbol  symbol-35px symbol-circle "><img alt="Pic" src="http://localhost/reigntech/xoflix/public/media/avatars/300-1.jpg"></div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end" data-kt-element="message-text">`+
                                        message + `</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>`
                $('#messages').append(format)
                $('#messages').animate({
                    scrollTop: $('#messages').get(0).scrollHeight
                }, 2000);
            }
        })
    </script>
@endpush
