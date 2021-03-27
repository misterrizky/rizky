<script src="{{asset('semicolon/js/jquery.js')}}"></script>
<script src="{{asset('semicolon/js/plugins.min.js')}}"></script>

<!-- Photograph Hover Plugin
============================================= -->
<script src="{{asset('semicolon/demos/writer/js/hover3d.js')}}" ></script>

<!-- Menu Open Plugin
============================================= -->
<script src="{{asset('semicolon/demos/photographer/js/menu-easing.js')}}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{asset('semicolon/js/functions.js')}}"></script>

<script>

    // Hover Script
    jQuery(".img-hover-wrap").hover3d({
        selector: ".img-hover-card",
        shine: false,
    });

</script>