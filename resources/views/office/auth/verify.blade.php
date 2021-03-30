@extends('office.layouts.main',['title' => '| Verify Your Email Address'])
@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Account</h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">{{Auth::user()->email}}</span>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">Unverified</span>
            <!--end::Actions-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
            <div class="alert-icon">
                <span class="svg-icon svg-icon-primary svg-icon-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.98630124,11 4.48466491,11.0516454 4,11.1500272 L4,7 C4,5.8954305 4.8954305,5 6,5 L20,5 C21.1045695,5 22,5.8954305 22,7 L22,16 C22,17.1045695 21.1045695,18 20,18 L12.9835977,18 Z M19.1444251,6.83964668 L13,10.1481833 L6.85557487,6.83964668 C6.4908718,6.6432681 6.03602525,6.77972206 5.83964668,7.14442513 C5.6432681,7.5091282 5.77972206,7.96397475 6.14442513,8.16035332 L12.6444251,11.6603533 C12.8664074,11.7798822 13.1335926,11.7798822 13.3555749,11.6603533 L19.8555749,8.16035332 C20.2202779,7.96397475 20.3567319,7.5091282 20.1603533,7.14442513 C19.9639747,6.77972206 19.5091282,6.6432681 19.1444251,6.83964668 Z" fill="#000000"/>
                            <path d="M6.5,14 C7.05228475,14 7.5,14.4477153 7.5,15 L7.5,17 C7.5,17.5522847 7.05228475,18 6.5,18 C5.94771525,18 5.5,17.5522847 5.5,17 L5.5,15 C5.5,14.4477153 5.94771525,14 6.5,14 Z M6.5,21 C5.94771525,21 5.5,20.5522847 5.5,20 C5.5,19.4477153 5.94771525,19 6.5,19 C7.05228475,19 7.5,19.4477153 7.5,20 C7.5,20.5522847 7.05228475,21 6.5,21 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                </span>
            </div>
            <div class="alert-text">
                <h4 class="font-weight-bold">Hey {{Auth::user()->name}},</h4>
                <p class="font-weight-bold">
                    Wowwee! Thanks for registering an account with Rizky Ramadhan! You're the coolest person in all the land <code>(and I've met a lot of really cool people)</code>.
                </p>
                <p class="font-weight-bold">
                    Before we get started, we'll need to verify your email.
                </p>
                <p class="font-weight-bold">
                    We'll contact you as soon as posible.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection