<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Admin Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('assets/pages/css/login-5.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <style>
            /* Login validation / error styles */
            .login-form .help-error,
            .login-form .help-block,
            .login-form span.error {
                color: #e73d4a !important;
                /* use same font properties as the surrounding inputs */
                font-size: 13px;
                line-height: 1.4;
                font-family: inherit;
                font-weight: 400;
                display: block;
                margin-top: 5px;
            }

            /* Invalid credentials / alert styling: match password error font & color */
            .login-form .alert-danger {
                color: #e73d4a;
                background: transparent;
                border: 0;
                padding: 0;
                margin-bottom: 10px;
                font-size: 13px;
                line-height: 1.4;
                font-family: inherit;
                font-weight: 400;
                display: block;
            }

            /* Ensure the inline error doesn't get hidden by positioning */
            .login-form .form-group.has-error { position: relative; }
        </style>
        </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-2 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 login-container bs-reset">
                    <img class="login-logo login-6" src="{{ asset('assets/pages/img/login/login-invert.png') }}" />
                    @yield('content')
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-4 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-8 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; Keenthemes 2015</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bs-reset">
                    <div class="login-bg"> </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-2 -->
        <!--[if lt IE 9]>
            <script src="../assets/global/plugins/respond.min.js"></script>
            <script src="../assets/global/plugins/excanvas.min.js"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('assets/pages/scripts/login-5.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            (function(){
                function initValidation(){
                    if (jQuery && jQuery().validate) {
                        $(".login-form").validate({
                            errorElement: 'span',
                            errorClass: 'help-error',
                            focusInvalid: false,
                            rules: {
                                email: { required: true, email: true },
                                password: { required: true },
                                remember: { required: false }
                            },
                            messages: {
                                email: { required: 'E-Mail is required.', email: 'Please enter a valid email address.' },
                                password: { required: 'Password is required.' }
                            },
                            invalidHandler: function(event, validator) {
                                var $alert = $(".alert-danger", $(".login-form"));
                                if ($alert.length) { $alert.show(); }
                            },
                            highlight: function(element) {
                                $(element).closest('.form-group').addClass('has-error');
                            },
                            success: function(label) {
                                label.closest('.form-group').removeClass('has-error');
                                label.remove();
                            },
                            errorPlacement: function(error, element) {
                                var $wrap = element.closest('.input-icon');
                                if ($wrap.length) {
                                    error.insertAfter($wrap);
                                } else {
                                    error.insertAfter(element);
                                }
                            },
                            submitHandler: function(form) { form.submit(); }
                        });

                        $(".login-form input").keypress(function(e){
                            return e.which == 13 ? ($('.login-form').validate().form() && $('.login-form').submit(), false) : void 0;
                        });

                        // Submit button click handler
                        $(document).on('click', '.login-form button[type=submit], .login-form .btn[type=submit]', function(e){
                            var $form = $(this).closest('.login-form');
                            if ($form.length) {
                                if (!$form.valid()) {
                                    e.preventDefault();
                                    var $alert = $('.alert-danger', $form);
                                    if ($alert.length) { $alert.show(); }
                                    var $first = $form.find('.error').first();
                                    if ($first.length) {
                                        $('html, body').animate({scrollTop: $first.offset().top - 100}, 300);
                                        $first.focus();
                                    }
                                    return false;
                                }
                            }
                        });
                    }
                }

                jQuery(document).ready(function(){
                    initValidation();
                    if ($('.login-bg').length && $.backstretch) {
                        $('.login-bg').backstretch([
                            "{{ asset('assets/pages/img/login/bg1.jpg') }}",
                            "{{ asset('assets/pages/img/login/bg2.jpg') }}",
                            "{{ asset('assets/pages/img/login/bg3.jpg') }}"
                        ], { fade: 1000, duration: 8000 });
                    }
                    $('.forget-form').hide();
                });
            })();
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>