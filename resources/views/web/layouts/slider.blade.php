@if (request()->is('dark'))
<section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header" style="background: #050505 url('{{asset('semicolon/demos/photographer/images/dots-white.png')}}') 100% 0 no-repeat; background-size: 60%">
@else
<section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header" style="background: url('{{asset('semicolon/demos/photographer/images/dots-1.png')}}') 100% 0 no-repeat; background-size: 60% auto">
@endif
    <div class="slider-inner">
        <div class="vertical-middle">
            <div class="container parallax py-5" data-0="opacity: 1; overflow: visible; margin-top:0px" data-top-bottom="opacity: 0; overflow: visible; margin-top:100px">
                <div class="row align-items-center col-mb-50">
                    @if (request()->is('dark'))
                    <div class="col-md-6 dark">
                    @else
                    <div class="col-md-6">
                    @endif
                        <div class="py-5 py-md-0">
                            <small class="text-muted text-uppercase font-weight-light ls4 mb-1 d-block">
                                Freelancer Web Developer
                            </small>
                            @if (request()->is('dark'))
                            <h2 class="text-light">Rizky Ramadhan</h2>
                            @else
                            <h2 class="text-dark">Rizky Ramadhan</h2>
                            @endif
                            <h5 class="font-weight-light ls1" style="opacity: .7">
                                {{-- I am a Freelancer, Based in Indonesia. Successful Developer with more than 6 years of professional experience & with lots of Satisfied Customers. --}}
                            </h5>
                            <div class="d-flex align-items-center mt-5">
                                <a href="mailto:ask@rizky-ramadhan.com" class="button button-change button-rounded overflow-hidden nott button-large font-weight-normal mx-0 px-5">
                                    <span><i class="icon-line2-envelope font-weight-semibold"></i>
                                        Email Me Here
                                    </span>
                                </a>
                                <a href="https://wa.me/6287709020299" target="_blank" class="d-none d-sm-inline-block my-0 mr-0 ml-4 social-icon si-small si-borderless si-whatsapp">
                                    <i class="icon-whatsapp"></i>
                                    <i class="icon-whatsapp"></i>
                                </a>
                                <a href="https://facebook.com/OfficialRizkyRamadhan" target="_blank" class="d-none d-sm-inline-block my-0 mr-0 ml-3 social-icon si-small si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="https://linkedin.com/in/misterrizky" target="_blank" class="d-none d-sm-inline-block my-0 mr-0 ml-3 social-icon si-small si-borderless si-linkedin">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>
                                </a>
                                {{-- <a href="javascript:void(0);" class="d-none d-sm-inline-block my-0 mr-0 ml-3 social-icon si-small si-borderless si-github">
                                    <i class="icon-github"></i>
                                    <i class="icon-github"></i>
                                </a>
                                <a href="javascript:void(0);" class="d-none d-sm-inline-block my-0 mr-0 ml-3 social-icon si-small si-borderless si-bitbucket">
                                    <i class="icon-bitbucket"></i>
                                    <i class="icon-bitbucket"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 pl-md-5 pl-lg-0">
                        <div class="row align-items-stretch">
                            <div class="col-lg-6 col-md-12 rounded col-6 d-none d-sm-flex" style="background: url('{{asset('semicolon/demos/photographer/images/1.jpg')}}') center center no-repeat; background-size: cover;">
                            </div>
                            <div class="col-6 d-none d-lg-flex"></div>
                            <div class="col-6 d-none d-lg-flex"></div>
                            @if (request()->is('dark'))
                            <div class="col-lg-6 col-md-12 rounded col-6" style="background-color: #252525">
                            @else
                            <div class="col-lg-6 col-md-12 gradient-border shadow-sm col-sm-6 col-12 max-height" style="background-color: #FFF;">
                            @endif
                                <div class="feature-box flex-column px-3 py-4 fbox-sm">
                                    <div class="fbox-media">
                                        <img src="{{asset('semicolon/demos/photographer/images/icons/instagram.svg')}}" class="rounded-0 bg-transparent text-left" alt="Image" style="height: 48px;">
                                    </div>
                                    <div class="fbox-content">
                                        <div class="d-block" style="margin: 90px auto"></div>
                                        <p class="mb-0 font-weight-normal">View My Stories</p>
                                        <h3 class="font-weight-medium mt-1 mb-0 d-flex align-self-end">
                                            <a href="https://instagram.com/mister.rizky" target="_blank" class="text-dark">
                                                Instagram
                                                <i class="icon-line-arrow-right font-weight-semibold position-relative" style="top: 2px"></i>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>