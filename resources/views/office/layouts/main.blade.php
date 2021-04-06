<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	@include('office.layouts.head')
	<!--end::Head-->
	<!--begin::Body-->
	@auth
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		@include('office.layouts.header_mobile')
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				@include('office.layouts.aside')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					@include('office.layouts.header')
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						@yield('content')
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					@include('office.layouts.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::User Panel-->
		@include('office.layouts.profile')
		<!-- end::User Panel-->
		<!--begin::Quick Cart-->
		
		<!--end::Quick Cart-->
		<!--begin::Quick Panel-->
		
		<!--end::Quick Panel-->
		<!--begin::Chat Panel-->
		
		<!--end::Chat Panel-->
		<!--begin::Scrolltop-->
		@include('office.layouts.scroll')
		<!--end::Scrolltop-->
		<!--begin::Sticky Toolbar-->
		
		<!--end::Sticky Toolbar-->
		<!--begin::Demo Panel-->
		
		<!--end::Demo Panel-->
	@endauth
	@guest
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		@yield('content')
		<!--end::Main-->
	@endguest
		@include('office.layouts.script')
		@yield('custom_js')
		@include('office.layouts.modal')
	</body>
	<!--end::Body-->
</html>