<!DOCTYPE html>
<html lang="en">
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

        <form id="form">

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
                                            <h3>Recuperar Contraseña</h3>


                                            <div class="input-group mb-3">
                                                <span class="input-group-addon bg-white"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control input-log" placeholder="Email" id="email" name="email" value="">
                                                <span id="emailOK" style="font-size: 15px;color: red;"  ></span>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">

                                                    <button type="button" class="btn btn-primary create" onclick="RecoverPass()">Recuperar Contraseña</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

        </form>

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

        function validaCorreo() {

            var correo = document.getElementById('email');
            var retorno = false;
            valido = document.getElementById('emailOK');

            valido.innerText = "";

            emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;


            if (emailRegex.test(correo.value)) {
                var data = new FormData();
                data.append('email', correo.value);

                $.ajax({
                    url: "<?= base_url() ?>C_Main/ValidaForgotEmail",
                    type: 'POST',
                    data: data,
                    async: false,
                    success: function (data) {
                        console.log(data);
                        var obj = jQuery.parseJSON(data);                        
                        if (obj.res == "OK") {
                            $(".form-email").addClass("has-error").removeClass("has-success");
                            valido.innerText = "No se encuentra correo en la base de datos";
                            retorno=false;    
                        } else {
                            $(".form-email").addClass("has-success").removeClass("has-error");
                            retorno=true;    
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                }).fail(function (error) {
                    swal({title: 'Error Reportar al administrador del sistema !', text: error.responseText, type: 'error'});

                });

            } else {
                valido.innerText = "Incorrecto";
                $(".form-email").addClass("has-error").removeClass("has-success");
            }

            return retorno;


        }
        

        function RecoverPass() {

            if(validaCorreo()==false){
                return false;
            }


            if ($(".form-email").hasClass("has-error")) {
                alertify.error("Verificar el correo de recuperación")
                $("#email").focus();
                return false
            }

            var formData = new FormData($('#form')[0]);

            $.ajax({
                url: "<?= base_url() ?>C_Main/RecoverPass",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.res == "OK") {
                        swal({
                                title: 'Operacion Exitosa!',
                                text: "Se envió un correo con la información de recuperación.",
                                type: 'success'
                            }).then((result) => {
                                document.location.href="../index.php";
                            });
                    } else {
                            swal({title: 'Error!', text: obj.res, type: 'error'});
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            }).fail(function (error) {
                swal({title: 'Error en el envío de la información!', text: error.responseText, type: 'error'});
            });

        }

    </script>

</html>