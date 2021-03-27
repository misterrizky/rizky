@extends('web.layouts.main')
@section('content')
<section id="content">
    <div class="content-wrap pt-0">
        <!-- Flip Card Sections ============================================= -->
        @if (request()->is('dark'))
        <div class="section dark">
            <div class="container clearfix">
        @else
        <div class="section mt-0">
            <div class="container">
        @endif
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-4 parallax" data-bottom-top="margin-top:-50px" data-top-bottom="margin-top:50px">
                        <small class="text-muted text-uppercase font-weight-light ls4 mb-1 d-block">
                            Experience
                        </small>
                        <h2 class="font-weight-bold ls0 mb-4" style="font-size: 38px;">
                            I have been developer for the last 6 years.
                        </h2>
                        <p class="text-muted" style="font-size: 16px;">
                            I am a Freelancer, Based in Indonesia. Successful Developer with more than 6 years of professional experience & with lots of Satisfied Customers.
                        </p>
                    </div>

                    <div class="col-lg-7">
                        <div class="row">
                            @foreach ($projects as $project)
                                <div class="col-sm-6">
                                    <!-- Flip Card ============================================= -->
                                    @if (request()->is('dark'))
                                    <div class="flip-card dark">
                                        <div class="flip-card-front no-after" style="background-color: #050505">
                                            <div class="flip-card-inner">
                                                <div class="feature-box media-box fbox-sm">
                                                    <div class="fbox-icon position-relative mb-4">
                                                        <a href="#">
                                                            <img src="{{ URL::asset('storage/'.$project->cphoto)}}" class="rounded-0 bg-transparent text-left" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="fbox-content">
                                                        <h3 class="font-weight-normal nott text-white">{{$project->cname}}</h3>
                                                        {{-- <p class="text-muted font-weight-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum.</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-card-back" style="background-image: url('{{ URL::asset('storage/'.$project->photo)}}')">
                                            <div class="flip-card-inner mt-3">
                                                <h4 class="mb-4 text-white">
                                                    {{ Str::limit($project->description, $limit = 150, $end = '...') }}
                                                </h4>
                                                {{-- <a href="#" class="button button-change overflow-hidden rounded nott font-weight-light m-0">
                                                    <span>View Photos</span>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="flip-card">
                                        <div class="flip-card-front no-after" style="background-color: #F9F9F9">
                                            <div class="flip-card-inner">
                                                <div class="feature-box media-box fbox-sm">
                                                    <div class="fbox-icon position-relative mb-4">
                                                        <a href="#">
                                                            <img src="{{ URL::asset('storage/'.$project->cphoto)}}" class="rounded-0 bg-transparent text-left" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="fbox-content">
                                                        <h3 class="font-weight-normal nott">{{$project->cname}}</h3>
                                                        {{-- <p class="text-muted font-weight-medium">Our best minds to eliminate workflow trouble spots, deploy new technologies, and consolidate application portfolios.</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-card-back dark" style="background-image: url('{{ URL::asset('storage/'.$project->photo)}}')">
                                            <div class="flip-card-inner mt-3">
                                                <h4 class="mb-4">{{ Str::limit($project->description, $limit = 150, $end = '...') }}</h4>
                                                {{-- <a href="#" class="button button-change overflow-hidden rounded nott font-weight-light m-0">
                                                    <span>View Photos</span>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 offset-sm-1">
                        <h2 class="font-weight-bold ls0 mb-3" style="font-size: 38px;">More Coming Soon..</h2>
                        <p class="text-muted" style="font-size: 16px;">
                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Photographs ============================================= -->
        <div class="section bg-transparent" style="display:none;">
            <div class="container">
                <div class="col-lg-6 offset-lg-1 mb-5">
                    <small class="text-muted text-uppercase font-weight-light ls3 d-block">
                        Some of Featured
                    </small>
                    <h2 class="font-weight-bold ls0 mb-3" style="font-size: 46px;">
                        See what I Did.
                    </h2>
                    <p class="text-muted" style="font-size: 16px;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur blanditiis saepe dolore tempora nihil praesentium dolorum unde, earum, nostrum odit?
                    </p>
                </div>
                <div class="row grid-container gutter-30" style="overflow: visible;">
                    <!-- Photographs ============================================= -->
                    <div class="col-lg-4 col-sm-6 rounded img-hover-wrap">
                        <div class="img-hover-card">
                            <a href="{{asset('semicolon/demos/photographer/images/album/1.jpg')}}" data-lightbox="image"><img src="{{asset('semicolon/demos/photographer/images/album/1.jpg')}}" alt="Image"></a>
                            <div class="img-hover-detail">
                                <small class="text-light ls1 font-weight-light">Travel</small>
                                <h3 class="img-hover-title"><a href="#">Railway Station</a></h3>
                                <div class="img-link"><a href="#"><i class="icon-line-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 rounded img-hover-wrap">
                        <div class="img-hover-card">
                            <a href="{{asset('semicolon/demos/photographer/images/album/2.jpg')}}" data-lightbox="image"><img src="{{asset('semicolon/demos/photographer/images/album/2.jpg')}}" alt="Image"></a>
                            <div class="img-hover-detail">
                                <small class="text-light ls1 font-weight-light">Travel</small>
                                <h3 class="img-hover-title"><a href="#">Mt. Batur</a></h3>
                                <div class="img-link"><a href="#"><i class="icon-line-arrow-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Titles ============================================= -->
                <div class="row mt-5">
                    <div class="col-sm-6 offset-sm-1">
                        <h2 class="font-weight-bold ls0 mb-3" style="font-size: 38px;">More Coming Soon..</h2>
                        <p class="text-muted" style="font-size: 16px;">
                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Section ============================================= -->
        @if (request()->is('dark'))
        <div class="section"  style="background: #050505 url('demos/photographer/images/dots-white.png') 130% 0% no-repeat; background-size: 60%">
        @else
        <div class="section" style="background: #FFF url('demos/photographer/images/dots.png') 170% 0% no-repeat; background-size: 60% auto">
        @endif
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Counter ============================================= -->
                    <div class="col-lg-3 col-md-6 mt-4">
                        <div class="counter counter-large font-weight-light">
                            <span data-from="1" data-to="6" data-refresh-interval="100" data-speed="2000"></span>+
                        </div>
                        <h5>years of Experience</h5>
                        {{-- <p class="text-muted mb-0 pb-5 border-bottom">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur blanditiis saepe dolore tempora.
                        </p> --}}
                    </div>
                    <!-- Counter ============================================= -->
                    <div class="col-lg-3 col-md-6 mt-4">
                        <div class="counter counter-large font-weight-light">
                            <span data-from="0" data-to="{{$total_client}}" data-refresh-interval="50" data-speed="2000" data-comma="true"></span>+
                        </div>
                        <h5>Total Client</h5>
                    </div>
                    <!-- Counter ============================================= -->
                    <div class="col-lg-3 col-md-6 mt-4">
                        <div class="counter counter-large font-weight-light">
                            <span data-from="0" data-to="{{$total_project}}" data-refresh-interval="50" data-speed="2000" data-comma="true"></span>+
                        </div>
                        <h5>Total Project</h5>
                    </div>
                    <!-- Counter ============================================= -->
                    <div class="col-lg-3 col-md-6 mt-4">
                        <div class="counter counter-large font-weight-light">
                            <span data-from="0" data-to="{{$persentase}}" data-refresh-interval="50" data-speed="2000" data-comma="true"></span>%
                        </div>
                        <h5>Projects Done</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Clients ============================================= -->
        @if (request()->is('dark'))
        <div class="section dark bg-transparent">
        @else
        <div class="section bg-transparent">
        @endif
            <div class="container center">
                <small class="text-muted text-uppercase font-weight-light ls3">Trusted Partners</small>
                <h2 class="font-weight-bold ls0 mb-5" style="font-size: 46px;">Happy Clients</h2>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            @foreach ($clients as $client)
                                <!-- Client ============================================= -->
                                <div class="col-md-3 col-6">
                                    <a href="javascript:void(0);">
                                        <img class="p-4" src="{{ URL::asset('storage/'.$client->photo)}}" alt="{{$client->name}}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <a href="#" class="button button-change button-large button-rounded nott font-weight-light mt-4 ml-0">
                    <span>View more Clients <i class="icon-line-arrow-right"></i></span>
                </a> --}}
            </div>
        </div>
        <!-- Service Section ============================================= -->
        @if (request()->is('dark'))
        <div class="section bg-transparant">
            <div class="container">
                <div class="col-sm-6 dark mb-5">
        @else
        <div class="section">
            <div class="container">
                <div class="col-sm-6 mb-5">
        @endif
                    <small class="text-muted text-uppercase font-weight-light ls3 d-block">My Services</small>
                    <h2 class="font-weight-bold ls0 mb-3" style="font-size: 46px;">The ways I can help you.</h2>
                    {{-- <p class="text-muted" style="font-size: 16px;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur blanditiis saepe dolore tempora nihil praesentium dolorum unde, earum, nostrum odit?
                    </p> --}}
                </div>

                <div class="row clearfix">
                    <!-- Card 1 ============================================= -->
                    <div class="col-lg-4 col-md-6 mt-3">
                        @if (request()->is('dark'))
                        <div class="card dark d-flex align-items-end flex-column p-3" style="height: 300px; background-color: #222; border: 1px solid #222">
                        @else
                        <div class="card shadow-sm d-flex align-items-end flex-column p-3" style="height: 300px; background-color: #FFF; border: 1px solid #FFF">
                        @endif
                            <div></div>
                            <div class="mt-auto">
                                <div class="card-body">
                                    <img src="{{ URL::asset('storage/services/experience.svg')}}" width="40" alt="IT Consulting" class="mb-4">
                                    <h4 class="card-title font-weight-normal">
                                        IT Consulting
                                    </h4>
                                    <p class="card-text mb-5 mt-2 font-weight-light">
                                        Our best minds to eliminate workflow trouble spots, deploy new technologies, and consolidate application portfolios.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 ============================================= -->
                    <div class="col-lg-4 col-md-6 mt-3">
                        @if (request()->is('dark'))
                        <div class="card dark d-flex align-items-end flex-column p-3" style="height: 300px; background-color: #222; border: 1px solid #222">
                        @else
                        <div class="card shadow-sm d-flex align-items-end flex-column p-3" style="height: 300px; background-color: #FFF; border: 1px solid #FFF">
                        @endif
                            <div></div>
                            <div class="mt-auto">
                                <div class="card-body">
                                    <img src="{{ URL::asset('storage/services/sketch.svg')}}" width="40" alt="Sketch" class="mb-4">
                                    <img src="{{ URL::asset('storage/services/xd.png')}}" width="40" alt="XD" class="mb-4">
                                    <h4 class="card-title font-weight-normal">
                                        Mobile App & Website Design
                                    </h4>
                                    <p class="card-text mb-0 mt-2 font-weight-light">
                                        Build the products you need on time with an experienced team using a clear and effective design process.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 ============================================= -->
                    <div class="col-lg-4 col-md-6 mt-3">
                        @if (request()->is('dark'))
                        <div class="card dark d-flex align-items-end flex-column p-3" style="height: 300px; background-color: #222; border: 1px solid #222">
                        @else
                        <div class="card shadow-sm d-flex align-items-end flex-column p-3" style="height: 300px; background-color: #FFF; border: 1px solid #FFF">
                        @endif
                            <div></div>
                            <div class="mt-auto">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <span><img src="{{ URL::asset('storage/services/flutter.svg')}}" width="40" alt="Flutter"></span>
                                        <span><img src="{{ URL::asset('storage/services/php.svg')}}" class="ml-3" width="50" alt="PHP"></span>
                                        <span><img src="{{ URL::asset('storage/services/ci.png')}}" class="ml-3" width="40" alt="CI"></span>
                                        <span><img src="{{ URL::asset('storage/services/laravel.png')}}" class="ml-3" width="40" alt="Laravel"></span>
                                        {{-- <span class="px-3 h6 m-0 font-weight-light">&amp;</span> --}}
                                        {{-- <span><img src="demos/photographer/images/icons/psd.svg" width="35" alt="Image"></span> --}}
                                    </div>
                                    <h4 class="card-title font-weight-normal">
                                        Mobile App & Website Development
                                    </h4>
                                    <p class="card-text mb-0 mt-2 font-weight-light">
                                        Develop strong custom applications from the ground up, based on your unique needs and specific requirements.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section ============================================= -->
        <div class="section mb-0 bg-transparent">
            <div class="container">
                <div class="row justify-content-between mt-5">
                    <!-- Heading Title ============================================= -->
                    <div class="col-md-6">
                        <small class="text-muted text-uppercase font-weight-light ls3 d-block">Let's Say Hi!</small>
                        <h2 class="font-weight-bold ls0 mb-3" style="font-size: 64px; line-height: 1.2">Contact Me Here.</h2>
                        {{-- <p class="text-muted" style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur blanditiis saepe dolore tempora nihil praesentium dolorum unde, earum, nostrum odit?</p> --}}
                        <div class="d-flex align-items-center mt-4">
                            <a href="mailto:ask@rizky-ramadhan.com" class="button button-change button-small button-rounded nott font-weight-light m-0 overflow-hidden">
                                <span><i class="icon-line2-envelope"></i> Contact Me</span>
                            </a>
                            <a href="https://wa.me/6287709020299" target="_blank" class="my-0 mr-0 ml-3 social-icon inline-block si-small si-borderless si-whatsapp">
                                <i class="icon-whatsapp"></i>
                                <i class="icon-whatsapp"></i>
                            </a>
                            <a href="https://facebook.com/OfficialRizkyRamadhan" target="_blank" class="my-0 mr-0 ml-2 social-icon inline-block si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="https://instagram.com/mister.rizky" target="_blank" class="my-0 mr-0 ml-2 social-icon inline-block si-small si-borderless si-instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="https://linkedin.com/in/misterrizky" target="_blank" class="my-0 mr-0 ml-2 social-icon inline-block si-small si-borderless si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                            {{-- <a href="https://instagram.com/semicolonweb" target="_blank" class="my-0 mr-0 ml-2 social-icon inline-block si-small si-borderless si-github">
                                <i class="icon-github"></i>
                                <i class="icon-github"></i>
                            </a>
                            <a href="https://instagram.com/semicolonweb" target="_blank" class="my-0 mr-0 ml-2 social-icon inline-block si-small si-borderless si-bitbucket">
                                <i class="icon-bitbucket"></i>
                                <i class="icon-bitbucket"></i>
                            </a> --}}
                        </div>
                    </div>
                    <!-- Testimonials ============================================= -->
                    <div class="col-md-5 mt-5 mt-md-0">
                        <h5 class="pl-4 font-weight-normal">What Clients Says:</h5>
                        <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget pl-4" data-margin="0" data-nav="false" data-pagi="false" data-items="1" data-autoplay="6000" data-loop="true" data-animate-in="fadeIn">
                            <div class="oc-item">
                                <div class="testimonial bg-transparent shadow-none border-0 p-3">
                                    <div class="testi-content">
                                        <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum repellendus!</p>
                                        <div class="testi-meta ls1 mt-3 mb-0"> Fig Nelson</div>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-item">
                                <div class="testimonial bg-transparent shadow-none border-0 p-3">
                                    <div class="testi-content">
                                        <p>Completely e-enable premier infomediaries and long-term high-impact process improvements. Completely provide access to B2C.</p>
                                        <div class="testi-meta ls1 mt-3 mb-0"> Bailey Wonger</div>
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
@endsection