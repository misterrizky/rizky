@extends('office.layouts.main', ['title' => '| Reset Account'])
@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-10">
                <!--begin::Aside header-->
                <a href="#" class="text-center mb-10">
                    <img src="{{ asset('images/logo.png') }}" class="max-h-70px" alt="" />
                </a>
                <!--end::Aside header-->
                <!--begin::Aside title-->
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">
                    Discover Amazing
                    <br />
                    <a href="https://rizky-ramadhan.com/" target="_blank" style="color:#986923">rizky-ramadhan.com</a>
                    <br />
                    with great build tools
                </h3>
                <!--end::Aside title-->
            </div>
            <!--end::Aside Top-->
            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{ asset('keenthemes/media/svg/illustrations/login-visual-1.svg)')}}"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Reset-->
                <div class="login-form login-signin">
                    <!--begin::Form-->
                    <form class="form" novalidate="novalidate" id="form_reset_password">
                        <input type="hidden" id="email" name="email" value="{{$email}}">
                        <!--begin::Title-->
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">
                                Reset your password
                            </h3>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label for="password" class="font-size-h6 font-weight-bolder text-dark">
                                New password
                            </label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" id="password" name="password" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label for="rpassword" class="font-size-h6 font-weight-bolder text-dark pt-5">
                                    Confirm Password
                                </label>
                            </div>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" id="rpassword" name="rpassword" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="button" id="reset_password" onclick="handle_save('reset_password','{{route('reset_password')}}','#form_reset_password');" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Reset</button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Reset-->
            </div>
            <!--end::Content body-->
            <!--begin::Content footer-->
            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                    <span class="mr-1">2021©</span>
                    <a href="https://rizky-ramadhan.com/" target="_blank" class="text-dark-75 text-hover-primary">Rizky Ramadhan</a>
                </div>
                <a href="#" class="text-primary font-weight-bolder font-size-lg">Terms</a>
                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Plans</a>
                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Contact Us</a>
            </div>
            <!--end::Content footer-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
@endsection
@section('custom_js')
    <script>
        window.history.pushState("object or string", "Reset Your Password", "https://localhost/rizky/reset");
        function handle_save(param,uri,form){
            $("#" + param).submit(function () {
                return false;
            });
            let data = $(form).serialize();
            $('#' + param).prop("disabled", true);
            $('#' + param).html("Please wait");
            $.ajax({
                type: "POST",
                url: uri,
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.alert == "success") {
                        success_message(response.message);
                        $(form)[0].reset();
                        $('#' + param).prop("disabled", false);
                        setTimeout(function () {
                            location.href = '{{route('auth')}}';
                        }, 2000);
                    } else {
                        error_message(response.message);
                        setTimeout(function () {
                            $('#' + param).prop("disabled", false);
                            $('#' + param).html("Reset");
                        }, 2000);
                    }
                },
            });
        }
    </script>
@endsection