<!--begin::Card-->
@foreach ($datas as $item)
<?php
$name = $item->name;
$arr = explode(' ', $name);
$singkatan = "";
foreach($arr as $kata)
{
    $singkatan .= substr($kata, 0, 1);
}
$name_singkat = substr($singkatan,-4);
$color = array(
    'info',
    'danger',
    'success',
    'warning',
);
?>
<div class="card card-custom gutter-b">
<div class="card-body">
    <!--begin::Top-->
    <div class="d-flex">
        <!--begin::Pic-->
        <div class="flex-shrink-0 mr-7">
            <div class="symbol symbol-50 symbol-lg-120 symbol-light-{{ $color[rand ( 0 , count($color) -1)] }}">
                <img alt="{{$name_singkat}}" src="{{ $item->takeImage }}" />
                {{-- <span class="font-size-h3 symbol-label font-weight-boldest"></span> --}}
            </div>
        </div>
        <!--end::Pic-->
        <!--begin: Info-->
        <div class="flex-grow-1">
            <!--begin::Title-->
            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                <!--begin::User-->
                <div class="mr-3">
                    <!--begin::Name-->
                    <a href="client/{{$item->id_client}}/edit" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                        {{$item->name}}
                        <i class="flaticon2-correct text-success icon-md ml-2"></i>
                    </a>
                    <!--end::Name-->
                </div>
                <!--begin::User-->
                <!--begin::Actions-->
                <div class="my-lg-0 my-1">
                    <a href="javascript:void(0);" onclick="load_content_input('client/{{$item->slug}}/edit')" class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">Update</a>
                    <a href="javascript:void(0);" onclick="handle_delete('{{$item->slug}}','client/{{$item->slug}}/delete','client');" class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase">Delete</a>
                    @if ($item->is_active == "N")
                    <a href="javascript:void(0);" onclick="handle_confirm('{{$item->slug}}','client/{{$item->slug}}/active','');" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase">Active</a>
                    @else
                    <a href="javascript:void(0);" onclick="handle_confirm('{{$item->slug}}','client/{{$item->slug}}/non-active');" class="btn btn-sm btn-light-warning font-weight-bolder text-uppercase">Non Active</a>
                    @endif
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Title-->
        </div>
        <!--end::Info-->
    </div>
    <!--end::Top-->
</div>
</div>
@endforeach
<!--end::Card-->
<!--begin::Pagination-->
{{$datas->links()}}
{{-- {{ $portfolio->links() }} --}}
{{--  --}}
<!--end::Pagination-->