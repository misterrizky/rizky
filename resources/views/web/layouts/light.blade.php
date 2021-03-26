<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Page Loader, stretched (body)============================================= -->
<body class="stretched" data-loader-html="<div><img src='demos/photographer/images/icons/loader.svg' alt='Loader'></div>">
	<!-- Document Wrapper ============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Header ============================================= -->
		<!-- #header end -->


		<!-- Slider ============================================= -->
		<!-- #Slider End -->

		<!-- Content ============================================= -->
        @yield('content')
		<!-- #content end -->

		<!-- Footer ============================================= -->
		<!-- #footer end -->

	</div>
    <!-- #wrapper end -->
	<!-- Go To Top ============================================= -->
	<div id="gotoTop" class="icon-angle-up bg-color"></div>
	<!-- Dark Mode Switch ============================================= -->
	<a href="demo-photographer-dark.html" class="dark-mode" data-animate="fadeInRight">
		<span>Dark Mode</span><i class="icon-line-toggle shadow"></i>
	</a>
	<!-- JavaScripts ============================================= -->
	
</body>
</html>