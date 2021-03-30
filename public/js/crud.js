let spinner = 'spinner spinner-right spinner-white pr-15';
function handle_open_modal_add(modal){
    $(modal).modal('show');
}
function handle_open_modal(modal,content,id,uri){
    $.ajax({
        type: "POST",
        url: uri,
        data: {
            id: id
        },
        success: function (html) {
            $(content).html(html);
            $(modal).modal('show');
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}
function handle_save()
{
    $("#" + param).submit(function () {
        return false;
    });
    let data = $(form).serialize() + "&" + param + "=";
    $('#' + param).addClass(spinner);
    $('#' + param).prop("disabled", true);
    $('#' + param).html("Please wait");
    $.ajax({
        type: "POST",
        url: APP_URL + 'crud/create.php',
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_message(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                    $('#' + param).prop("disabled", false);
                    $('#' + param).html("Save");
                }, 2000);
            } else {
                error_message(response.message);
                setTimeout(function () {
                    $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                    $('#' + param).prop("disabled", false);
                    $('#' + param).html("Save");
                }, 2000);
            }
        },
    });
}
function handle_save_modal()
{
    $("#" + param).submit(function () {
        return false;
    });
    let data = $(form).serialize() + "&" + param + "=";
    $('#' + param).addClass(spinner);
    $('#' + param).prop("disabled", true);
    $('#' + param).html("Please wait");
    $.ajax({
        type: "POST",
        url: APP_URL + 'crud/create.php',
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_message(response.message);
                $(form)[0].reset();
                $(table).DataTable().ajax.reload();
                $(modal).modal('toggle');
                setTimeout(function () {
                    $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                    $('#' + param).prop("disabled", false);
                    $('#' + param).html("Save");
                }, 2000);
            } else {
                error_message(response.message);
                setTimeout(function () {
                    $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                    $('#' + param).prop("disabled", false);
                    $('#' + param).html("Save");
                }, 2000);
            }
        },
    });
}
function handle_upload(param,form,uri,redirect)
{
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append(param, "");
        $('#' + param).addClass(spinner);
        $('#' + param).prop("disabled", true);
        $('#' + param).html("Please wait");
        $.ajax({
            type: "POST",
            url: uri,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.alert=="success") {
                    success_message(response.message);
                    $(form)[0].reset();
                    setTimeout(function () {
                        $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                        $('#' + param).prop("disabled", false);
                        $('#' + param).html("Save");
                        location.href=redirect;
                    }, 2000);
                } else {
                    success_message(response.message);
                    setTimeout(function () {
                        $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                        $('#' + param).prop("disabled", false);
                        $('#' + param).html("Save");
                    }, 2000);
                }
            },
        });
        return false;
    });
}
function handle_upload_modal()
{
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append(param, "");
        $('#' + param).addClass(spinner);
        $('#' + param).prop("disabled", true);
        $('#' + param).html("Please wait");
        $.ajax({
            type: "POST",
            url: APP_URL + 'crud/create.php',
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.alert=="success") {
                    success_message(response.message);
                    $(form)[0].reset();
                    $(table).DataTable().ajax.reload();
                    $(modal).modal('hide');
                    setTimeout(function () {
                        $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                        $('#' + param).prop("disabled", false);
                        $('#' + param).html("Save");
                    }, 2000);
                } else {
                    success_message(response.message);
                    setTimeout(function () {
                        $('#' + param).removeClass("spinner spinner-right spinner-white pr-15");
                        $('#' + param).prop("disabled", false);
                        $('#' + param).html("Save");
                    }, 2000);
                }
            },
        });
        return false;
    });
}
function handle_delete(id,uri,redirect)
{
    Swal.fire({
        title: "Are you sure?",
        text: "You can't revert this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, sure!",
        cancelButtonText: "No, Cancel it!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: uri,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    if (response.alert=="success") {
                        Swal.fire(
                            "Data Deleted!",
                            "You have deleted this data!.",
                            "success"
                        );
                        location.href = redirect;
                    } else {
                        Swal.fire(
                            "You can't delete this data!",
                            "Sorry, looks like there are some errors detected, please try again.",
                            "error"
                        );
                    }
                },
            });
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Canceled",
                "You have undeleted the data",
                "error"
            )
        }
    });
}
function handle_confirm(id,uri)
{
    Swal.fire({
        title: "Are you sure?",
        text: "You can't revert this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, sure!",
        cancelButtonText: "No, Cancel it!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: uri,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    if (response.alert=="success") {
                        Swal.fire(
                            "Confirm success!",
                            "You have confirmed this data!",
                            "success"
                        );
                        location.reload();
                    } else {
                        Swal.fire(
                            "Confirm fail!",
                            "You have to add the item!",
                            "error"
                        );
                    }
                },
            });
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Canceled",
                "You have canceled data confirmation",
                "error"
            )
        }
    });
}