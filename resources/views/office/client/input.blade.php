<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Portfolio</h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            @if ($client->id_client)
            <span class="text-muted font-weight-bold mr-4">Edit</span>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">{{$client->name}}</span>
            @else
            <span class="text-muted font-weight-bold mr-4">Add</span>
            @endif
            <!--end::Actions-->
        </div>
        <a href="javascript:void(0);" onclick="main_content('content_list');" class="btn btn-light-primary font-weight-bolder btn-sm float-right">Back</a>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <form class="form" id="form_client">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Name:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter client name" value="{{$client->name ?: ''}}" onfocus="this.value = this.value;" required/>
                            <span class="form-text text-muted">Please enter client name</span>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Photo</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline image-input-circle" id="client_photo">
                                    @if ($client->photo)
                                    <div class="image-input-wrapper" style="background-image: url({{ URL::asset('storage/'.$client->photo)}})"></div>
                                    @else
                                    <div class="image-input-wrapper" style="background-image: url({{asset('images/default.jpg')}})"></div>
                                    @endif
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" id="photo" name="photo" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="photo_remove" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Remove photo">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            @if ($client->id_client)
                            <button id="save_client" onclick="handle_upload(`save_client`,`#form_client`,`client/{{$client->slug}}/update`);" class="btn btn-primary mr-2">Save</button>
                            @else
                            <button id="save_client" onclick="handle_upload(`save_client`,`#form_client`,`{{route('client_store')}}`);" class="btn btn-primary mr-2">Save</button>
                            @endif
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                        {{-- <div class="col-lg-6 text-lg-right">
                        </div> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->