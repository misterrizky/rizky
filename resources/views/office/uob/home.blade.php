@extends('office.layouts.main',["title"=>"Client"])
@section('content')
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
            <a href="{{route('client_input')}}" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
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
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tabungan</th>
                            <th scope="col">Persentase</th>
                            <th scope="col">Total Bunga</th>
                            <th scope="col">Total Tabungan</th>
                            <th scope="col">Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        for ($i=1; $i < 85; $i++) {
                            $bunga = 0.04;
                            $saldo = 2000000*$i;
                            $total_bunga = $saldo*$bunga;
                            $saldo_akhir = $saldo+($saldo*$bunga*$i);
                            $color = array(
                                'active',
                                'primary',
                                'success',
                                'warning',
                                'danger',
                                'info',
                                'light',
                            );
                        ?>
                        <tr class="table-{{ $color[rand ( 0 , count($color) -1)] }}">
                            <th scope="row">Rp. {{number_format($saldo)}}</th>
                            <td>{{$bunga}} %</td>
                            <td>Rp. {{number_format($total_bunga)}}</td>
                            <td>Rp. {{number_format($saldo_akhir)}}</td>
                            <td>{{$i}}</td>
                        </tr>
                        <?
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Pagination-->
        {{-- {{ $portfolio->links() }} --}}
        {{--  --}}
        <!--end::Pagination-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection