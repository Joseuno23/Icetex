<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Favicon -->
        <link rel="icon" href="<?= base_url() ?>assets/images/brand/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/brand/favicon.ico" />

        <!-- Title -->
        <title><?= TITLE_ ?></title>

        <!--Bootstrap css-->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">

        <!--Style css -->
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/css/dark-style.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/css/skin-modes.css" rel="stylesheet">

        <!-- Sidemenu css -->
        <link href="<?= base_url() ?>assets/css/sidemenu.css" rel="stylesheet" />
        <!--Daterangepicker css-->
        <link href="<?= base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

        <!-- Rightsidebar css -->
        <link href="<?= base_url() ?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">

        <!---Icons css-->
        <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet" />
    </head>

    <body class="bg-account">
        <!-- page -->
        <div class="page">
            <!-- page-content -->
            <div class="page-content">
                <div class="container text-center text-dark">
                    <div class="row">
                        <div class="col-lg-4 d-block mx-auto">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-6">
                                                <img src="<?= base_url() ?>assets/images/brand/logo.png" class="header-brand-img main-logo" alt="IndoUi logo">
                                                <img src="<?= base_url() ?>assets/images/brand/logo-light.png" class="header-brand-img dark-main-logo" alt="IndoUi logo">
                                            </div>
                                            <h3>Login</h3>
                                            <p class="text-muted">Iniciar sesión en tu cuenta</p>
                                            <div class="input-group mb-3">
                                                <span class="input-group-addon bg-white"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control input-log" placeholder="Username" id="usr" value="admin">
                                            </div>
                                            <div class="input-group mb-4">
                                                <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt"></i></span>
                                                <input type="password" class="form-control input-log" placeholder="Password" id="psw" value="123456789">
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-primary btn-block btn-log">Login</button>
                                                </div>
                                                <div class="col-12">
                                                    <a href="Password/Forgot" class="btn btn-link box-shadow-0 px-0">Recuperar password?</a>
                                                </div>
                                            </div>
                                            <div class="mt-6 btn-list">
                                                <button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                                                <button type="button" class="btn btn-icon btn-google"><i class="fa fa-google"></i></button>
                                                <button type="button" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                                <button type="button" class="btn btn-icon btn-dribbble"><i class="fa fa-dribbble"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-content end -->

        </div>
        <!-- page End-->

        <!-- Jquery js-->
        <script src="<?= base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.sparkline.min.js"></script>
        <script src="<?= base_url() ?>assets/js/circle-progress.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?= base_url() ?>assets/js/custom.js"></script>
        <script src="<?= base_url() ?>assets/md5/js/md5.js"></script>
        <script src="<?= base_url() ?>assets/plugins/sweetalert/sweetalert2.min.js"></script>
    </body>
    <script>
        var input = $('.input-log');
        
        $(function () {
            $(document).keypress(function (e) {
                if (e.which == 13) {
                    Send();
                    return false;
                }
            });
            $(".btn-log").click(function () {
                Send();
            });
        });
        
        function Send() {

            var check = true;
            
            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                }else{
                    hideValidate(input[i]);
                }
            }

            if (check) {
                $.post("<?= base_url() ?>C_Main/Login", {usr: $("#usr").val(), psw: md5($("#psw").val())}, function (data) {
                    if (data.res == "OK") {
                        location.href = "Home";
                    } else if (data.res == "ERROR") {
                        swal({title: 'Error!', text: "Usuario o password incorrecto", type: 'error'});
                    } else if (data.res == "CHANGE") {
                        $("#modal-change").modal("show");
                    } else if (data.res == "LOCKED") {
                        swal({title: 'Usuario bloqueado!', text: 'Comunicate con sistemas', type: 'error'});
                    } else {
                        swal({title: 'Error!', text: data.res, type: 'error'});
                    }
                }, 'json').fail(function (error) {
                    swal({title: 'La URL solicitada no existe para ingresar haz click en el enlace <a href="<?= URL_PROJETC ?>"><?=TITLE_?></a>!', text: error.responseText, type: 'error'});
                    console.log(error);
                });
            }
        }
        
        function showValidate(input) {
            $(input).addClass('is-invalid').removeClass('is-valid');
        }

        function hideValidate(input) {
            $(input).addClass('is-valid').removeClass('is-invalid');
        }
        
        function validate(input) {
            if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
                if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    return false;
                }
            } else {
                if ($(input).val().trim() == '') {
                    return false;
                }
            }
        }
    </script>
</html>