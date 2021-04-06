<script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('keenthemes/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('keenthemes/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('keenthemes/js/pages/widgets.js')}}"></script>
<!--end::Page Scripts-->
<script type="text/javascript">
    $("body").on("contextmenu", "img", function(e) {
        return false;
    });
    $('img').attr('draggable', false);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/crud.js') }}"></script>
@auth
<script src="{{ asset('js/plugins.js') }}"></script>
@endauth
@guest
<script src="{{ asset('js/auth.js') }}"></script>
@endguest
<script>
    function main_content(cont) {
		$('#content_list').hide();
		$('#content_input').hide();
		//
		$('#' + cont).show();
	}
    function load_content_input(url) {
        show_progress('input');
        $.get(url, {}, function(result) {
            $('#content_input').html(result);
            main_content('content_input');
            hide_progress();
        }, "html");
    }
</script>