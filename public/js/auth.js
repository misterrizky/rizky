(() => {
    "use strict";
    var __webpack_exports__ = {};
    // Class Definition
    var KTLogin = function() {
        var _login;
        let spinner = 'spinner spinner-right spinner-white pr-15';
        var _showForm = function(form) {
            var cls = 'login-' + form + '-on';
            var form = 'kt_login_' + form + '_form';
            _login.removeClass('login-forgot-on');
            _login.removeClass('login-signin-on');
            _login.removeClass('login-signup-on');
            _login.addClass(cls);
            KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
        }
        var _handleSignInForm = function() {
            var validation;
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_signin_form'),
                {
                    fields: {
                        username_login: {
                            validators: {
                                notEmpty: {
                                    message: 'Username is required'
                                }
                            }
                        },
                        password_login: {
                            validators: {
                                notEmpty: {
                                    message: 'Password is required'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_signin_submit').on('click', function (e) {
                $('#kt_login_signin_submit').addClass(spinner);
                $('#kt_login_signin_submit').prop("disabled", true);
                $('#kt_login_signin_submit').html("Please wait");
                e.preventDefault();
                var forms = $(this).closest('form'),
                login_data = {
                    username: $("#username_login").val(),
                    password: $("#password_login").val()
                };

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        $.ajax({
                            type: "POST",
                            url: "login",
                            data: login_data,
                            dataType: 'json',
                            success: function (response) {
                                if (response.alert=="success") {
                                    console.log(response.message);
                                    swal.fire({
                                        text: response.message,
                                        icon: response.alert,
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function() {
                                        location.href = 'dashboard';
                                    });
                                } else {
                                    swal.fire({
                                        text: response.message,
                                        icon: response.alert,
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function () {
                                        KTUtil.scrollTop();
                                    });
                                }
                                $('#kt_login_signin_submit').removeClass("spinner spinner-right spinner-white pr-15");
                                $('#kt_login_signin_submit').prop("disabled", false);
                                $('#kt_login_signin_submit').html("Sign in");
                            }
                        });
                    } else {
                        swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                        $('#kt_login_signin_submit').removeClass("spinner spinner-right spinner-white pr-15");
                        $('#kt_login_signin_submit').prop("disabled", false);
                        $('#kt_login_signin_submit').html("Sign in");
                    }
                });
            });

            // Handle forgot button
            $('#kt_login_forgot').on('click', function (e) {
                e.preventDefault();
                _showForm('forgot');
            });

            // Handle signup
            $('#kt_login_signup').on('click', function (e) {
                e.preventDefault();
                _showForm('signup');
            });
        }

        var _handleSignUpForm = function(e) {
            var validation;
            var form = KTUtil.getById('kt_login_signup_form');

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                form,
                {
                    fields: {
                        fullname_register: {
                            validators: {
                                notEmpty: {
                                    message: 'Fullname is required'
                                }
                            }
                        },
                        username_register: {
                            validators: {
                                notEmpty: {
                                    message: 'Username is required'
                                }
                            },
                            maxlength: 20
                        },
                        email_register: {
                            validators: {
                                notEmpty: {
                                    message: 'Email address is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                }
                            }
                        },
                        password_register: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                }
                            }
                        },
                        rpassword_register: {
                            validators: {
                                notEmpty: {
                                    message: 'The password confirmation is required'
                                },
                                identical: {
                                    compare: function() {
                                        return form.querySelector('[name="password_register"]').value;
                                    },
                                    message: 'The password and its confirm are not the same'
                                }
                            }
                        },
                        agree: {
                            validators: {
                                notEmpty: {
                                    message: 'You must accept the terms and conditions'
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_signup_submit').on('click', function (e) {
                $('#kt_login_signup_submit').addClass(spinner);
                $('#kt_login_signup_submit').prop("disabled", true);
                $('#kt_login_signup_submit').html("Please wait");
                e.preventDefault();
                var forms = $(this).closest('form'),
                register_data = {
                    fullname: $("#fullname_register").val(),
                    username: $("#username_register").val(),
                    email: $("#email_register").val(),
                    password: $("#password_register").val(),
                    password_confirmation: $("#password_confirmation").val()
                };

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        $.ajax({
                            type: "POST",
                            url: "register",
                            data: register_data,
                            dataType: 'json',
                            success: function (response) {
                                if (response.alert=="success") {
                                    swal.fire({
                                        text: response.message,
                                        icon: response.alert,
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function() {
                                        $(forms)[0].reset();
                                        _showForm('signin');
                                    });
                                } else {
                                    swal.fire({
                                        text: response.message,
                                        icon: response.alert,
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function () {
                                        KTUtil.scrollTop();
                                    });
                                }
                                $('#kt_login_signup_submit').removeClass("spinner spinner-right spinner-white pr-15");
                                $('#kt_login_signup_submit').prop("disabled", false);
                                $('#kt_login_signup_submit').html("Submit");
                            }
                        });
                    } else {
                        swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                        $('#kt_login_signup_submit').removeClass("spinner spinner-right spinner-white pr-15");
                        $('#kt_login_signup_submit').prop("disabled", false);
                        $('#kt_login_signup_submit').html("Submit");
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_signup_cancel').on('click', function (e) {
                e.preventDefault();
                _showForm('signin');
            });
        }

        var _handleForgotForm = function(e) {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_forgot_form'),
                {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Email address is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            // Handle submit button
            $('#kt_login_forgot_submit').on('click', function (e) {
                $('#kt_login_forgot_submit').addClass(spinner);
                $('#kt_login_forgot_submit').prop("disabled", true);
                $('#kt_login_forgot_submit').html("Please wait");
                e.preventDefault();
                var forms = $(this).closest('form'),
                forgot_data = {
                    email: $("#email_forgot").val()
                };

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        $.ajax({
                            type: "POST",
                            url: "forgot",
                            data: forgot_data,
                            dataType: 'json',
                            success: function (response) {
                                if (response.alert=="success") {
                                    console.log(response.message);
                                    swal.fire({
                                        text: response.message,
                                        icon: response.alert,
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function() {
                                        $(forms)[0].reset();
                                        _showForm('signin');
                                    });
                                } else {
                                    swal.fire({
                                        text: response.message,
                                        icon: response.alert,
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function () {
                                        KTUtil.scrollTop();
                                    });
                                }
                                $('#kt_login_forgot_submit').removeClass("spinner spinner-right spinner-white pr-15");
                                $('#kt_login_forgot_submit').prop("disabled", false);
                                $('#kt_login_forgot_submit').html("Submit");
                            }
                        });
                    } else {
                        swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                        $('#kt_login_forgot_submit').removeClass("spinner spinner-right spinner-white pr-15");
                        $('#kt_login_forgot_submit').prop("disabled", false);
                        $('#kt_login_forgot_submit').html("Submit");
                    }
                });
            });

            // Handle cancel button
            $('#kt_login_forgot_cancel').on('click', function (e) {
                e.preventDefault();

                _showForm('signin');
            });
        }

        // Public Functions
        return {
            // public functions
            init: function() {
                _login = $('#kt_login');

                _handleSignInForm();
                _handleSignUpForm();
                _handleForgotForm();
            }
        };
    }();

    // Class Initialization
    jQuery(document).ready(function() {
        KTLogin.init();
    });
})();