@extends('office.layouts.main',["title"=>"Client"])
@section('content')
<div id="content_list">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Client</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                {{-- <span class="text-muted font-weight-bold mr-4">#XRS-45670</span> --}}
                <a href="javascript:void(0);" onclick="load_content_input('{{route('client_input')}}');" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container" id="list_result">
            @include('office.client.list')
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<div id="content_input"></div>
@endsection
@section('custom_js')
    <script type="text/javascript">
        obj_onfocus('#name');
        obj_image('client_photo');
    </script>
@endsection