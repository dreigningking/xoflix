$(document).on('click',".add-reg", function () {
    $("#trial_wrapper").append(regcontent);
    for (var i = 0; i < pasteButton.length; i++) {
        pasteButton[i].addEventListener('click', async (e) => {
            let input = e.target.parentElement.querySelector("input")
            try {
                const text = await navigator.clipboard.readText()
                input.value = text;
            }catch (error) {
                console.log('Failed to read clipboard');
            }
        })
    }
    return false;
});  

<div class="card-body">

    <form id="kt_modal_new_card_form" method="POST" action="{{route('admin.subscription')}}" class="form fv-plugins-bootstrap5 fv-plugins-framework">@csrf

        <div class="row">
            <div class="col-md-6">
                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold form-label mb-2">Username</label>
                    <!--end::Label-->
                    <div class="input-group input-group-lg">
                        <input type="text" name="username" id="username" class="form-control form-control-solid" placeholder="Username" aria-label="Sizing example input" aria-describedby="paste_url"/>
                        <span class="input-group-text paste_button">Paste</span>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold form-label mb-2">Password</label>
                    <!--end::Label-->
                    <div class="input-group input-group-lg">
                        <input type="text" name="password" id="password" class="form-control form-control-solid" placeholder="Password" aria-label="Sizing example input" aria-describedby="Password"/>
                        <span class="input-group-text paste_button">Paste</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">URL</span>
            </label>

            <select name="link_id" class="form-control form-control-solid" data-control="select2" data-placeholder="Select URL">
                @foreach ($links as $link)
                    <option value="{{$link->id}}">{{$link->url}}</option>
                @endforeach
            </select>
            
        </div>
        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">Panel</span>
            </label>

            <select name="panel_id" class="form-control form-control-solid" data-control="select2" data-placeholder="Select Panel">
                @foreach ($panels as $panel)
                    <option value="{{$panel->id}}">{{$panel->name}}</option>
                @endforeach
            </select>
            
        </div>
        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">M3U Link</span>
            </label>
            <!--end::Label-->

            {{-- <input type="url" class="form-control form-control-solid" placeholder="https://" name="link" required> --}}

            <div class="input-group input-group-lg">
                <input type="url" name="m3u_link" id="m3u_link" class="form-control form-control-solid" aria-label="Sizing example input" aria-describedby="paste_url"/>
                <span class="input-group-text paste_button">Paste</span>
            </div>
            
        </div>

        

        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <label class="required fs-6 fw-semibold form-label mb-2">Expiration</label>
            <div class="input-group" id="kt_td_picker_basic" data-td-target-input="nearest" data-td-target-toggle="nearest">
                <input id="kt_td_picker_basic_input" type="text" name="end_at" class="form-control" data-td-target="#kt_td_picker_basic"/>
                <span class="input-group-text" data-td-target="#kt_td_picker_basic" data-td-toggle="datetimepicker">
                    <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
                </span>
            </div>
        </div>

        <div class="mb-10">
            <label class="form-label">User</label>
            <select name="subscription_id" class="form-select form-select-solid subscriber-remote w-100" style="width: 100%"  data-placeholder="Select an option" data-allow-clear="true">
                <option></option>
                
            </select>
        </div>
        
        <!--begin::Actions-->
        <div class="text-center pt-4">
            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">
                Discard
            </button>

            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                <span class="indicator-label">
                    Submit
                </span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
</div>