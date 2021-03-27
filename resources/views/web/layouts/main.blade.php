<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@include('web.layouts.head')
<!-- Page Loader, stretched (body)============================================= -->
@if (request()->is('dark'))
<body class="stretched dark" data-loader-html="<div><img src='{{asset('semicolon/demos/photographer/images/icons/loader.svg')}}' alt='Loader'></div>">
@else
<body class="stretched" data-loader-html="<div><img src='{{asset('semicolon/demos/photographer/images/icons/loader.svg')}}' alt='Loader'></div>">
@endif
	<!-- Document Wrapper ============================================= -->
	<div id="wrapper" class="clearfix">
        <!-- Header ============================================= -->
        @include('web.layouts.header')
		<!-- #header end -->
		<!-- Slider ============================================= -->
        @include('web.layouts.slider')
		<!-- #Slider End -->
		<!-- Content ============================================= -->
        @yield('content')
		<!-- #content end -->
		<!-- Footer ============================================= -->
        @include('web.layouts.footer')
		<!-- #footer end -->
	</div>
    <!-- #wrapper end -->
	<!-- Go To Top ============================================= -->
	<div id="gotoTop" class="icon-angle-up bg-color"></div>
	<!-- Dark Mode Switch ============================================= -->
	@if (request()->is('dark'))
	<a href="{{route('home_light')}}" class="dark-mode" data-animate="fadeInRight">
		<span>Light Mode</span><i class="icon-line-toggle shadow"></i>
	</a>
	@else
	<a href="{{route('home_dark')}}" class="dark-mode" data-animate="fadeInRight">
        <span>Dark Mode</span><i class="icon-line-toggle shadow"></i>
	</a>
	@endif
	<!-- JavaScripts ============================================= -->
    @include('web.layouts.script')
</body>
</html>