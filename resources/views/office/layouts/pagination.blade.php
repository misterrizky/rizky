@if ($paginator->hasPages())
<div class="card card-custom">
    <div class="card-body py-7">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">
                @if ($paginator->onFirstPage())
                @else
                <a halaman="{{ $paginator->previousPageUrl() }}" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 paginasi">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>
                @endif
                
                @foreach ($elements as $element)
                    @if (is_string($element))
                    <a href="javascript:void(0);" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 disabled">...</a>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="javascript:void(0);" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1 paginasi">{{ $page }}</a>
                            @else
                                <a halaman="{{ $url }}" href="javascript:void(0);" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 paginasi">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a> --}}
                @if ($paginator->hasMorePages())
                <a halaman="{{ $paginator->nextPageUrl() }}" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 paginasi">
                    <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                </a>
                @else
                @endif
            </div>
            <div class="d-flex align-items-center">
                {{-- <select id="limit" name="limit" onchange="changeLimit();" class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> --}}
                <span class="text-muted">Displaying {{$paginator->firstItem()}} to {{$paginator->lastItem()}} of {{$paginator->total()}} records</span>
            </div>
        </div>
    </div>
</div>
@endif
@section('custom_js')
    <script type="text/javascript">
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    load_list(page);
                }
            }
        });
        $(document).ready(function()
        {
            $(document).on('click', '.paginasi',function(event)
            {
                event.preventDefault();

                $('a').removeClass('active');
                $(this).parent('a').addClass('active');
                // var myurl = $(this).attr('href');
                var page= $(this).attr('halaman').split('page=')[1];
                load_list(page);
            });

        });
        function load_list(page){
            show_progress('content');
            $.get('?page=' + page, $('#content_filter').serialize(), function(result) {
                $('#list_result').html(result);
                hide_progress();
            }, "html");
            // $.ajax(
            // {
            //     url: '?page=' + page,
            //     type: "get",
            //     datatype: "html"
            // }).done(function(data){
            //     $("#list_result").empty().html(data);
            // }).fail(function(jqXHR, ajaxOptions, thrownError){
            //     alert('No response from server');
            // });
        }
        function changeLimit(){
            let limit = $("#limit").val();
            let url = "{{ (request()->segment(1)) }}?limit="+limit;
            location.href = url;
        }
    </script>
@endsection